<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      @routes
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" /> --}}
    {{-- <script src="{{ asset(mix('/js/app.js')) }}" defer></script> --}}

    @inertiaHead
  </head>
  <body>
    @inertia
  </body>
</html>
