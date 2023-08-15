<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function dashboard()  {
        $request_path = 'dashboard';
        return view('layout.dashboard',compact('request_path'));
    }
}
