@extends('layouts.app')

@section('section')
    <script>
        function deletePost(){
            if(!confirm("Are you sure?")){
                event.preventDefault();
            }
        }


    </script>
    <div class="container">
        <div class="text-center">
            <td><a href="/posts/create" class="btn btn-info">Add New Post </a></td>
        </div>
        <table class="table">
            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Description </th>
                <th> User </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post["id"]}}</td>
                    <td>{{$post["title"]}}</td>
                    <td>{{$post["description"]}}</td>
                    <td>{{$post->user ? $post->user->name : "user not found"}}</td>
                    <td><a href="/posts/{{$post['id']}}" class="btn btn-success">View </a></td>
                    <td><a href="/posts/{{$post['id']}}/edit" class="btn btn-warning">Edit </a></td>
                    <form method="post" action="/posts/{{$post->id}}">
                        @csrf
                        @method("delete")
                        <td><input type="submit" class="btn btn-danger" id="delete" value="Delete" onclick="return deletePost();"></td>
                    </form>
                </tr>
            @endforeach
        </table>
        {{$posts->links()}}

    </div>
@endsection



