@extends('layouts.app')

@section('section')
    <div class="container">
        <form class="form-control" action="{{url("posts/$post->id")}}" method="post">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label  class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <input type="text"  name="description" class="form-control" value="{{$post->description}}">
            </div>

            <div class="mb-3">
                <label class="form-label">User</label>
                <select name="user_id" class="form-select">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
