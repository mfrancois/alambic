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