@extends('layouts.app')
@section('title')
{{ $title ?? '' }}
@endsection
@section('content')
@if(isset($posts))
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="scrolling-pagination">

  <style>
    .card {
      border: 1px solid #f3f3f3;
      background-color: #ffffff;
      padding: 0px;
      margin-bottom: 30px;
      border-radius: 10px;
      overflow: hidden;
    }
    .card .card-body {
      padding: 0 20px 20px;
    }
  </style>


  @foreach( $posts as $post )

  <div class="col-md-4 blogbox" data-aos="fade-up" data-aos-duration="200">
    <div class="card mb-4 shadow-sm card-body flex-fill">
      <a href="{{ url('/'.$post->slug) }}">
      <div class="image" style="
      position:relative;
      overflow:hidden;
      padding-bottom:100%;
      display: flex;
      justify-content: center;
      align-items: stretch;
      ">
        <img id="{{ 'image'.$post->id }}" src="{{ $post->image }}" class="bd-placeholder-img card-img-top" width="100%" height="auto" alt="{{ $post->title }}" style="
        position:absolute;
        height: 100%;
        width: auto;">
      </div>
      </a>

      <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        <p class="card-text">{!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}</p>
        <div class="d-flex justify-content-between align-items-center">
          <a href="" class="blog-categories">{{ $post->category->name }}</a>
          <br/>
          <small class="text-muted">
            {{ $post->created_at->format('M d,Y \a\t h:i a') }} By 
            <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
            @if($post->support_author_id != NULL)
            x <a href="{{ url('/user/'.$post->support_author_id)}}">{{ $post->support_author->name }}</a>
            @endif
        </small>
        </div>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <br/>
          <button class="btn" style="float: none"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
          @else
          <br/>
          <button class="btn" style="float: none"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
          @endif
        @endif
      </div>
    </div>
  </div>



<!-- <script>
        // if (document.readyState === 'complete') {
        // var title = document.querySelector(".card-title");
        var imageItem = document.querySelector("{{'#image'.$post->id}}");
        console.log(imageItem.id);
        // title.style.color = "red";
        // imgSize();
        // var currWidth = imageItem.clientWidth;
        // var currHeight = imageItem.clientHeight;
        // console.log("Current width=" + currWidth + ", " + "Original height=" + currHeight);
        // function imgSize(){}
        // }
      </script> -->

  <!-- <div class="list-group">
    <div class="list-group-item">
      <h3><a href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
          @else
          <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
          @endif
        @endif
      </h3>
      <br/>
      <img src="{{ $post->image }}" width=300 />
      <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
    </div>
    <div class="list-group-item">
      <article>
        {!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
      </article>
    </div>
  </div> -->


  @endforeach
  {{ $posts->links() }}
  {!! $posts->render() !!}
</div>


@endif
@endif
@endsection