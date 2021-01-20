@extends('layout')

@section('content')
<h1 class="text-center m-4">Create Post</h1>
<div class="container mt-5 w-50">
   <form method="POST" enctype="multipart/form-data" action="{{route('posts.store')}}">
      @csrf
      <div class="form-group p-3">
         <label for="title">Title</label>
         <input type="text" class="form-control" name="title" placeholder="Title">
         @error('title')
             <p class="text-danger">{{$errors->first('title')}}</p>
         @enderror
      </div>
      <div class="form-group p-3">
         <label for="title">Content</label>
         <textarea type="text" class="form-control" name="body" placeholder="Content"></textarea>
         @error('body')
             <p class="text-danger">{{$errors->first('body')}}</p>
         @enderror
      </div>
      <div class="form-group p-3">
         <label for="title">Image</label>
         <input type="file" class="form-control" name="image">
         @error('image')
             <p class="text-danger">{{$errors->first('image')}}</p>
         @enderror
      </div>
      <div class="form-group p-3 m-2">
         <input type="submit" value="Submit" class="btn btn-dark">
      </div>
   </form>
</div>
@endsection