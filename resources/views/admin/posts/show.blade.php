@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$post->title}}</h1>
        <br>

        <p><strong>Abstract: </strong> {{$post->abstract}}</p>
        <p><strong>Testo del Post: </strong> {{$post->post_text}}</p>
        <p><strong>Postato il:</strong> {{$post->created_at}}</p>
        <p><strong>Autore: </strong>{{$post->user->name}}</p>
        <p><strong>Logged as: </strong> {{$post->user->email}}</p>
        <br><hr>
        <a href="{{Route('admin.posts.index')}}"><strong>&larr; BACK TO THE LIST</strong> </a>
        
 
    </div>    

@endsection
