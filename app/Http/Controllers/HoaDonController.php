<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;

class HoaDonController extends Controller
{
    public function getAll(Request $request)  {
        $title = 'List Bill';
        $request_path = ucfirst($request->path());
        $hoaDon = HoaDon::all();
        return view('layout.hoadon.view', compact('title', 'request_path', 'hoaDon'));
    }   
}
