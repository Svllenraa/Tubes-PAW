<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title', 'Bajamas')</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Vite (CSS + JS) -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @stack('head')
</head>
<body>
  <header class="navbar">
    <div class="container nav-inner">
      <div class="brand">
        <div class="logo">Bajamas</div>
      </div>
      <div class="nav-actions">
        <input class="search" placeholder="Cari produk, pesanan..." aria-label="Pencarian"/>
        <button class="btn btn-primary">Tambah Produk</button>
        <div class="avatar">HJ</div>
      </div>
    </div>
  </header>

  <main class="container main-grid">
    @yield('content')
  </main>

  @stack('scripts')
</body>
</html>
