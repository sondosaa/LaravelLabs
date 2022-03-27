@extends('layouts.app')

@section('section')
    <div class="container">
        <form class="form-control" action="{{url('/posts')}}" method="post">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Title</label>
                <input type="text" name="title" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <input type="text"  name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">User</label>
                <select class="form-select"  name="user_id" >
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-success" value="Post">
            </div>
        </form>
    </div>
@endsection
