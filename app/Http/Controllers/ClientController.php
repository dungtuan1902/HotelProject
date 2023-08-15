<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use DB;
use App\Models\Hotel;
use App\Models\Banner;
use App\Models\Room;
use App\Models\Post;

class ClientController extends Controller
{
    
    public function index()
    {
        $hotel = DB::table('table_setting')->first();
        $banner = DB::table('table_banner')->where('action', '=', 1)->get();
        $room = DB::table('table_phong')->limit(4)->get();
        $post = DB::table('table_post')->limit(5)->get();
        return view('layout.client.home', compact('hotel', 'banner', 'room', 'post'));
    }
    public function room()
    {
        $hotel = DB::table('table_setting')->first();
        $room = DB::table('table_phong')->paginate(6);
        return view('layout.client.room', compact('hotel', 'room'));
    }
    public function detail($id)
    {
        $hotel = DB::table('table_setting')->first();
        $detail = Room::find($id);
        $img_description = explode('|', $detail->img_descrition, -1);
        return view('layout.client.detail', compact('hotel', 'detail', 'img_description'));
    }
    public function contact()
    {
        $hotel = DB::table('table_setting')->first();
        return view('layout.client.contact', compact('hotel'));
    }
    public function about()  {
        $hotel = DB::table('table_setting')->first();
        $type = DB::table('table_loai_phong')->limit(4)->get();
        $service = Service::all();
        return view('layout.client.about',compact('hotel','type','service'));
    }
}