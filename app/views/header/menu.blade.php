<div class="navbar-header ">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">@lang('project.menu_toogle')</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a href="/" class="navbar-brand">@lang('project.title')</a>
</div>
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
    <ul class="nav navbar-nav">
        @foreach($projects as $project)
        @if($project->selected)
            <li class="active">
        @else
            <li>
        @endif
            <a href="/{{ $project->folder}}">{{ $project->name }}</a>
        </li>
        @endforeach
    </ul>
    <div class="nav navbar-nav navbar-right">
        @include('social.sharethis')
    </div>
</nav>