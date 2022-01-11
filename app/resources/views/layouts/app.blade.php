<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio | Hyperfantasy</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://www.hyperfantasy.co">Hyperfantasy</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="{{ url('/') }}">Portfolios</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
            <li>
              <a href="{{ url('/auth/login') }}">Login</a>
            </li>
            <li>
              <a href="{{ url('/auth/register') }}">Register</a>
            </li>
            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span style="display: inline-block; margin: 0 10px -7px 0; width: 24px; height: 24px; border-radius: 24px; overflow: hidden;"><img src="{{ Auth::user()->photo }}" width=24 height=24 /></span>{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if (Auth::user()->can_post())
                <li>
                  <a href="{{ url('/new-post') }}">Add new post</a>
                </li>
                <li>
                  <a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>
                </li>
                @endif
                <li>
                  <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
                </li>
                <li>
                  <a href="{{ url('/logout') }}">Logout</a>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <main role="main" class="container">

      @if (Session::has('message'))
      <div class="flash alert-info">
        <p class="panel-body">
          {{ Session::get('message') }}
        </p>
      </div>
      @endif
      
      @if ($errors->any())
      <div class='flash alert-danger'>
        <ul class="panel-body">
          @foreach ( $errors->all() as $error )
          <li>
            {{ $error }}
          </li>
          @endforeach
        </ul>
      </div>
      @endif

      <div class="row">
        <div class="panel-heading">
          <h2>@yield('title')</h2>
          @yield('title-meta')
        </div>
      </div>
      <div class="row">
        <div class="panel-body">
          @yield('content')
        </div>
      </div>

    </main>




    {{-- <div id="wrap">
      <div class="filter-subnav container-fluid">
        <h2>@yield('title')</h2>
        @yield('title-meta')
      </div>
      <div id="wrap-inner" class="flushed">
        <div id="content" role="main">
          <div id="main" class="main-full">
          @yield('content')
          </div>
        </div>
      </div>
    </div>
    
    <style>
      #wrap {
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
        background: #fff;
      }
      .container-fluid {
          padding-right: 32px;
          padding-left: 32px;
      }
        #wrap-inner {
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
          width: 100%;
          padding: 32px 32px 40px;
              padding-right: 32px;
              padding-left: 32px;
      }
        #wrap-inner.flushed {
          padding-right: 0;
          padding-left: 0;
      }
        #content {
          position: relative;
          margin: 0 auto;
          padding: 0;
          font-size: 14px;
      }
        #main.main-full {
          width: auto;
          max-width: none;
          float: none;
      }
      .shots-grid {
          display: grid;
          grid-gap: 36px;
          grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
          list-style: none;

          position: relative;

      }
      @media screen and (min-width: 1600px) {
      .shots-grid {
          grid-template-columns: repeat(auto-fill, minmax(336px, 1fr));
      }
      }
        .shot-thumbnail-container {
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
      }
    </style> --}}


    <div class="row">
        <p>Copyright © 2022 | <a href="https://www.hyperfantasy.co">Hyperfantasy</a></p>
    </div>


    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('ul.pagination').hide();
        $(function() {
            $('.scrolling-pagination').jscroll({
                autoTrigger: true,
                padding: 0,
                debug: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scrolling-pagination',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });



        // $(".scrolling-pagination").removeClass("js-thumbnail-grid");
        // $(".scrolling-pagination").removeClass("shots-grid");
        // $(".scrolling-pagination").removeClass("group");
        // $(".scrolling-pagination").removeClass("dribbbles");
        // $(".scrolling-pagination").removeClass("container-fluid");
        // setTimeout(function() {
        // $(".jscroll-inner").addClass("js-thumbnail-grid");
        // $(".jscroll-inner").addClass("shots-grid");
        // $(".jscroll-inner").addClass("group");
        // $(".jscroll-inner").addClass("dribbbles");
        // $(".jscroll-inner").addClass("container-fluid");
        // $(".jscroll-added").addClass("js-thumbnail-grid");
        // $(".jscroll-added").addClass("shots-grid");
        // $(".jscroll-added").addClass("group");
        // $(".jscroll-added").addClass("dribbbles");
        // $(".jscroll-added").addClass("container-fluid");
        // }, 1);

        // setTimeout(function() {
        //   $(".scrolling-pagination > div").css({
        //     'font-size' : '10px',
        //     'display': 'grid',
        //     'grid-gap' : '36px',
        //     'grid-template-columns' : 'repeat(auto-fill, minmax(270px, 1fr))',
        //     'list-style' : 'none'
        //   });
        //   $(".scrolling-pagination > .jscroll-added").css({
        //     'font-size' : '10px',
        //     'display': 'grid',
        //     'grid-gap' : '36px',
        //     'grid-template-columns' : 'repeat(auto-fill, minmax(270px, 1fr))',
        //     'list-style' : 'none'
        //   });
        // }, 1);



      });
    </script>
    <script>
      // // Add active class to the current button (highlight it)
      // var header = document.getElementById("navCategory");
      // var btns = header.getElementsByClassName("category");
      // for (var i = 0; i < btns.length; i++) {
      //   btns[i].addEventListener("click", function() {
      //   var current = document.getElementsByClassName("active");
      //   current[0].className = current[0].className.replace("active", "");
      //   this.className += "active";
      //   });
      // }
    </script>
  </body>
</html>