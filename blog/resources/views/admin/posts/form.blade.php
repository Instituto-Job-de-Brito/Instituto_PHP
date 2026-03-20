@push('head')
  <link rel="stylesheet" href="https://unpkg.com/trix@2.1.12/dist/trix.css">
  <style>
    trix-editor {
      background: transparent;
      border: 0;
      border-bottom: 1px solid rgba(201,168,76,.55);
      padding: 10px 2px;
      min-height: 260px;
      color: rgba(232,228,220,.95);
      font-family: var(--font-corpo);
      font-size: 1.05rem;
      line-height: 1.55;
      outline: none;
    }
    trix-editor:focus { border-bottom-color: rgba(226,196,122,.92); }
    trix-toolbar { filter: invert(1) hue-rotate(180deg) saturate(.85); opacity: .95; }
    trix-toolbar .trix-button-group { border: 1px solid rgba(30,45,69,.6); border-radius: 999px; overflow: hidden; }
    trix-toolbar .trix-button { border: 0; }
  </style>
@endpush

@push('scripts')
  <script src="https://unpkg.com/trix@2.1.12/dist/trix.umd.min.js"></script>
@endpush

<div class="field">
  <label for="title">Título</label>
  <input id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
</div>

<div class="field">
  <label for="slug">Slug (opcional)</label>
  <input id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}" placeholder="ex: minha-primeira-postagem">
</div>

<div class="field">
  <label for="excerpt">Resumo (opcional)</label>
  <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
</div>

<div class="field">
  <label>Conteúdo</label>
  <input id="body" type="hidden" name="body" value="{{ old('body', $post->body ?? '') }}">
  <trix-editor input="body"></trix-editor>
</div>

@if ($errors->any())
  <div class="mission" style="margin-top: 10px;">
    <p class="mission__title">Verifique o formulário</p>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
