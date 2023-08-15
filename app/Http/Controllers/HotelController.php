<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Storage;
use Session;
use DB;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $disable = 'disabled';
        $hotel = DB::table('table_setting')->first();
        return view('layout.setting', compact('disable','hotel'));
    }
    public function edit(Request $request)
    {
        $disable = '';
        $hotel = DB::table('table_setting')->first();
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            $param['image'] = $hotel->image;
            $param['logo'] = $hotel->logo;
            //up anh cong ty  
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $delete = Storage::delete('/public/' . $param['image']);
                if ($delete) {
                    $param['image'] = uploadFile('image', $request->file('image'));
                }
            }
            //up logo
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $delete = Storage::delete('/public/' . $param['logo']);
                if ($delete) {
                    $param['logo'] = uploadFile('image', $request->file('logo'));
                }
            }
            $update = DB::table('table_setting')->update($param);
            if ($update) {
                Session::flash('success', 'Update Successfully');
                return redirect()->route('hotel');
            } else {
                Session::flash('errors', 'Update fail');
                return redirect()->route('hotel');
            }
        }
        return view('layout.setting', compact('disable', 'hotel'));
    }
}