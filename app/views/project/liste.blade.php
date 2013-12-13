@extends('layouts.home')
@section('content')

<div class="row">
    <div class="col-lg-12">
            <div class="page-header">
              <h1>@lang('project.liste')</h1>
            </div>
    </div>
    @foreach($projects as $project)

    <div class="col-lg-12">
        <div class="page-header">
         <h2>{{ $project->name }}</h2>
        </div>
        <div class="media">
             @if(!empty($project->image))
             <a class="pull-left" href="{{$project->folder}}">
                <img src="data:image/jpeg;base64,{{$project->image}}" />
              </a>
            @endif
          <div class="media-body">
           <p>{{ $project->description }}</p>
           <p>
               @foreach($project->keywords as $tag)
                   <span class="label label-info">{{$tag}}</span>
               @endforeach
           </p>
           <p class="pull-right">
           <a  href="{{$project->folder}}" class="btn btn-primary" role="button">@lang('project.readmore')</a>
           </p>
          </div>
        </div>
    </div>
    @endforeach

</div>
@stop
