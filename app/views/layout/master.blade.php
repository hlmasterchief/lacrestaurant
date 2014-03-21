<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Restaurant')</title>
        @section('css')
            {{ HTML::style('css/bootstrap.min.css') }}
            {{ HTML::style('css/main.css') }}
        @show

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            @yield('body', '')
        </div>

        <!-- include javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/main.js') }}
        @yield('js', '')
    </body>
</html>