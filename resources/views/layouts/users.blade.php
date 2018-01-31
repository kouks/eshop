<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name.admin') }}</title>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>


    <div id="app">
        @include('partials.navbar')

        @yield('content')

    </div>


    <div id="app">



    </div>



    <script type="text/javascript" src="/js/app.js"></script>
     <div>
        @include('partials.footer')
    </div>
</body>
</html>
