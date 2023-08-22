<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\HoaDon;
use App\Models\Room;
use App\Models\Hotel;
use Session;

class BillController extends Controller
{
    protected $hotel;
    public function __construct(Hotel $hotel)
    {
        $this->hotel = DB::table('table_setting')->first();
    }
    public function check(Request $request)
    {
        $hotel = $this->hotel;
        $param = [];
        $user = Auth::user();
        if ($request->isMethod('post')) {
            if (isset($request->id_phong)) {
                $param = $request->post();
                return view('layout.client.bill.bill', compact('hotel', 'param', 'user'));
            }
            return redirect()->back()->withErrors(['message1' => 'You need to choose a room to book'])->withInput();
        }
    }
    public function billconfirm(Request $request)
    {
        if ($request->isMethod('post')) {
            $bill = new HoaDon();
            $bill->id_phong = $request->id_phong;
            $bill->id_user = Auth::user()->id;
            $bill->id_km = $request->id_km == null ? 0 : $request->id_km;
            $bill->soLuong = $request->soLuong;
            $bill->soPhong = $request->soPhong;
            $bill->checkin = date('Y-m-d', strtotime($request->checkin));
            $bill->checkout = date('Y-m-d', strtotime($request->checkout));
            $bill->pttt = $request->payment;
            $bill->total = $request->total;
            if ($bill->save()) {
                Session::flash('success', 'Success');
                return redirect()->route('transaction_client');
            } else {
                Session::flash('errors', 'Errors !');
                return redirect()->back();
            }
        }
    }
    public function bill(Request $request)
    {
        $hotel = $this->hotel;
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $total = (Room::find($request->id_phong)->price * $request->soLuong) * 0.25;
            $bill = $request->post();
            $bill['total'] = $total;
            $bill['name'] = Room::find($request->id_phong)->name;
            // $request->session()->push('bill', $bill);
            return view('layout.client.bill.billconfirm', compact('bill', 'hotel', 'user'));
        }
    }

    public function transaction()
    {
        $hotel = $this->hotel;
        $user = Auth::user();
        $tran = HoaDon::all()->where('id_user', Auth::user()->id);
        $room = Room::all();
        return view('layout.client.bill.transaction', compact('tran', 'room', 'hotel', 'user'));
    }
    public function bill_cancel($id)
    {
        $delete = HoaDon::where('id', $id)->delete();
        if ($delete) {
            Session::flash('success', 'Delete successfully');
            return redirect()->route('transaction_client');
        } else {
            Session::flash('errors', 'Delete fail');
            return redirect()->route('transaction_client');
        }
    }
}