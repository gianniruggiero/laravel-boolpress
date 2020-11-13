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
                <td><a href="{{Route('admin.posts.show', $post->slug)}}"><img width=250 src="{{asset('/storage/'.$post->image)}}" alt=""></a></td>
                <td>{{$post->title}}</td>
                <td>
                  @php
                   $postDate = $post->created_at->format('d-m-Y');
                  @endphp
                  {{$postDate}}

                </td>
                <td>{{$post->abstract}}</td>
                <td>
                    <!-- BTN icona Elimina (apre la Modal) -->
                    <button type="button"  class="btn btn-danger btn-sm delete" data-id= "{{$post->id}}" data-toggle="modal" data-target="#deleteModal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </button><br>
                    {{-- Mostra (show) --}}
                    <a href="{{Route('admin.posts.show', $post->slug)}}"><strong>Mostra</strong></a><br>
                    {{-- Mostra (edit) --}}
                    <a href="{{Route('admin.posts.edit', $post->id)}}"><span><strong>Modifica</strong></span><br></a> 
                      
                      <!-- icona e form DELETE direttamente nella table--> 
                      {{-- <form action="{{Route('admin.posts.destroy', $post->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Confermi la cancellazione?')" class="btn btn-danger btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                          </svg></button>
                      </form> --}}
                </td>
            </tr>
        @endforeach    
        </tbody>
      </table>
</div>

{{-- Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
        </svg> <span>ELIMINA POST</span></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Confermi l'eliminazione del Post?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>

        <form action="{{Route('admin.posts.destroyModal')}}" method="POST">
        {{-- <form action="{{Route('admin.posts.destroy', 'input_id')}}" method="POST"> --}}

          @csrf
          @method('DELETE')

          <input type="hidden" id="input_id" name="input_id" value="">
          <button type="submit" id="modal_btn_delete" class="btn btn-danger">ELIMINA</button>
          {{-- <button type="submit" onclick="return confirm('Confermi la cancellazione?')" class="btn btn-danger btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
          </svg></button> --}}

      </form>



      </div>
    </div>
  </div>
</div>

@endsection