@push('head')
  <link rel="stylesheet" href="https://unpkg.com/trix@2.1.12/dist/trix.css">
  <style>
    trix-editor { background: rgba(0,0,0,.2); border: 1px solid rgba(255,255,255,.12); border-radius: 10px; padding: 10px 12px; min-height: 260px; color: #e5e7eb; }
    trix-toolbar { filter: invert(1) hue-rotate(180deg) saturate(.8); opacity: .95; }
  </style>
@endpush

@push('scripts')
  <script src="https://unpkg.com/trix@2.1.12/dist/trix.umd.min.js"></script>
@endpush

<label for="title">Título</label>
<input id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>

<label for="slug">Slug (opcional)</label>
<input id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}" placeholder="ex: minha-primeira-postagem">

<label for="excerpt">Resumo (opcional)</label>
<textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>

<label>Conteúdo</label>
<input id="body" type="hidden" name="body" value="{{ old('body', $post->body ?? '') }}">
<trix-editor input="body"></trix-editor>

@if ($errors->any())
  <div class="muted" style="margin-top: 10px;">
    <strong>Verifique o formulário:</strong>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

