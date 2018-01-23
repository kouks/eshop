<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Eshop</title>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
    <section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Primary bold title
                </h1>

                <h2 class="subtitle">
                    Primary bold subtitle
                </h2>
            </div>
        </div>
    </section>

    <div class="container">
        @yield('content')
    </div>

    <script src="/js/main.js"></script>
</body>
</html>
