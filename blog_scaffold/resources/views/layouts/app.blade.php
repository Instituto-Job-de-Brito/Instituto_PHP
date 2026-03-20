<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Blog' }}</title>
  <style>
    :root { color-scheme: light; }
    body { font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Apple Color Emoji", "Segoe UI Emoji"; margin: 0; background: #0b1220; color: #e5e7eb; }
    a { color: inherit; }
    .wrap { max-width: 980px; margin: 0 auto; padding: 28px 18px; }
    .top { display:flex; align-items:center; justify-content:space-between; gap: 16px; margin-bottom: 22px; }
    .brand { display:flex; flex-direction:column; text-decoration:none; }
    .brand strong { font-size: 16px; }
    .brand span { font-size: 12px; opacity: .75; }
    .nav { display:flex; gap: 10px; align-items:center; flex-wrap: wrap; }
    .btn { display:inline-flex; align-items:center; gap: 8px; border: 1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.06); color: #e5e7eb; padding: 8px 12px; border-radius: 10px; text-decoration:none; cursor:pointer; }
    .card { border: 1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.04); border-radius: 14px; padding: 16px; }
    .muted { opacity: .75; }
    .grid { display:grid; gap: 14px; }
    .flash { margin: 0 0 14px; padding: 10px 12px; border-radius: 10px; border: 1px solid rgba(255,255,255,.12); background: rgba(16,185,129,.12); }
    input, textarea { width: 100%; padding: 10px 12px; border-radius: 10px; border: 1px solid rgba(255,255,255,.12); background: rgba(0,0,0,.2); color: #e5e7eb; }
    label { display:block; font-size: 12px; opacity: .8; margin: 10px 0 6px; }
    h1 { font-size: 22px; margin: 0 0 10px; }
    h2 { font-size: 18px; margin: 0; }
    .row { display:flex; gap: 10px; align-items:center; flex-wrap: wrap; }
    .right { margin-left: auto; }
    .pagination nav { margin-top: 18px; }
  </style>
  @stack('head')
</head>
<body>
  <div class="wrap">
    <div class="top">
      <a class="brand" href="{{ route('blog.index') }}">
        <strong>Blog</strong>
        <span class="muted">Instituto Job</span>
      </a>
      <div class="nav">
        <a class="btn" href="{{ route('blog.index') }}">Posts</a>
        <a class="btn" href="{{ route('admin.posts.index') }}">Admin</a>
      </div>
    </div>

    @if (session('status'))
      <div class="flash">{{ session('status') }}</div>
    @endif

    @yield('content')
  </div>
  @stack('scripts')
</body>
</html>

