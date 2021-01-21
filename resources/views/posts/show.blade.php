@extends('layout')

@section('content')

<div class="container w-auto p-3">
   <div class="card">
      <div class="card-body">
         <h1 class="card-title text-center">{{ $post->title }}</h1>
         <div class="text-center">
            <img src="/storage/images/{{ $post->image }}"
               class="card-img-top w-50 h-auto mb-3 push-center" alt="...">
         </div>
         <p class="card-text">{{ $post->body }}</p>
         <button type="button" class="btn btn-primary">
            Views <span class="badge bg-secondary">{{ $post->view }}</span>
         </button>
         <a href="{{ route('posts.edit', $post->post_id) }}" class="btn btn-primary">Edit</a>
         <form action="{{ route('posts.delete',$post->post_id) }}" method="post" enctype="multipart/form-data" class="d-inline">
         @csrf
         @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger">
         </form>
         <form action="" class="mt-3">
            <div class="form-group">
               <label for="comment"><h5>Add Comment</h5></label>
               <textarea name="comment" class="form-control" id="comment" cols="10" rows="3"
                  placeholder="Add Comment"></textarea>
            </div>
            <div class="form-group">
               <input type="submit" value="Submit" class="btn btn-dark mt-3">
            </div>
         </form>
      </div>
   </div>
</div>
<div class="container">
   <h1>Comments</h1>
   <ul class="list-group">
      <li class="list-group-item">Comment 1<a href="#" class="btn btn-danger float-end">Delete</a></li>
      <li class="list-group-item">Comment 2<a href="#" class="btn btn-danger float-end">Delete</a></li>
      <li class="list-group-item">Comment 3<a href="#" class="btn btn-danger float-end">Delete</a></li>
      <li class="list-group-item">Comment 4<a href="#" class="btn btn-danger float-end">Delete</a></li>
   </ul>
</div>
    
@endsection