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
              <label for="title"><strong>Titolo</strong></label>
              <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
  
            <div class="form-group">
                <label for="title"><strong>Tags:</strong></label><br>
                {{-- ciclo per creare tutte le check-box --}}
                @foreach ($tags as $tag)
                    <div class="custom-control custom-checkbox custom-control-inline">
                        @php
                            // controlla se il tag è da rendere checked
                            foreach ($tag->posts as $postTagged) {
                              if ($postTagged->id==$post->id) {
                                $tagChecked = 'checked';
                                break;
                              } else {
                                $tagChecked = '';
                              }
                            }
                        @endphp
                        <input type="checkbox" {{$tagChecked}} name="tags[]" id="tag-{{$tag->id}}" value="{{$tag->id}}" class="custom-control-input">
                        <label for="tag-{{$tag->id}}" class="custom-control-label"> {{$tag->name}}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="abstract"><strong>Abstract</strong></label>
                <input type="text" class="form-control" id="abstract" name="abstract" value="{{$post->abstract}}" placeholder="Inserisci abstract del post">
            </div>

            <div class="form-group">
                <label for="slug"><strong>Slug</strong></label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}" placeholder="Crea slug del post">
            </div>
 
            <div class="form-group">
                <label for="image"><strong>Immagine</strong></label><br>
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
              <label for="post_text"><strong>Post</strong></label>
              <textarea class="form-control" name="post_text" id="post_text" rows="5">{{$post->post_text}}"</textarea>
            </div>

            <button type="submit" class="btn btn-danger">MODIFICA IL POST</button>
   
        </form>

    </div>    

@endsection
