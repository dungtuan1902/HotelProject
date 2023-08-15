<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;
use Storage;

class PostController extends Controller
{
    public function getAll(Request $request)
    {
        $post = Post::all();
        $title = 'List Post';
        $request_path = ucfirst($request->path());
        return view('layout.post.view', compact('post', 'title', 'request_path'));
    }
    public function add(PostRequest $req)
    {
        if ($req->post()) {
            if ($req->hasFile('image') && $req->file('image')->isValid()) {
                $req->image = uploadFile('image', $req->file('image'));
            }
            $post = new Post();
            $post->title = $req->title;
            $post->image = $req->image;
            $post->content = $req->content;
            if ($post->save()) {
                Session::flash('success', 'Insert Successfully');
                return redirect()->route('post');
            } else {
                Session::flash('errors', 'Insert Fail');
                return redirect()->route('post');
            }
        }
        return view('layout.post.add');
    }
    public function delete($id)
    {
        $delete = Post::where('id', $id)->delete();
        if ($delete) {
            Session::flash('success', 'Delete Successfully');
            return redirect()->route('post');
        } else {
            Session::flash('errors', 'Delete Fail');
            return redirect()->route('post');
        }
    }
    public function force($id)
    {
        $force = Post::withTrashed()->where('id', $id)->forceDelete();
        if ($force) {
            Session::flash('success', 'Delete Successfully');
            return redirect()->route('view_delete_post');
        } else {
            Session::flash('errors', 'Delete Fail');
            return redirect()->route('view_delete_post');
        }
    }
    public function restore($id)
    {
        $restore = Post::withTrashed()->where('id', $id)->restore();
        if ($restore) {
            Session::flash('success', 'Restore Successfully');
            return redirect()->route('post');
        } else {
            Session::flash('errors', 'Restore Fail');
            return redirect()->route('view_delete_post');
        }
    }
    public function view_delete(Request $request)
    {
        $post = Post::onlyTrashed()->get();
        $title = 'List Delete Post';
        $request_path = ucfirst($request->path());
        return view('layout.post.softdelete', compact('post', 'title', 'request_path'));
    }
    public function edit($id, PostRequest $req)
    {
        $post = Post::find($id);
        if ($req->post()) {
            $param = $req->post();
            $param['image'] = $post->image;
            unset($param['_token']);
            if ($req->hasFile('image') && $req->file('image')->isValid()) {
                $deleteImage = Storage::delete('/public/'.$post->image);
                if ($deleteImage) {
                    $req->image = uploadFile('image', $req->file('image'));
                    $param['image']= $req->image;
                } 
            }
            $update = Post::where('id',$id)->update($param);
            if ($update) {
                Session::flash('success', 'Update Successfully');
                return redirect()->route('post');
            } else {
                Session::flash('errors', 'Update Fail');
                return redirect()->route('post');
            }
        }
        return view('layout.post.edit',compact('post'));
    }
    public function detail($id)  {
        $post =Post::find($id);
        return view('layout.post.detail',compact('post'));
    }
}