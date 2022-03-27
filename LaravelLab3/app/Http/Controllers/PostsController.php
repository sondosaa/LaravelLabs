<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        return view("posts.index", compact('posts'));
    }

    public function create()
    {
        $users = User::all();
        return view("posts.create" , compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|min:3',
            'desc' => 'required|min:10',
        ]);




        $request_data = request()->all();

        $post = new Post();
        $post->title = $request_data["title"];
        $post->desc = $request_data["desc"];
        $post->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $post->user_id =request("user_id");
        $post->save();


        return to_route("posts.index")->with('success', 'Student has been added');
    }

    public function show($id)
    {

        $data = Post::find($id);
        return view("posts.view",compact('data'));
        
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $users = User::all();
        return view("posts.edit",compact('data','users'));
        
    }

    public function update(Request $request , $id)
    {
        $post = Post::find($id);

        $request->validate([
            'title' => 'required|min:3|unique:posts,title,'.$id,
            'desc' => 'required|min:10',
        ]);
       
        
        $post->title =request("title");
        $post->desc =request("desc");
        $post->user_id= request("user_id");

  
        $post->save();

        return to_route("posts.index");
    
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return to_route("posts.index");
    }
}
