@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-10">
              <h1>{{$post->title}}</h1>
            </div>
            <div class="col-2 text-right">
              <a href="{{Route('admin.posts.index')}}" class="btn btn-primary">Lista dei Post</a>
            </div>
          </div>
        <br>
        <img src="{{asset("/storage/".$post->image)}}" alt="{{asset($post->image)}}">
        <br><br>
        <p><strong>Abstract: </strong> {{$post->abstract}}</p>
        <p><strong>Testo del Post: </strong> {{$post->post_text}}</p>
        <p><strong>Postato il: </strong>{{$post->created_at}}</p>
        <p><strong>Autore: </strong>{{$post->user->name}}</p>
        <p><strong>Logged as: </strong> {{$post->user->email}}</p>
        <p><strong>Slug: </strong>{{$post->slug}}</p>
        <br>
        <hr>
        <a href="{{Route('admin.posts.index')}}"><strong>&larr; BACK TO THE LIST</strong> </a>
    </div>    

@endsection