<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(2);
        return view("posts.index", ["posts" => $posts]);
    }

    public function create()
    {
        return view("posts.create", ["users"=>User::all()]);
    }

    public function store(Request $request){
        $dataRequest= $request->all();
        Post::create($dataRequest);
        return redirect(url("/posts"));
    }

    public function show($post){
        $post = Post::find($post);
        return view("posts.show", ["post" => $post]);
    }

    public function edit($post){
        $post = Post::find($post);
        $users = User::all();
        return view("posts.edit", ["post" => $post, "users"=>$users]);
    }

    public function update($post, Request $request){
        Post::find($post)->update([
            'title'=> $request->title,
            'description'=> $request->description,
            'user_id'=>$request->user_id,
        ]);

        return redirect(url("/posts"));
    }

    public function destroy($post){
        Post::find($post)->delete();

        return redirect(url("/posts"));
    }


}
