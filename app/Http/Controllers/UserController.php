<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Storage;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List User';
        $request_path = ucfirst($request->path());
        // $user = DB::table('table_user')->join('table_role','table_user.role','=','table_role.id')->select('table_user.id','table_user.name','email','username','password','image','role','table_user.created_at')->get();
        $user = User::all();
        $role = Role::all();
        // dd($user);

        return view('layout.user.view', compact('title', 'request_path', 'user', 'role'));
    }
    public function add(UserRequest $request)
    {
        $request_path = ucfirst($request->path());
        $role = Role::all();
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $request->image = uploadFile('image', $request->file('image'));
            }
            $user = new User();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user['email_verified_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            $user->image = $request->image;
            $user->role = $request->role;
            if ($user->save()) {
                Session::flash('success', 'Success User');
                return redirect()->route('user');
                // redirect->route : dien cai name
            } else {
                Session::flash('errors', 'Error User');
                return redirect()->route('insert');
            }
        }

        return view('layout.user.add', compact('request_path', 'role'));
    }
    public function detail($id, UserRequest $request)
    {
        $detail = User::find($id);
        $role = Role::all();
        if ($request->isMethod('post')) {
            $param = $request->post();
            $param['image'] = $detail->image;
            unset($param['_token']);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // $edit = ['image' => $request->image];
                if ($param['image'] != '') {
                    $deleteImage = Storage::delete('/public/' . $detail->image); //xoa anh cu neu update anh moi
                    if ($deleteImage) {
                        $param['image'] = uploadFile('image', $request->file('image'));
                    }
                }else{
                    $param['image'] = uploadFile('image', $request->file('image'));
                }

                // $edit['image'] = $request->image;
            }
            $param['password'] = Hash::make($request->password);
            $param['email_verified_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            // dd($param);
            $update = User::where('id', $id)->update($param);
            //except giong voi unset xoa token 
            if ($update) {
                Session::flash('success', 'Update success');
                return redirect()->route('user');
                // redirect->route : dien cai name
            } else {
                Session::flash('errors', 'Error update');
                return redirect()->route('detail', ['id' => $id]);
            }
        }
        return view('layout.user.edit', compact('detail', 'role'));
    }
    public function profiles($id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('layout.user.detail', compact('user', 'role'));
    }
    public function delete($id)
    {

        // dd($id);
        if ($id) {
            $deleted = User::where('id', $id)->delete();
            if ($deleted) {
                Session::flash('success', 'Delete Success');
                return redirect()->route('user');
            } else {
                Session::flash('errors', 'Delete fail');
                //  return redirect()->route('edit', ['id' => $id]) ;
            }
        }
        return redirect()->route('user');

    }
    public function view_delete(Request $request)
    {
        $title = 'List Deleted User';
        $role = Role::all();
        $request_path = ucfirst($request->path());
        $user_deleted = User::onlyTrashed()->get();
        return view('layout.user.softdelete', compact('user_deleted', 'title', 'request_path', 'role'));
    }
    public function force_delete($id)
    {
        $forceDelete = User::withTrashed()->where('id', $id)->forceDelete();
        if ($forceDelete) {
            Session::flash('success', 'Delete Success');
            return redirect()->route('view-delete');
        } else {
            Session::flash('errors', 'Delete fail');
            //  return redirect()->route('edit', ['id' => $id]) ;
        }

    }
    public function force_restore($id)
    {
        $restore = User::withTrashed()->where('id', $id)->restore();
        if ($restore) {
            Session::flash('success', 'Move Success');
            return redirect()->route('user');
        } else {
            Session::flash('errors', 'Move fail');
            //  return redirect()->route('edit', ['id' => $id]) ;
        }
    }
    public function profiles_detail()
    {
        return view('layout.admin.profiles');
    }
    public function login(UserRequest $request)
    {
        if ($request->isMethod('post')) {
            // dd(Auth::attempt([$login]));
            // dd($request->email);
            //su dung authencation auth::attemp kiem tra thong tin dang nhap
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard');
            } else {
                Session::flash('errors', 'Sai thong tin dang nhap');
                return redirect()->route('login');
            }
        }
        return view('layout.auth.login');
    }
    public function register(UserRequest $request)
    {
        if ($request->isMethod('post')) {
            //lay toan bo du lieu trong form dang ki ma cta gui len 
            $param = $request->except('_token');
            //ma hoa password nguoi duhng cung cap 
            $param['password'] = Hash::make($request->password);
            //Dat gia tri email nay la thoi gian hien tai 
            $param['email_verified_at'] = Carbon::now('Asia/Ho_Chi_Minh');
            $user = User::create($param);
            if ($user->id) {
                Session::flash('success', 'Dang ky thanh cong');
                return redirect()->intended('register');
            } else {
                Session::flash('errors', 'Sai thong tin dang nhap');
                return redirect()->route('register');
            }
        }
        return view('layout.auth.resgister');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}