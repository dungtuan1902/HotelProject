<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\KhuyenMaiRequest;
use App\Models\KhuyenMai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class KhuyenMaiController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Promotion';
        $request_path = ucfirst($request->path());
        $khuyenMai = KhuyenMai::all();
        return view('layout.khuyenmai.view', compact('title', 'request_path', 'khuyenMai'));
    }
    public function insert(KhuyenMaiRequest $req)
    {
        if ($req->isMethod('post')) {
            $param= $req->post();
            unset($param['_token']);
            // dd($param);
            $khuyenmai  =new KhuyenMai();
            $khuyenmai->name = $req->name;
            $khuyenmai->code = $req->code;
            $khuyenmai->value = $req->value;
            $khuyenmai->time = $req->time;
            $khuyenmai->note = $req->note;
            if ($khuyenmai->save()) {
                Session::flash('success','Insert Successfully');
                return redirect()->route('khuyenmai');
            }else{
                Session::flash('success','Insert Failly');
                return redirect()->route('insert_khuyenmai');
            }

        }
        return view('layout.khuyenmai.add');
    }
    public function update($id,KhuyenMaiRequest $req) {
        $khuyenmai  = KhuyenMai::find($id);
        if ($req->isMethod('post')) {
            $param= $req->post();
            unset($param['_token']);
            $updated = KhuyenMai::where('id',$id)->update($param);
            if ($updated) {
                Session::flash('success','Insert Successfully');
                return redirect()->route('khuyenmai');
            }else{
                Session::flash('success','Insert Failly');
                return redirect()->route('insert_khuyenmai');
            }

        }
        return view('layout.khuyenmai.edit',compact('khuyenmai'));
    }
    public function view_delete()  {
        $title = "List Deleted Promotion";
        $deleted = KhuyenMai::onlyTrashed()->get();
        return view('layout.khuyenmai.softdelete',compact('deleted','title'));
    }
    public function delete($id)  {
        $delete = KhuyenMai::where('id',$id)->delete();
        if ($delete) {
            Session::flash('success','Delete Successfully');
            return redirect()->route('khuyenmai');
        }else{
            Session::flash('success','Delete Failly');
            return redirect()->route('khuyenmai');
        }
    }
    public function force($id)  {
        $force = KhuyenMai::onlyTrashed()->forceDelete();
        if ($force) {
            Session::flash('success','Delete Successfully');
            return redirect()->route('view_delete_khuyenmai');
        }else{
            Session::flash('success','Delete Failly');
            return redirect()->route('view_delete_khuyenmai');
        }
    }
    public function restore($id)  {
        $restore = KhuyenMai::onlyTrashed()->restore();
        if ($restore) {
            Session::flash('success','Restore Successfully');
            return redirect()->route('view_delete_khuyenmai');
        }else{
            Session::flash('success','Restore Failly');
            return redirect()->route('view_delete_khuyenmai');
        }
    }
}