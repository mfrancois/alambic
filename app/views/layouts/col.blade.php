<!DOCTYPE html>
<html lang="en">
<head>
    {{ HTML::style('theme/'.Config::get('project.theme').'/css/bootstrap.min.css'); }}
    {{ HTML::style('theme/'.Config::get('project.theme').'/css/main.css'); }}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
      @include('header.meta')
</head>
<body>
<div class="container bs-docs-container">
    <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
        <div class="container">
            @include('header.menu')
        </div>
    </header>
    @include('header.baseline')

    <div class="row" >
        <div class="col-md-3">
            @include('project.menu')
        </div>
        <div class="col-md-9" role="main">

            @yield('content')
            @include('comment.discqus')
        </div>
    </div>
</div>
{{ HTML::script('theme/'.Config::get('project.theme').'/js/bootstrap.min.js'); }}
{{ HTML::script('theme/'.Config::get('project.theme').'/js/prettify.js'); }}
{{ HTML::script('theme/'.Config::get('project.theme').'/js/main.js'); }}

@include('footer.analytics')
</body>
</html>