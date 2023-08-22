<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\Service;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use DB;
use App\Models\Hotel;
use App\Models\Banner;
use App\Models\Room;
use App\Models\Post;
use Auth;
use Storage;
use Session;
use App\Models\User;

class ClientController extends Controller
{
    protected $hotel;
    public function __construct(Hotel $hotel)
    {
        $this->hotel = DB::table('table_setting')->first();
    }

    public function index()
    {
        $hotel = $this->hotel;
        $banner = DB::table('table_banner')->where('action', '=', 1)->get();
        $room = DB::table('table_phong')->limit(4)->get();
        $post = DB::table('table_post')->limit(5)->get();
        return view('layout.client.home', compact('hotel', 'banner', 'room', 'post'));
    }
    public function room()
    {
        $hotel = $this->hotel;
        $room = DB::table('table_phong')->paginate(6);
        return view('layout.client.room', compact('hotel', 'room'));
    }
    public function detail($id)
    {
        $hotel = $this->hotel;
        $detail = Room::find($id);
        $img_description = explode('|', $detail->img_descrition, -1);
        return view('layout.client.detail', compact('hotel', 'detail', 'img_description'));
    }
    public function contact()
    {
        $hotel = $this->hotel;
        return view('layout.client.contact', compact('hotel'));
    }
    public function about()
    {
        $hotel = $this->hotel;
        $type = DB::table('table_loai_phong')->limit(4)->get();
        $service = Service::all();
        return view('layout.client.about', compact('hotel', 'type', 'service'));
    }
    public function page()
    {
        $hotel = $this->hotel;
        $page = DB::table('table_post')->paginate(9);
        return view('layout.client.page', compact('page', 'hotel'));
    }
    public function page_detail($id)
    {
        $hotel = $this->hotel;
        $page = Post::find($id);
        return view('layout.client.pageDetail', compact('page', 'hotel'));
    }
    public function profiles(Request $request)
    {
        if (Auth::user()) {
            $hotel = $this->hotel;
            $user = Auth::user();
            if ($request->isMethod('post')) {
                $param = $request->post();
                $param['image'] = $user->image;
                // dd($request->file('image'));
                unset($param['_token']);
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    if ($param['image'] != '') {
                        $deleteImage = Storage::delete('/public/' . $user->image); //xoa anh cu neu update anh moi
                        if ($deleteImage) {
                            $param['image'] = uploadFile('image', $request->file('image'));
                        }
                    } else {
                        $param['image'] = uploadFile('image', $request->file('image'));
                    }
                }
                $id = $param['id_user'];
                unset($param['id_user']);
                // dd($param);
                $update = User::where('id', $id)->update($param);
                if ($update) {
                    Session::flash('success', 'Update success');
                    return redirect()->route('profiles_client');
                    // redirect->route : dien cai name
                } else {
                    Session::flash('errors', 'Error update');
                    return redirect()->route('profiles_client', ['id' => $id]);
                }
            }
            return view('layout.client.profile', compact('hotel', 'user'));
        }
    }
}