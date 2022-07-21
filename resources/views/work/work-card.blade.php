<div class="row">
      <div class="masonry">
       @foreach ($workData as $work)
       <div class="item">
        <img src="{{$work->img_url}}" data-dir1="{{$work->img_url}}" class="work-img"/>
       </div>
       @endforeach
     </div>
   </div>