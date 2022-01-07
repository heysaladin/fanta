@extends('layouts.app')
@section('title')
@if(!Request::is('user/*'))
<div class="navigation">
  <div class="tab">
    <button class="tablinks" onclick="location.href='{{ url('/') }}';" value="All">All</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/1') }}';" value="UI Design">UI Design</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/2') }}';" value="UX Design">UX Design</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/3') }}';" value="Illustration">Illustration</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/4') }}';" value="3D">3D</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/5') }}';" value="Graphic Design">Graphic Design</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/6') }}';" value="Branding">Branding</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/7') }}';" value="Development">Development</button>
  </div>
</div>
<!-- {{ $title ?? '' }} -->
@endif
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
      <div class="image" id="{{ 'imageWrapper'.$post->id }}" style="
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
        <h3 class="card-title">{!! Str::limit($post->title, $limit = 24, $end = '...') !!}</h3>
        <!-- <h3 class="card-title">{{ $post->title }}</h3> -->
        <!-- <p class="card-text">{!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}</p> -->
        <div class="d-flex justify-content-between align-items-center" style="margin: 16px 0 0; width: 100%; display: flex; justify-content: space-between; align-items: center;">
          <span class="text-muted" style="font-weight: bold;">
            <!-- {{ $post->created_at->format('M d,Y \a\t h:i a') }} By  -->
            <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
            @if($post->support_author_id != NULL)
            x <a href="{{ url('/user/'.$post->support_author_id)}}">{{ $post->support_author->name }}</a>
            @endif
          </span>
          <a href="" class="blog-categories">{{ $post->category->name }}</a>
        </div>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <button style="margin: 12px 0 0;" class="btn" style="float: none"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
          @else
          <br/>
          <button style="margin: 12px 0 0;" class="btn" style="float: none"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
          @endif
        @endif
      </div>
    </div>
  </div>

  @endforeach
  {{ $posts->links() }}
  {!! $posts->render() !!}
</div>

@endif
@endif
@endsection