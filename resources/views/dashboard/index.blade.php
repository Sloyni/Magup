<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Magup - Espace Utilisateur</title>

        <link rel="stylesheet" href="{{ asset('/assets/css/tailwind.css') }}" />
        <link rel="stylesheet" href="{{ asset('/assets/css/iziModal.min.css') }}" />
        <link href="{{ asset('/assets/dashboard/style.css') }}" rel="stylesheet">
    </head>
    <body class="overflow-x-hidden bg-auto lg:bg-cover">

        <div id="app" data-base="{{ route('dashboard',[],false) }}">
            <Dashboard></Dashboard>
        </div>

        <!-- javascript -->
        <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js" integrity="sha256-+Q/z/qVOexByW1Wpv81lTLvntnZQVYppIL1lBdhtIq0=" crossorigin="anonymous"></script>
        <script src="{{ asset('/assets/js/iziModal.min.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
