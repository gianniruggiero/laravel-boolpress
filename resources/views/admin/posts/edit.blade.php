@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-10">
              <h1>Modifica post</h1>
            </div>
            <div class="col-2 text-right">
              <a href="{{Route('admin.posts.index')}}" class="btn btn-primary">Annulla</a>
            </div>
          </div>
       
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{Route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="abstract">Abstract</label>
                <input type="text" class="form-control" id="abstract" name="abstract" value="{{$post->abstract}}" placeholder="Inserisci abstract del post">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}" placeholder="Crea slug del post">
            </div>
 
            <div class="form-group">
                <label for="image">Immagine</label><br>
                <img id="img_preview" src="{{asset("/storage/".$post->image)}}" width=300 alt="{{$post->title}}">
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="loadFile(event)" placeholder="Scegli l'immagine per il tuo post">
            </div>

            <script>
              var loadFile = function(event) {
                var image = document.getElementById('img_preview');
                console.log("change");
                image.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>

            <div class="form-group">
              <label for="post_text">Post</label>
              <textarea class="form-control" name="post_text" id="post_text" rows="5">{{$post->post_text}}"</textarea>
            </div>

            <button type="submit" class="btn btn-primary">MODIFICA IL POST</button>
   
        </form>

{{-- 
        <p><strong>Abstract: </strong> {{$post->abstract}}</p>
        <p><strong>Testo del Post: </strong> {{$post->post_text}}</p>
        <p><strong>Postato il:</strong> {{$post->created_at}}</p>
        <p><strong>Autore: </strong>{{$post->user->name}}</p>
        <p><strong>Logged as: </strong> {{$post->user->email}}</p>
        <br><hr>
        <a href="{{Route('admin.posts.index')}}"><strong>&larr; BACK TO THE LIST</strong> </a>
         --}}
 
    </div>    

@endsection
