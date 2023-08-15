<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceREquest;
use Illuminate\Http\Request;
use App\Models\Service;
use Session;
use Storage;

class ServiceContrller extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Service';
        $request_path = ucfirst($request->path());
        $service = Service::all();
        return view('layout.service.view', compact('title', 'request_path', 'service'));
    }
    public function add(ServiceREquest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('image', $request->file('image'));
            }
            $type = new Service();
            $type->name = $request->name;
            $type->image = $request->image;
            $type->note = $request->note;
            if ($type->save()) {
                Session::flash('success', 'Insert Success');
                return redirect()->route('service');
            } else {
                Session::flash('errors', 'Fail Insert');
                return redirect()->route('insert_service');
            }
        }
        return view('layout.service.add');
    }
    public function delete($id)
    {
        if ($id) {
            $delete = Service::where('id', $id)->delete();
            if ($delete) {
                Session::flash('success', 'Delete Success');
                return redirect()->route('service');
            } else {
                Session::flash('errors', 'Fail Delete');
                return redirect()->route('service');
            }
        }
    }
    public function view_delete()
    {
        $title = 'List deleted Service';
        $type = Service::onlyTrashed()->get();
        return view('layout.service.softdelete', compact('type', 'title'));
    }
    public function force_delete($id)
    {
        if ($id) {
            $delete = Service::withTrashed()->where('id', $id)->forceDelete();
            if ($delete) {
                Session::flash('success', 'Delete Success');
                return redirect()->route('view_delete_service');
            } else {
                Session::flash('errors', 'Fail Delete');
                return redirect()->route('view_delete_service');
            }
        }
    }
    public function edit($id, ServiceREquest $request)
    {
        $service = Service::find($id);
        if ($request->isMethod('post')) {
            $param = $request->post();
            $param['image'] = $service->image;
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // $edit = ['image' => $request->image];
                $deleteImage = Storage::delete('/public/' . $service->image); //xoa anh cu neu update anh moi
                if ($deleteImage) {
                    $param['image'] = uploadFile('image', $request->file('image'));
                }
            }
            $update = Service::where('id', $id)->update($param);
            if ($update) {
                Session::flash('success', 'Update Success');
                return redirect()->route('service');
            } else {
                Session::flash('errors', 'Fail update');
                return redirect()->route('edit_service', ['id' => $id]);
            }
        }
        return view('layout.service.edit', compact('service'));
    }
    public function restore($id)
    {
        if ($id) {
            $restore = Service::withTrashed()->where('id', $id)->restore();
            if ($restore) {
                Session::flash('success', 'Restore Success');
                return redirect()->route('view_delete_service');
            } else {
                Session::flash('errors', 'Fail Restore');
                return redirect()->route('view_delete_service');
            }
        }
    }
}