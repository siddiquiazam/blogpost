@extends('layout')

@section('content')
@foreach ($posts as $post)
    
<div class="container w-auto p-3">
   <div class="card">
      <div class="card-body">
         <h2 class="card-title">{{ $post->title }}</h2>
         @if ($post->image)
            <img src="/storage/images/{{ $post->image }}"
            class="card-img-top w-25 h-auto mb-3" alt="...">
         @endif
         
         <p class="card-text">{{ substr($post->body,0,100) }}</p>
         <button type="button" class="btn btn-primary">Comments
            <span class="badge bg-secondary">{{ count($post->comments) }}</span>
         </button>
         <a href="{{ route('posts.show',$post->id) }}" class="btn btn-primary">View Post</a>
      </div>
   </div>
</div>
@endforeach
@endsection