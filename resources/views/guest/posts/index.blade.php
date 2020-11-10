@extends('layouts.app')


@section('content')


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Boolpress</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4 text-center">BOOLPRESS</h1>
      <p class="lead text-center"><em> A new way of Blogging...</em></p>
    </div>
  </div>
  <!-- /Jumbotron -->

  <!-- Page Content -->
  <div class="container">

    {{-- <h1 class="display-4 text-center">BOOLPRESS</h1>
    <p class="lead text-center"><em> A new way of Blogging...</em></p> --}}

    <div class="row">
      <!-- Blog Entries Column -->
        @foreach ($posts as $post)
        <div class="col-md-6">

            <!-- Blog Post -->
            <div class="card mb-4">
                <img class="card-img-top" src="{{asset("/storage/".$post->image)}}" alt="Card image cap">
                <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->abstract}}</p>
                <a href="{{Route('posts.show', $post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                Posted on {{$post->created_at}} by 
                <a href="#">{{$post->user->name}}</a>
                </div>
            </div>            

        </div>

        @endforeach






    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    
@endsection
