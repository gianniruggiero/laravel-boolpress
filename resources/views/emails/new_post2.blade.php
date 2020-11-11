@component('mail::message')
# Il tuo post "{{$post->title}}" è stato pubblicato

Caro utente <em>{{$post->user->name}}</em>,<br>
grazie per il tuo contributo alla nostra community.

@php
 $urlPost = asset('/posts'.'/'.$post->slug);    
@endphp 
{{-- {{ asset('/posts'.'/'.$post->slug) }} --}}


@component('mail::button', ['url' => $urlPost])
Guarda il post
@endcomponent

Stay tuned,<br>
{{ config('app.name') }} / BOOLPRESS Team
@endcomponent

