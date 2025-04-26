<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Outfit', sans-serif;
        }
    </style>
  </head>
  <body class="px-3 md:px-16">
   
    {{-- Header --}}
    @include('app.header')
 
    

    {{-- main --}}
    <main class="lg:mt-30 md:mt-30 mt-36 flex flex-col gap-10">
    @yield('main')
    </main>

    @include('app.footer')
    
    @stack('script')

  <script src="{{ asset('js/sidebar.js') }}"></script>
  </body>
</html>