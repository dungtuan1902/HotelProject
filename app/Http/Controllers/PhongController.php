<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhongRequest;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Storage;

class PhongController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Room';
        $request_path = ucfirst($request->path());
        $room = Room::all();
        return view('layout.phong.view', compact('title', 'request_path', 'room'));
    }
    public function insert(PhongRequest $request)
    {
        $typeroom = TypeRoom::all();
        $khuyenmai = KhuyenMai::all();
        if ($request->isMethod('post')) {
            if ($request->hasFile('image') && $request->hasFile('images') && $request->file('image')->isValid()) {
                $request->image = uploadFile('image', $request->file('image'));
                $request->images = '';
                foreach ($request->file('images') as $key => $file) {
                    $request->images = $request->images . uploadFile('image', $file) . '|';
                }
            }
            $room = new Room();
            $room->id_lp = $request->typeroom;
            $room->id_km = ($request->khuyenmai == 0 ? 0 : $request->khuyenmai);
            $room->name = $request->name;
            $room->soLuong = $request->soLuong;
            $room->price = $request->price;
            $room->image = $request->image;
            $room->img_descrition = $request->images;
            $room->description = $request->description;
            $room->note = $request->note;
            $room->action = $request->action;
            if ($room->save()) {
                Session::flash('success', 'Insert successfully');
                return redirect()->route('room');
            } else {
                Session::flash('errors', 'Insert fail');
                return redirect()->route('insert_phong');
            }
        }
        return view('layout.phong.add', compact('typeroom', 'khuyenmai'));
    }
    public function detail($id)
    {
        $detail = Room::find($id);
        $img_description = explode('|', $detail->img_descrition, -1);
        // dd($img_description);
        return view('layout.phong.detail', compact('detail', 'img_description'));
    }
    public function view_delete(Request $request)
    {
        $title = 'List Deleted User';
        $request_path = ucfirst($request->path());
        $deleted = Room::onlyTrashed()->get();

        return view('layout.phong.softdelete', compact('deleted', 'title', 'request_path'));
    }
    public function delete($id)
    {
        $delete = Room::where('id', $id)->delete();
        if ($delete) {
            Session::flash('success', 'Delete successfully');
            return redirect()->route('room');
        } else {
            Session::flash('errors', 'Delete fail');
            return redirect()->route('room');
        }
    }
    public function force($id)
    {
        $delete = Room::withTrashed()->where('id', $id)->forceDelete();
        if ($delete) {
            Session::flash('success', 'Force delete successfully');
            return redirect()->route('view_delete_phong');
        } else {
            Session::flash('errors', 'Force delete fail');
            return redirect()->route('view_delete_phong');
        }
    }
    public function restore($id)
    {
        $delete = Room::withTrashed()->where('id', $id)->restore();
        if ($delete) {
            Session::flash('success', 'Restore successfully');
            return redirect()->route('view_delete_phong');
        } else {
            Session::flash('errors', 'Restore fail');
            return redirect()->route('view_delete_phong');
        }
    }
    public function edit($id, PhongRequest $request)
    {
        $typeroom = TypeRoom::all();
        $khuyenmai = KhuyenMai::all();
        $room = Room::find($id);
        if ($request->isMethod('post')) {
            $param = $request->post();
            // dd($request->file('images'));
            unset($param['_token']);
            $param['image'] = $room->image;
            $param['img_descrition'] = $room->img_descrition;

            // anh chinh
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $deleteImage = Storage::delete('/public/' . $room->image); //xoa anh cu neu update anh moi
                if ($deleteImage) {
                    $param['image'] = uploadFile('image', $request->file('image'));
                }

            }
            //anh phu
            if ($request->hasFile('images')) {
                if ($request->change == 0) {
                    //Xoa tat ca anh cu va them vao lai anh ms (anh mo ta)
                    $img_descrition = explode('|', $room->img_descrition, -1);
                    foreach ($img_descrition as $key => $value) {
                        $delete_img_storage = Storage::delete('/public/' . $value);
                    }
                    // dd($delete_img_storage);
                    $request->images = '';
                    foreach ($request->file('images') as $key => $file) {
                        $request->images = $request->images . uploadFile('image', $file) . '|';
                    }
                    $param['img_descrition'] = $request->images;
                } else {
                    $request->images = $room->img_descrition;
                    foreach ($request->file('images') as $key => $file) {
                        $request->images = $request->images . uploadFile('image', $file) . '|';
                    }
                    $param['img_descrition'] = $request->images;
                }
            }
            unset($param['change']);
            $update = Room::where('id', $id)->update($param);
            if ($update) {
                Session::flash('success', 'Update successfully');
                return redirect()->route('room');
            } else {
                Session::flash('errors', 'Update fail');
                return redirect()->route('room');
            }
        }
        return view('layout.phong.edit', compact('typeroom', 'khuyenmai', 'room'));
    }
}