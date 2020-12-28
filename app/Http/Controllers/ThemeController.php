<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ThemeController extends Controller
{
    public function saveTheme(Request $request){
        $selectedtheme = $request->selectedtheme;

        if ($selectedtheme){
            $user = Auth::user();
            $user->theme = $selectedtheme;
            $user->save();
            return redirect()->route('controlpanel')->with("success","Theme changed successfully !");
        }

        else{
            return redirect()->route('controlpanel')->with("infomsg","Theme not modified");
        }
    }
}
