<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BlogPost</title>
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <style>
      #footer {
         position:fixed;
         bottom:0;
         width:100%;
      }
   </style>
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">BlogPost</a>
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" aria-current="page" href="{{ route('posts') }}">All Posts</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>
                  </li>
                     
               </ul>
               
               <p class="text-light ml-auto my-2">{{ Auth::user()->name }}</p>
            </div>
         </div>
      </nav>
   </header>
   @yield('content')
   <br><br><br><br>
   {{-- <footer id = "footer" class="bg-dark text-center text-lg-start">
      <div class="text-center p-3 text-light">
        © 2021 Copyright:
        BlogPost.com
      </div>
    </footer> --}}
   <script src="{{asset('js/jquery.js')}}"></script>
   <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>