<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SPA Project Manager</title>

        <!-- SCRF TOKEN FOR AXIOS -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: "{{ csrf_token() }}" }</script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <div id="app">
            <v-app>
                <!-- Loading our App.vue which will by our main parent component -->
                <App />
            </v-app>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
