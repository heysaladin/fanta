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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
              <a href="{{ url('/') }}">Home</a>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
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

        <!-- <div class="blog py-5">
          <div class="container"> -->
            <!-- <div class="row"> -->

      <!-- <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default"> -->
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
          <!-- </div>
        </div>
      </div> -->

          <!-- </div> -->
        <!-- </div>
      </div> -->


      <div class="row">
        <!-- <div class="col-md-10 col-md-offset-1"> -->
          <p>Copyright © 2022 | <a href="https://www.hyperfantasy.co">Hyperfantasy</a></p>
        <!-- </div> -->
      </div>
    </div>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vibrant.js/1.0.0/Vibrant.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.3.2/color-thief.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {




        // function encodeImageFileAsURL(url) {

        //   var filesSelected = url;//document.getElementById("inputFileToLoad").files;

        //   if (filesSelected.length > 0) {
        //   console.log(filesSelected[0]);
        //     var fileToLoad = filesSelected[0];
        //     var fileReader = new FileReader();

        //     fileReader.onload = function(fileLoadedEvent) {
        //       var srcData = fileLoadedEvent.target.result; // <--- data: base64
        //       var newImage = document.createElement('img');
        //       newImage.src = srcData;
        //       document.getElementById("imgTest").innerHTML = newImage.outerHTML;
        //       //alert("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
        //       document.getElementById("divDynamic").innerHTML = newImage.src;
              
        //       console.log("Converted Base64 version is " + document.getElementById("imgTest").innerHTML);
        //     } //End of fileReader.onload      
        //     fileReader.readAsDataURL(fileToLoad);
        //   } //End of If Loop if (filesSelected....)
        //   }//End of Function encodeImageFileAsUrl





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

                    // // console.log(document.getElementsByClassName('card-img-top').length);

                    // for (let i = 0; i < document.getElementsByClassName('card-img-top').length; i++) {
                    //   var item = document.getElementsByClassName('card-img-top')[i];

                    //   if(item.clientWidth != 0 && item.clientWidth < item.clientHeight) {

                    //     // item.src = item.src+'?callback=?';
                    //     // item.setAttribute('crossOrigin', 'anonymous');


                    //     // encodeImageFileAsURL(item.src);

                    //     console.log(item.clientWidth);
                    //     console.log(item.clientHeight);

                    //     // Storage::put(item.id+".png", item.src);

                    //     // jQuery.ajax({
                    //     //     url: item.src,
                    //     //     type: 'GET',
                    //     //     data: {},
                    //     //     success:function(msg){

                    //     //         if(msg>0)
                    //     //         {

                    //     //             window.location.href = "url('get/'" + item.id + ")";


                    //     //         }
                    //     //     }
                    //     //     });

                    //     // // console.log(item);
                    //     // // item.addEventListener('load', function() {
                    //     //     var vibrant = new Vibrant(item);
                    //     //     var swatches = vibrant.swatches();
                    //     //     console.log(vibrant);
                    //     //     console.log(swatches);
                    //     //     for (var swatch in swatches){
                    //     //         if (swatches.hasOwnProperty(swatch) && swatches[swatch]){
                    //     //             console.log(swatch, swatches[swatch].getHex());

                    //     //     /*
                    //     //     * Results into:
                    //     //     * Vibrant #7a4426
                    //     //     * Muted #7b9eae
                    //     //     * DarkVibrant #348945
                    //     //     * DarkMuted #141414
                    //     //     * LightVibrant #f3ccb4
                    //     //     */
                    //     //   }
                    //     // }
                    //     // });

                    //     // const colorThief = new ColorThief();
                    //     // // const img = document.querySelector('img');

                    //     // // Make sure image is finished loading
                    //     // if (item.complete) {
                    //     //   colorThief.getColor(item);
                    //     // } else {
                    //     //   item.addEventListener('load', function() {
                    //     //     colorThief.getColor(item);
                    //     //   });
                    //     // }

                    //   }
                    // } 

                }
            });
        });
      });
    </script>
  </body>
</html>