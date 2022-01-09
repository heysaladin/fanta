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
  <div class="filter-subnav-inner flex flex-row items-center justify-between">
    <div class="filter-views js-shot-views">
      <span class="btn-dropdown btn-dropdown-neue">
        <a class="form-btn outlined btn-dropdown-link" data-track-sub-nav="" href="#" data-dropdown-state="closed">
          

          <span>Following</span>
        </a>
        <div class="btn-dropdown-options">
          <ul>
              <li class="active">
                <a data-track-view="Following" href="/">Following</a>
              </li>
            <li class="popular " id="popular-btn">
              <a data-track-view="Popular" href="/shots/popular">Popular</a>
            </li>
            <li class="" id="recent-btn">
              <a data-track-view="New &amp; Noteworthy" href="/shots/recent">New &amp; Noteworthy</a>
            </li>
            <li class="rule"></li>

            <li class="">
              <a data-track-view="Goods for Sale" href="/shots/goods">Goods for Sale</a>
            </li>
          </ul>
        </div>
      </span>
    </div>

      <div class="filter-categories js-filter-categories js-shot-categories">
        <span class="scroll scroll-backward"><a class="d-none" href="#">
</a></span>
        <span class="scroll scroll-forward"><a class="" href="#">
</a></span>
        <ul>
            <li class="category sets-path active">
              <a title="All" data-param="category" data-track-sub-nav="true" href="/shots/following/">All</a>
            </li>
            <li class="category sets-path ">
              <a title="Animation" data-param="category" data-value="animation" data-track-sub-nav="true" href="/shots/following/animation">Animation</a>
            </li>
            <li class="category sets-path ">
              <a title="Branding" data-param="category" data-value="branding" data-track-sub-nav="true" href="/shots/following/branding">Branding</a>
            </li>
            <li class="category sets-path ">
              <a title="Illustration" data-param="category" data-value="illustration" data-track-sub-nav="true" href="/shots/following/illustration">Illustration</a>
            </li>
            <li class="category sets-path ">
              <a title="Mobile" data-param="category" data-value="mobile" data-track-sub-nav="true" href="/shots/following/mobile">Mobile</a>
            </li>
            <li class="category sets-path ">
              <a title="Print" data-param="category" data-value="print" data-track-sub-nav="true" href="/shots/following/print">Print</a>
            </li>
            <li class="category sets-path ">
              <a title="Product Design" data-param="category" data-value="product-design" data-track-sub-nav="true" href="/shots/following/product-design">Product Design</a>
            </li>
            <li class="category sets-path ">
              <a title="Typography" data-param="category" data-value="typography" data-track-sub-nav="true" href="/shots/following/typography">Typography</a>
            </li>
            <li class="category sets-path ">
              <a title="Web Design" data-param="category" data-value="web-design" data-track-sub-nav="true" href="/shots/following/web-design">Web Design</a>
            </li>
        </ul>
      </div>

    <div class="filter-settings js-shot-settings">
      <a class="form-btn outlined filters-toggle-btn empty" data-name="Filters" data-track-sub-nav="true" href="#" data-dropdown-state="closed">
        <span class="meatball">0</span>
        <span class="label" title="Filters">Filters</span>
</a>    </div>
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
<!-- <div class="scrolling-pagination"> -->
<ol class="   scrolling-pagination   js-thumbnail-grid shots-grid group dribbbles container-fluid">

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



  <li id="screenshot-17216429" data-thumbnail-id="17216429" class="shot-thumbnail js-thumbnail shot-thumbnail-container      " data-ad-data="" data-boost-id="" data-is-boost-fallback="">

  <div class="blogbox" data-aos="fade-up" data-aos-duration="200">
  <!-- col-md-4  -->
    <div class="card shadow-sm card-body flex-fill" style="position: relative;">
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
        <h3 class="card-title" style="font-size: 2rem;">{!! Str::limit($post->title, $limit = 28, $end = '...') !!}</h3>
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

  </li>


  @endforeach
  {{ $posts->links() }}
  {!! $posts->render() !!}
</ol>
<!-- </div> -->

@endif
@endif
@endsection