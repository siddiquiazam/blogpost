<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BlogPost</title>
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
            <a class="navbar-brand" href="#">BlogPost</a>
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
   </header>
   @yield('content')
   <script src="{{asset('js/jquery.js')}}"></script>
   <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>