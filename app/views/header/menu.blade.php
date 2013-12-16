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
        @if(count($projects) > Config::get('project.max_item_in_menu_top'))
         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              @lang('project.menu_group') <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
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
          </li>

        @else
            @foreach($projects as $project)
                @if($project->selected)
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="/{{ $project->folder}}">{{ $project->name }}</a>
                </li>
            @endforeach
        @endif

    </ul>



    <div class="nav navbar-nav navbar-right">
        @include('social.sharethis')
    </div>
</nav>