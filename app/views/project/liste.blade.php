@extends('layouts.home')
@section('content')

<div class="row">

    @foreach($projects as $project)
    <div class="col-xs-6 col-md-3">
        <div class="thumbnail">
            @if(!empty($project->image))
            <img src="data:image/jpeg;base64,{{$project->image}}" />
            @endif

            <div class="caption">
                <h3>{{ $project->name }}</h3>
                @foreach($project->keywords as $tag)
                    <span class="label label-default">{{$tag}}</span>
                @endforeach
                <p>{{ $project->description }}</p>
                <p>
                    <a href="{{$project->folder}}" class="btn btn-primary" role="button">@lang('project.readmore')</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach

</div>
@stop
