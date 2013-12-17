@if(!empty($selected_project))
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          @lang('project.actions') <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li>
               <a href="/print/{{ $selected_project->folder}}">@lang('project.print')</a>
            </li>
        </ul>
      </li>
@endif