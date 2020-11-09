@extends('layouts.app')

@section('content')

<div class="container">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Abstract del Post</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->abstract}}</td>
                <td><a href="{{Route('posts.show', $post->slug)}}">Show</a><br><span>Edit</span><br><span>Delete</span></td>
            </tr>
        @endforeach    
        </tbody>
      </table>

</div>



@endsection