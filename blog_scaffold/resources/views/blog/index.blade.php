@php($title = 'Blog')
@extends('layouts.app')

@section('content')
  <div class="grid">
    @forelse ($posts as $post)
      <article class="card">
        <div class="row">
          <h2><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h2>
          <span class="right muted">
            {{ optional($post->published_at)->format('d/m/Y') }}
          </span>
        </div>
        @if ($post->excerpt)
          <p class="muted">{{ $post->excerpt }}</p>
        @endif
      </article>
    @empty
      <div class="card">
        <p class="muted">Ainda não há posts publicados.</p>
      </div>
    @endforelse
  </div>

  <div class="pagination">
    {{ $posts->links() }}
  </div>
@endsection

