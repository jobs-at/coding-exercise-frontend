<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>jobs.at coding exercise</title>
        <!-- Fonts -->

        <!-- Comment in the following line, if you want to use bootstrap and/or global styles -->
{{--        <link rel="stylesheet" href="css/app.css">--}}
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>jobs.at coding exercise</h1>
        <h2>TODO: Your work</h2>
        <div id="app">
            <example-component></example-component>
        </div>

        <script src="js/app.js" defer></script>
    </body>
</html>

