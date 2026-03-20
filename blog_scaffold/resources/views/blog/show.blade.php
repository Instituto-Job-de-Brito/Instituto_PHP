@php($title = $post->title)
@extends('layouts.app')

@section('content')
  <article class="card">
    <div class="row">
      <h1>{{ $post->title }}</h1>
      <span class="right muted">
        {{ optional($post->published_at)->format('d/m/Y') }}
      </span>
    </div>

    @if ($post->excerpt)
      <p class="muted">{{ $post->excerpt }}</p>
    @endif

    <hr style="border:0;border-top:1px solid rgba(255,255,255,.12);margin:14px 0;">

    <div class="prose">
      {!! $post->body !!}
    </div>
  </article>
@endsection

