@extends('layouts.app')
@section('title')
{{ $title ?? '' }}
@endsection
@section('content')
@if(isset($posts))
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="">
  @foreach( $posts as $post )

  <div class="col-md-4 blogbox" data-aos="fade-up" data-aos-duration="200">
    <div class="card mb-4 shadow-sm">
      <a href="{{ url('/'.$post->slug) }}">
        <img src="{{ $post->image }}" class="bd-placeholder-img card-img-top" width="100%" height="auto" alt="">
      </a>

      <div class="card-body">
        <h3>{{ $post->title }}</h3>
        <p class="card-text">{!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}</p>
        <div class="d-flex justify-content-between align-items-center">
          <a href="" class="blog-categories">{{ $post->category->name }}</a>
          <br/>
          <small class="text-muted">{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></small>
        </div>
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <button class="btn" style="float: left"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
          @else
          <button class="btn" style="float: left"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
          @endif
        @endif
      </div>
    </div>
  </div>

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
  {!! $posts->render() !!}
</div>
@endif
@endif
@endsection