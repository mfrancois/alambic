@extends('layouts.home')
@section('content')

<div class="row">

    @if(empty($projects))
     <div class="col-lg-12">
             <div class="page-header">
                <h2>@lang('project.title_no_result')</h2>
             </div>
             <div class="media">
                <p>@lang('project.content_no_result')</p>
                <p><a href="/" class="btn btn-primary btn-lg">@lang('error.back')</a></p>
             </div>
            </div>
       </div>
    @else
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
                      <a href="/tags/{{$tag}}"><span class="label {{ (!empty($colors_possible) && !empty($colors_possible[$tag]))?'label-'.$colors_possible[$tag]:'label-default' }} ">{{$tag}}</span></a>
                   @endforeach
               </p>
               <p class="pull-right">
               <a  href="{{$project->folder}}" class="btn btn-primary" role="button">@lang('project.readmore')</a>
               </p>
              </div>
            </div>
        </div>
        @endforeach
     @endif
</div>
@stop
