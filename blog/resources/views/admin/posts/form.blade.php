@push('head')
  <link rel="stylesheet" href="https://unpkg.com/trix@2.1.12/dist/trix.css">
  <style>
    /* Trix editor — tema escuro alinhado ao site */
    trix-toolbar {
      background: rgba(16,24,40,.6);
      border: 1px solid rgba(30,45,69,.75);
      border-bottom: 0;
      border-radius: var(--radius) var(--radius) 0 0;
      padding: 8px 10px;
    }
    trix-toolbar .trix-button-group {
      border: 1px solid rgba(30,45,69,.7);
      border-radius: 10px;
      overflow: hidden;
      background: rgba(10,15,30,.35);
      margin-bottom: 0;
    }
    trix-toolbar .trix-button {
      border: 0;
      border-bottom: 0;
      background: transparent;
      color: rgba(138,154,181,.9);
      transition: background .2s, color .2s;
    }
    trix-toolbar .trix-button:hover,
    trix-toolbar .trix-button.trix-active {
      background: rgba(201,168,76,.18);
      color: rgba(226,196,122,.95);
    }
    trix-toolbar .trix-button--icon::before { opacity: .75; filter: invert(1); }
    trix-toolbar .trix-button--icon:hover::before,
    trix-toolbar .trix-button--icon.trix-active::before { opacity: 1; }

    trix-editor {
      background: rgba(10,15,30,.25);
      border: 1px solid rgba(30,45,69,.75);
      border-top: 0;
      border-radius: 0 0 var(--radius) var(--radius);
      padding: 16px 18px;
      min-height: 320px;
      color: rgba(232,228,220,.95);
      font-family: var(--font-corpo);
      font-size: 1.05rem;
      line-height: 1.65;
      outline: none;
      transition: border-color .25s var(--ease);
    }
    trix-editor:focus {
      border-color: rgba(201,168,76,.6);
    }
    trix-editor a { color: rgba(226,196,122,.92); }
    trix-editor blockquote {
      border-left: 4px solid rgba(201,168,76,.8);
      padding-left: 14px;
      margin: 0;
      color: rgba(232,228,220,.82);
      font-style: italic;
    }
    trix-editor pre {
      background: rgba(10,15,30,.55);
      border: 1px solid rgba(30,45,69,.72);
      border-radius: 10px;
      padding: 12px 16px;
      font-family: var(--font-mono);
      font-size: .88rem;
      color: rgba(226,196,122,.88);
    }
  </style>
@endpush

@push('scripts')
  <script src="https://unpkg.com/trix@2.1.12/dist/trix.umd.min.js"></script>
@endpush

<div class="field">
  <label for="title">Título <span style="color:rgba(201,168,76,.7)">*</span></label>
  <input id="title" name="title" value="{{ old('title', $post->title ?? '') }}"
         placeholder="Título do artigo" required maxlength="180">
</div>

<div class="field">
  <label for="slug">Slug (URL amigável)</label>
  <input id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}"
         placeholder="deixe em branco para gerar automaticamente" maxlength="220">
</div>

<div class="field">
  <label for="excerpt">Resumo (opcional)</label>
  <textarea id="excerpt" name="excerpt" rows="3"
            placeholder="Uma frase que resume o artigo — aparece na listagem e no topo do post.">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
</div>

<div class="field" style="gap: 0;">
  <label style="margin-bottom: 10px;">Conteúdo <span style="color:rgba(201,168,76,.7)">*</span></label>
  <input id="body" type="hidden" name="body" value="{{ old('body', $post->body ?? '') }}">
  <trix-editor input="body"></trix-editor>
</div>

@if ($errors->any())
  <div class="mission" style="margin-top: 16px; border-left-color: rgba(232,100,100,.8);">
    <p class="mission__title" style="color: rgba(232,100,100,.9);">Verifique o formulário</p>
    <ul style="margin: 6px 0 0; padding-left: 18px;">
      @foreach ($errors->all() as $error)
        <li style="color: rgba(232,228,220,.85); margin-bottom: 4px;">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
