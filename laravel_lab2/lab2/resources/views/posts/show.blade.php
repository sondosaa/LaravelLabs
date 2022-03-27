@extends('layouts.app')

@section('section')
    <div class="container">
            <div class="mb-3">
                <label  class="form-label">Title</label>
                <input type="text" name="title" class="form-control" disabled value="{{$post->title}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">Description</label>
                <input type="text"  name="description" class="form-control" disabled value="{{$post->description}}">
            </div>
            <div class="mb-3">
                <label  class="form-label">User</label>
                <input type="text"  name="id" class="form-control" disabled value="{{$post->user->name}}">
            </div>
    </div>
@endsection
