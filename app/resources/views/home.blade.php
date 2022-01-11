@extends('layouts.app')
@section('title')
@if(!Request::is('user/*'))
<!-- <div class="navigation">
  <div class="tab">
    <button class="tablinks" onclick="location.href='{{ url('/') }}'" value="All">All</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/1') }}'" value="UI Design">UI Design</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/2') }}'" value="UX Design">UX Design</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/3') }}'" value="Illustration">Illustration</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/4') }}'" value="3D">3D</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/5') }}'" value="Graphic Design">Graphic Design</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/6') }}'" value="Branding">Branding</button>
    <button class="tablinks" onclick="location.href='{{ url('/posts/category/7') }}'" value="Development">Development</button>
  </div>
</div> -->


<div class="filter-subnav container-fluid">
  <div class="filter-subnav-inner flex flex-row items-center justify-between" style="display: flex; justify-content: center; align-items: center;">

      <select onchange="window.location.href=this.options[this.selectedIndex].value;">
        <option value="{{ url('/') }}">All Portfolios</option>
        <option value="{{ url('curated') }}">Curated</option>
        <option value="{{ url('exploration') }}">Exploration</option>
        <option value="{{ url('real-project') }}">Real Project</option>
      </select>

      <div class="filter-categories js-filter-categories js-shot-categories">
        <span class="scroll scroll-backward"><a class="d-none" href="#"></a></span>
        <span class="scroll scroll-forward"><a class="" href="#"></a></span>
        <ul id="navCategory">
            <li class="category sets-path {{ Request::is('/') ? 'active' : '' }}">
              <a title="All" data-param="category" data-track-sub-nav="true" href="{{ url('/') }}">All</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/1') ? 'active' : '' }}">
              <a title="UI Design" data-param="category" data-value="ui-design" data-track-sub-nav="true" href="{{ url('/posts/category/1') }}">UI Design</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/2') ? 'active' : '' }}">
              <a title="UX Design" data-param="category" data-value="ux-design" data-track-sub-nav="true" href="{{ url('/posts/category/2') }}">UX Design</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/3') ? 'active' : '' }}">
              <a title="Illustration" data-param="category" data-value="illustration" data-track-sub-nav="true" href="{{ url('/posts/category/3') }}">Illustration</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/4') ? 'active' : '' }}">
              <a title="3D" data-param="category" data-value="3d" data-track-sub-nav="true" href="{{ url('/posts/category/4') }}">3D</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/5') ? 'active' : '' }}">
              <a title="Graphic Design" data-param="category" data-value="graphic-design" data-track-sub-nav="true" href="{{ url('/posts/category/5') }}">Graphic Design</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/6') ? 'active' : '' }}">
              <a title="Branding" data-param="category" data-value="Branding" data-track-sub-nav="true" href="{{ url('/posts/category/6') }}">Branding</a>
            </li>
            <li class="category sets-path {{ Request::is('posts/category/7') ? 'active' : '' }}">
              <a title="Development" data-param="category" data-value="development" data-track-sub-nav="true" href="{{ url('/posts/category/7') }}">Development</a>
            </li>
        </ul>
      </div>

  </div>

</div>


<style>
  .filter-categories {
      position: relative;
      text-align: center;
      font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
      font-size: 14px;
      font-weight: 400;
      line-height: 20px;
  }
  .filter-categories:not(.allow-overflow) ul {
    overflow-x: auto;
    overflow-y: hidden;
  }
  .filter-categories ul {
      padding: 0 2px;
      white-space: nowrap;
      scroll-behavior: smooth;
      -ms-overflow-style: -ms-autohiding-scrollbar;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
  }
  .filter-categories .category {
    display: inline-block;
}
.filter-categories .category.active > a {
    border-radius: 8px;
    background: rgba(13,12,34,0.05);
    font-weight: 500;
}
.filter-categories .category.active a,
.filter-categories .category a:hover {
    -webkit-transition: color 200ms ease;
    transition: color 200ms ease;
    color: #0d0c22;
}
.filter-categories .category a {
    display: inline-block;
    display: inline-block;
    padding: 10px 12px;
    color: #6e6d7a;
}
a:link, a:visited {
    -webkit-transition: color 200ms ease;
    transition: color 200ms ease;
    color: auto;
    text-decoration: none;
}
</style>


@else
{{ $title ?? '' }}
@endif
@endsection
@section('content')
@if(isset($posts))
@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
<div class="scrolling-pagination">
<!-- <ol class="   scrolling-pagination   js-thumbnail-grid shots-grid group dribbbles container-fluid"> -->

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

  <!-- <h1>{{ Request::get('a') }}</h1> -->

  @foreach( $posts as $post )

  <!-- <li id="screenshot-17216429" data-thumbnail-id="17216429" class="shot-thumbnail js-thumbnail shot-thumbnail-container      " data-ad-data="" data-boost-id="" data-is-boost-fallback=""> -->

  <div class="col-lg-3 col-md-4 col-sm-6 blogbox" data-aos="fade-up" data-aos-duration="200">
  <!-- col-md-4  -->
    <div class="card mb-3 shadow-sm card-body flex-fill" style="position: relative;">
    <!-- mb-4  -->
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
      
      @if($post->open == '0')
      <div class="overlay" style="
      display: flex; 
      align-items: center; 
      justify-content: flex-end;
      padding: 12px 18px;
      margin-top: -54px;
      position: absolute;
      left: 0;
      ">
        <span style="
        display: block; 
        flex: auto;
        color: white;
        background: rgba(0,0,0,0.5); 
        padding: 4px 12px; 
        border-radius: 100px;
        font-size: 1.25rem;
        ">Private</span>
      </div>
      @endif

      @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
        <div class="overlay" style="
        display: flex; 
        align-items: center; 
        justify-content: flex-end;
        padding: 12px 18px;
        margin-top: -58px;
        position: absolute;
        right: 0;
        ">
          <a href="{{ url('edit/'.$post->slug)}}" class="icon" title="User Profile" style="
          background: white; 
          width: 32px; 
          height: 32px; 
          padding: 12px 6px 10px 8px; 
          border-radius: 100px;
          display: flex;
          justify-content: center;
          align-items: center;
          ">
            <i class="fa fa-edit"></i>
          </a>
        </div>
      @endif

      @if(!Request::is('user/*'))
      <div class="card-body">
        <h3 class="card-title" style="font-size: 1.75rem;">{!! Str::limit($post->title, $limit = 20, $end = '...') !!}</h3>
        <!-- <h3 class="card-title">{{ $post->title }}</h3> -->
        <!-- <p class="card-text">{!! Str::limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}</p> -->
        <div class="d-flex justify-content-between align-items-center" style="margin: 12px 0 0; width: 100%; display: flex; justify-content: space-between; align-items: center;">
          <span class="text-muted" style="font-weight: bold;">
            <!-- {{ $post->created_at->format('M d,Y \a\t h:i a') }} By  -->
            <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a>
            @if($post->support_author_id != NULL)
            x <a href="{{ url('/user/'.$post->support_author_id)}}">{{ $post->support_author->name }}</a>
            @endif
          </span>
          <a href="{{ url('/posts/category/'.$post->category_id) }}" class="blog-categories">{{ $post->category->name }}</a>
        </div>
        <!-- @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
          @if($post->active == '1')
          <button style="margin: 12px 0 0;" class="btn" style="float: none"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
          @else
          <br/>
          <button style="margin: 12px 0 0;" class="btn" style="float: none"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
          @endif
        @endif -->
      </div>
      @endif

    </div>
  </div>

  <!-- </li> -->

  @endforeach
  {{ $posts->links() }}
  {!! $posts->render() !!}
<!-- </ol> -->
</div>

@endif
@endif
@endsection