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
        <div class="col-lg-12">
            <div class="page-header">
                <h1 id="container">@lang('error.header_title')</h1>
            </div>
            <div class="bs-example">
                <div class="jumbotron">
                <h1>@lang('error.title')</h1>
                    <p>@lang('error.chapeau')</p>
                    <p><a href="/" class="btn btn-primary btn-lg">@lang('error.back')</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
{{ HTML::script('theme/'.Config::get('project.theme').'/js/bootstrap.min.js'); }}
{{ HTML::script('theme/'.Config::get('project.theme').'/js/prettify.js'); }}
{{ HTML::script('theme/'.Config::get('project.theme').'/js/main.js'); }}
</body>
</html>