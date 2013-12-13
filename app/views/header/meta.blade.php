  @if(!empty($project))
    <title>{{ $project->name}}</title>
    <meta name="description" content="{{ $project->description}}"/>
    <meta name="keywords" content="{{ implode(',',$project->keywords)}}"/>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $project->name}}" />
    <meta property="og:description" content="{{ $project->description}}" />
@endif