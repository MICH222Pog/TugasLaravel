<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Halaman Blog</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-primary bg-primary-subtleg border-bottom border-body">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/blog">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <h1>{{$title}}</h1>

   
    <article class="py-4 container-md border-secondary">
        <h3 class="py-4">{{$post['title']}}</h3>
        <div>
          by
          <a href="/blog?author={{$post->author->username}}">{{$post->author->name}}</a> 
          in
          <a href="/blog?category={{$post->category->slug}}">{{$post->category->name}}</a>
          {{$post->created_at->diffForHumans()}}
      </div>
        <p>{{ $post['body']}}</p>
        <a href="/blog/">Back to posts &laquo;</a>
    </article>
  

   

   

    
</body>
</html>