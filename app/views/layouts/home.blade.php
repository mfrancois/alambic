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
    <div class="row" role="main">
        @if(!empty($tags))
        <div class="page-header">
          <h1 id="progress">@lang('project.filter')
          <span class='{{ (!empty($colors_possible) && !empty($colors_possible[$tags]))?'text-'.$colors_possible[$tags]:'text-default' }}'>
          {{ $tags }}</span></h1>
        </div>
        @endif
        @yield('content')
    </div>
</div>
{{ HTML::script('theme/'.Config::get('project.theme').'/js/bootstrap.min.js'); }}
{{ HTML::script('theme/'.Config::get('project.theme').'/js/prettify.js'); }}
{{ HTML::script('theme/'.Config::get('project.theme').'/js/main.js'); }}

@include('footer.analytics')
</body>
</html>