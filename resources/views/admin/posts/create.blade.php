@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-10">
              <h1>Crea un nuovo post</h1>
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

        <form action="{{Route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo">
            </div>

            <div class="form-group">
                <label for="abstract">Abstract</label>
                <input type="text" class="form-control" id="abstract" name="abstract" placeholder="Inserisci abstract del post">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Crea slug del post">
            </div>

            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" placeholder="Scegli l'immagine per il tuo post">
            </div>


            <div class="form-group">
              <label for="post_text">Post</label>
              <textarea class="form-control" name="post_text" id="post_text" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">PUBBLICA IL POST</button>
   
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
