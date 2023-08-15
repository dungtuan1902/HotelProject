<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRoomRequest;
use App\Models\TypeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Storage;


class LoaiPhongController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Type Room';
        $request_path = ucfirst($request->path());
        $typeRoom = TypeRoom::all();
        return view('layout.loaiphong.view', compact('title', 'request_path', 'typeRoom'));
    }
    public function add(TypeRoomRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('image', $request->file('image'));
            }
            $type = new TypeRoom();
            $type->name = $request->name;
            $type->image = $request->image;
            $type->descrition = $request->descrition;
            if ($type->save()) {
                Session::flash('success', 'Insert Success');
                return redirect()->route('typeroom');
            } else {
                Session::flash('errors', 'Fail Insert');
                return redirect()->route('insert_typeroom');
            }
        }
        return view('layout.loaiphong.add');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = TypeRoom::where('id', $id)->delete();
            if ($delete) {
                Session::flash('success', 'Delete Success');
                return redirect()->route('typeroom');
            } else {
                Session::flash('errors', 'Fail Delete');
                return redirect()->route('typeroom');
            }
        }
    }
    public function view_delete()
    {
        $title = 'List deleted Type';
        $type = TypeRoom::onlyTrashed()->get();
        return view('layout.loaiphong.softdelete', compact('type', 'title'));
    }
    public function force_delete($id)
    {
        if ($id) {
            $delete = TypeRoom::withTrashed()->where('id', $id)->forceDelete();
            if ($delete) {
                Session::flash('success', 'Delete Success');
                return redirect()->route('view_delete_typeroom');
            } else {
                Session::flash('errors', 'Fail Delete');
                return redirect()->route('view_delete_typeroom');
            }
        }
    }
    public function edit($id, TypeRoomRequest $request)
    {
        $type = TypeRoom::find($id);
        if ($request->isMethod('post')) {
            $param = $request->post();
            $param['image'] = $type->image;
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // $edit = ['image' => $request->image];
                $deleteImage = Storage::delete('/public/' . $type->image); //xoa anh cu neu update anh moi
                if ($deleteImage) {
                    $param['image'] = uploadFile('image',$request->file('image')); 
                }
            }
            $update = TypeRoom::where('id', $id)->update($param);
            if ($update) {
                Session::flash('success', 'Update Success');
                return redirect()->route('typeroom');
            } else {
                Session::flash('errors', 'Fail update');
                return redirect()->route('edit_typeroom', ['id' => $id]);
            }
        }
        return view('layout.loaiphong.edit', compact('type'));
    }
    public function restore($id) {
        if ($id) {
            $restore = TypeRoom::withTrashed()->where('id', $id)->restore();
            if ($restore) {
                Session::flash('success', 'Restore Success');
                return redirect()->route('view_delete_typeroom');
            } else {
                Session::flash('errors', 'Fail Restore');
                return redirect()->route('view_delete_typeroom');
            }
        }
    }
}