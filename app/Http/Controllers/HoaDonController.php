<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HoaDon;
use Illuminate\Support\Facades\Gate;

class HoaDonController extends Controller
{
    protected $user;
    protected $room;
    public function __construct()
    {
        $this->user = User::all();
        $this->room = Room::all();
    }
    public function getAll(Request $request)
    {
        $title = 'List Bill';
        $request_path = ucfirst($request->path());
        $hoaDon = HoaDon::all();
        $user = $this->user;
        $room = $this->room;
        return view('layout.hoadon.view', compact('title', 'request_path', 'hoaDon', 'user', 'room'));
    }
}