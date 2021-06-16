<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>jobs.at coding exercise</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">

        <!-- Comment in the following line, if you want to use bootstrap and/or global styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">jobs.at coding exercise</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="app">
                    <job-list :jobs='@json($jobs)'></job-list>
                </div>
            </div>
        </div>

        <script src="{{ mix('/js/app.js') }}" defer></script>
    </body>
</html>
