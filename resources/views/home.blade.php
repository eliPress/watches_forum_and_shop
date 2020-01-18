

@extends('master.master')

@section('content')
<main role="main">
    <!--{{print_r($categories)}}-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/colections.jpg')}}"/>

                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1>Example headline.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                    </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


        <!-- Three columns of text below the carousel -->
        <div class="row">
            @foreach ($categories as $data)
            <div class="col-lg-4">
                <image class="bd-placeholder-img rounded-circle mt-5" width="140" height="140" src='{{asset('images').'/'.$data['image']}}'></image>
                <h2>{{$data['cat_name']}}</h2>
                <p>{{$data['description']}}</p>
                <p><a class="btn btn-secondary" href="{{url('category'."/".$data['cat_name'])}}" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            @endforeach
        </div><!-- /.row -->

        <div class="container">
            @yield('content')
        </div>


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
        <!--
                        <div class="row featurette container-fluid btn-secondary "style="background-color: #e0dada">
                            <div class="col-md-7">
                                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                            </div>
                            <div class="col-md-5">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
                            </div>
                        </div>
        
                        <hr class="featurette-divider">
        
                        <div class="row featurette">
                            <div class="col-md-7 order-md-2">
                                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                            </div>
                            <div class="col-md-5 order-md-1">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
                            </div>
                        </div>
        
                        <hr class="featurette-divider">
        
                        <div class="row featurette">
                            <div class="col-md-7">
                                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                            </div>
                            <div class="col-md-5">
                                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
                            </div>
                        </div>-->
        </div><!-- /.container -->
        <div id="wrapper">
            <div id="page" class="container">
                <div id="content">
                    <div class="title">
                        <h2>Welcome to our website</h2>
                        <span class="byline">Mauris vulputate dolor sit amet nibh</span> </div>
                        <p><img src="{{asset('images/rd.png')}}" alt="" class=" m-2" width="500px" height="250px" /> </p>
                    <p>Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo. Aliquam lacinia metus ut elit. Suspendisse iaculis mauris nec lorem. Donec leo. Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum. Nulla enim eros, porttitor eu, tempus id, varius non, nibh. </p>
                    <p>Donec condimentum, urna non molestie semper, ligula enim ornare nibh, quis laoreet eros quam eget ante. Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo.</p>
                    <p>Donec condimentum, urna non molestie semper, ligula enim ornare nibh, quis laoreet eros quam eget ante. Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo.</p>
                </div>
                <div id="sidebar">
                    <ul class="style1">
                        <li class="first">
                            <h3>Amet sed volutpat mauris</h3>
                            <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>
                        </li>
                        <li>
                            <h3>Sagittis diam dolor sit amet</h3>
                            <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>
                        </li>
                        <li>
                            <h3>Maecenas ac quam risus</h3>
                            <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>
                        </li>
                    </ul>
                    <div id="stwo-col">
                        <div class="sbox1">
                            <h2>Etiam rhoncus</h2>
                            <ul class="style2">
                                <li><a href="#">Semper quis egetmi dolore</a></li>
                                <li><a href="#">Quam turpis feugiat dolor</a></li>
                                <li><a href="#">Amet ornare hendrerit lectus</a></li>
                                <li><a href="#">Quam turpis feugiat dolor</a></li>
                            </ul>
                        </div>
                        <div class="sbox2">
                            <h2>Integer gravida</h2>
                            <ul class="style2">
                                <li><a href="#">Semper quis egetmi dolore</a></li>
                                <li><a href="#">Quam turpis feugiat dolor</a></li>
                                <li><a href="#">Consequat lorem phasellus</a></li>
                                <li><a href="#">Amet turpis feugiat amet</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->



    @endsection