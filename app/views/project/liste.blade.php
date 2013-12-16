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
             @include('project.'.Config::get('project.template'))
        @endforeach
     @endif
</div>
@stop
