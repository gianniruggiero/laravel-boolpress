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
                <td><a href="{{Route('admin.posts.show', $post->slug)}}"><strong>Show</strong></a><br><span><strong>Edit</strong></span><br><span><strong>Delete</strong></span></td>
            </tr>
        @endforeach    
        </tbody>
      </table>

</div>



@endsection