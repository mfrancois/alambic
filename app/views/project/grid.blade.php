<div class="col-sm-5 col-md-3">
      <div class="thumbnail">
       @if(!empty($project->image))
       <a class="" href="{{$project->folder}}">
          <img src="data:image/jpeg;base64,{{$project->image}}" />
        </a>
       @endif
       <div class="caption">
             <h3>{{ $project->name }}</h3>
             <p>{{ $project->description }}</p>
             <p>
                @foreach($project->keywords as $tag)
                   <a href="/tags/{{$tag}}"><span class="label {{ (!empty($colors_possible) && !empty($colors_possible[$tag]))?'label-'.$colors_possible[$tag]:'label-default' }} ">{{$tag}}</span></a>
                @endforeach
             </p>
             <p>
               <a  href="{{$project->folder}}" class="btn btn-primary" role="button">@lang('project.readmore')</a>
             </p>
       </div>
     </div>
</div>