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
        <header class="hero is-medium is-primary">
            <div class="hero-body">
                <div class="container">
                    @yield('heading')
                </div>
            </div>
        </header>

        @include('partials.messages')

        <main class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-2-tablet">
                        @include('admin.partials.sidebar')
                    </div>
                    <div class="column is-offset-1-tablet is-9-tablet">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer')
    </div>

    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
