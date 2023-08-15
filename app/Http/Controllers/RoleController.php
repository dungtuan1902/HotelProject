<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function getAll(Request $request)
    {
        $title = 'List Role';
        $request_path = ucfirst($request->path());
        $role = Role::all();
        // dd($role);

        return view('layout.role.view', compact('title', 'request_path', 'role'));
    }
    public function insert(RoleRequest $request)
    {
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            // dd($param);
            $role = new Role();
            $role->name = $request->name;
            $role->is_disabled = $request->is_disabled;
            $role->color = $request->color;
            if ($role->save()) {
                Session::flash('success', 'Add Success');
                return redirect()->route('role');
            } else {
                Session::flash('errors', 'Fail Add');
                return redirect()->route('insert_role');
            }
        }
        return view('layout.role.add');
    }
    public function edit($id, RoleRequest $request)
    {
        $role = Role::find($id);
        if ($request->isMethod('post')) {
            $param = $request->post();
            unset($param['_token']);
            $update = Role::where('id',$id)->update($param);
            if ($update) {
                Session::flash('success', 'Update Success');
                return redirect()->route('role');
            }else {
                Session::flash('errors', 'Fail update');
                return redirect()->route('edit_role',['id'=>$id]);
            }
        }
        return view('layout.role.edit', compact('role'));
    }
    public function delete($id) {
        if ($id) {
            $delete = Role::where('id',$id)->delete();
            if ($delete) {
                Session::flash('success', 'Delete Success');
                return redirect()->route('role');
            }else {
                Session::flash('errors', 'Fail delete');
                return redirect()->route('role');
            }
        }
    }
    public function view_delete(Request $request)  {
        $title = 'List Deleted Role';
        $request_path = ucfirst($request->path());
        $role = Role::onlyTrashed()->get();
        return view('layout.role.softdelete',compact('role','title','request_path'));
    }
    public function force_delete($id)  {
        $delete_force = Role::withTrashed()->where('id',$id)->forceDelete();
        if ($delete_force) {
            Session::flash('success', 'Delete Success');
            return redirect()->route('view_delete_role');
        }else {
            Session::flash('errors', 'Fail delete');
            return redirect()->route('view_delete_role');
        }
    }
    public function restore_role($id)  {
        $restore = Role::withTrashed()->where('id',$id)->restore();
        if ($restore) {
            Session::flash('success', 'Restore Success');
            return redirect()->route('view_delete_role');
        }else {
            Session::flash('errors', 'Fail restore');
            return redirect()->route('view_delete_role');
        }
    }
}