<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Gate;

class HoaDonController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Bill';
        $request_path = ucfirst($request->path());
        $hoaDon = HoaDon::all();
        $user = User::all();
        $room = Room::all();
        return view('layout.hoadon.view', compact('title', 'request_path', 'hoaDon', 'user', 'room'));
    }
    public function edit($id, Request $request)  {
        
    }
}