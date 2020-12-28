<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function ownposts()
    {
        $user = Auth::user();
        $post = new Post;
        $posts = $post->where("user_id", "=", $user->id)->orderBy('created_at','DESC')->get();

        /*this method couldn't be sorted
        $user = Auth::user();
        $posts = $user->post;
        $posts = $posts->sortBy('created_at', 'DESC');*/

        return view('posts.ownposts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => ['required'],
            'image' => ['image'],
        ]);

        if(isset($request->image)){

            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/images', $file);

        }
        else{
            $file = '';
        }


        $post = new Post;
        $post->user_id = Auth::id();
        $post->description = $request->description;
        $post->image = $file;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        $arr['post'] = $post;
        return view('posts.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        {
            if(Auth::id() == $post->user_id){
                $arr['post'] = $post;
                return view('posts.edit')->with($arr);}
            else{
                return view('posts.editnotallowed');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Post $post)
    {
        if(isset($request->image) && $request->image->getClientOriginalName()){

            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->storeAs('public/images', $file);
        }
        else{
            if(!$post->image){
                $file = '';
            }
            else{
                $file = $post->image;
            }
        }

        $post->image = $file;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('ownposts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('ownposts');
    }
}
