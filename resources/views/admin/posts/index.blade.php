@extends('layouts.app')

@section('content')
      
@php
use Carbon\Carbon;
@endphp


<div class="container">
    <div class="row">
      <div class="col-10">
        <h1>Lista dei Post</h1>
      </div>
      <div class="col-2 text-right">
        <a href="{{Route('admin.posts.create')}}" class="btn btn-primary">Nuovo Post</a>
      </div>

    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Immagine</th>
            <th scope="col">Titolo</th>
            <th scope="col">Data di Pubblicazione</th>
            <th scope="col">Abstract</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td><img width=250 src="{{asset('/storage/'.$post->image)}}" alt=""></td>
                <td>{{$post->title}}</td>
                <td>
                  @php
                   $postDate = $post->created_at->format('d-m-Y');
                  @endphp
                  {{$postDate}}

                </td>
                <td>{{$post->abstract}}</td>
                <td>
                  <a href="{{Route('admin.posts.show', $post->slug)}}"><strong>Mostra</strong></a><br>
                  <a href=""><span><strong>Modifica</strong></span><br></a> 
                  <form action="{{Route('admin.posts.destroy', $post->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                      </svg></button>
                  </form>
                </td>
            </tr>
        @endforeach    
        </tbody>
      </table>

</div>



@endsection