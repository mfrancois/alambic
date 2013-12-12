<!DOCTYPE html>
<html lang="en">
<head>
    {{ HTML::style('css/bootstrap.min.css'); }}
    {{ HTML::style('css/bootstrap-theme.min.css'); }}
    {{ HTML::style('css/main.css'); }}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container bs-docs-container">
    <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
        <div class="container">
            @yield('header')
        </div>
    </header>
    @yield('baseline')
    <div class="row" role="main">
        @yield('content')
    </div>
</div>
{{ HTML::script('js/bootstrap.min.js'); }}
</body>
</html>