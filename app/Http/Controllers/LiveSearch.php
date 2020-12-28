<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB as DB;



class LiveSearch extends Controller
{
    function index()
    {
        return view('live_search');
    }

    function action(Request $request){
        if($request->ajax())
        {
            $output = '';
            $query= $request->get('query');

            if($query != null)
            {
                $data = DB::table('users')
                    ->where('name', 'like', '%'.$query.'%')
                    ->get();
            }
            else{
                $data = '';
            }

                $total_row = $data->count();

                if($total_row > 0){
                    foreach($data as $row){
                        $output .= '
                        <li class="list-group-item"><a href="/profile/'.$row->id.'">'.$row->name.'</a></li>';
                    }
                }
                elseif($data ==''){
                    $output = 'Nothing to search';
                }
                else{
                    $output = '<li class="list-group-item">No Matches Found</li>';
                }
                $data = array(
                    'name_data' => $output,
                    'total_data' => $total_row
                );

                echo json_encode($data);


        }
    }
}
