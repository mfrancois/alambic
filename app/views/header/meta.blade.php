  @if(!empty($project))
    <title>{{ $project->name}}</title>
    <meta name="description" content="{{ $project->description}}"/>
    <meta name="keywords" content="{{ implode(',',$project->keywords)}}"/>
    <meta property="og:title" content="{{ $project->name}}" />
    <meta property="og:description" content="{{ $project->description}}" />
@else
    <title>@lang('project.title')</title>
    <meta name="description" content="@lang('project.description')"/>
    <meta name="keywords" content="@lang('project.keywords')"/>
    <meta property="og:title" content="@lang('project.title')" />
    <meta property="og:description" content="@lang('project.description')" />
@endif
<meta property="og:type" content="website" />