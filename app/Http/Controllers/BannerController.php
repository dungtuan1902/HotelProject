<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Storage;

class BannerController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Banner';
        $request_path = ucfirst($request->path());
        $banner = Banner::all();
        return view('layout.banner.view', compact('title', 'request_path', 'banner'));
    }
    public function insert(BannerRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('image', $request->file('image'));
            }
            $banner = new Banner();
            $banner->name = $request->name;
            $banner->image = $request->image;
            $banner->link = $request->link;
            $banner->action = $request->action;
            if ($banner->save()) {
                Session::flash('success', 'Insert success');
                return redirect()->route('banner');
            } else {
                Session::flash('errors', 'Fail Insert');
                return redirect()->route('banner');
            }
        }
        return view('layout.banner.add');
    }
    public function view_delete()
    {
        $title = 'List deleted Banner';
        $banner = Banner::onlyTrashed()->get();
        // dd($banner);
        return view('layout.banner.softdelete',compact('banner','title'));
    }
    public function edit($id , BannerRequest $request)
    {
        $banner = Banner::find($id);
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            $param['image'] = $banner->image;
            if ($request->hasFile('image')&& $request->file('image')->isValid()) {
                $deleteImage = Storage::delete('/public/' . $banner->image); //xoa anh cu neu update anh moi
                if ($deleteImage) {
                    $param['image'] = uploadFile('image',$request->file('image')); 
                }
                // $param['image'] = uploadFile('image',$request->file('image')); 
            }
            $update = Banner::where('id',$id)->update($param);
            if ($update) {
                Session::flash('success', 'Update success');
                return redirect()->route('banner');
            } else {
                Session::flash('errors', 'Fail Update');
                return redirect()->route('banner');
            }
        }
        return view('layout.banner.edit',compact('banner'));
    }
    public function delete($id)
    {
        if ($id) {
            $deleted = Banner::withTrashed()->where('id', $id)->delete();
            if ($deleted) {
                Session::flash('success', 'Deleted Success');
                return redirect()->route('banner');
            } else {
                Session::flash('errors', 'Fail Deleted');
                return redirect()->route('banner');
            }
        }
    }
    public function force($id)
    {
        if ($id) {
            $deleted = Banner::withTrashed()->where('id', $id)->forceDelete();
            if ($deleted) {
                Session::flash('success', 'Deleted Success');
                return redirect()->route('view_delete_banner');
            } else {
                Session::flash('errors', 'Fail Deleted');
                return redirect()->route('view_delete_banner');
            }
        }
    }
    public function restore($id)
    {
        if ($id) {
            $deleted = Banner::withTrashed()->where('id', $id)->restore();
            if ($deleted) {
                Session::flash('success', 'Restore Success');
                return redirect()->route('view_delete_banner');
            } else {
                Session::flash('errors', 'Fail Restore');
                return redirect()->route('view_delete_banner');
            }
        }
    }
}