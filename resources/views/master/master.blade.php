<?php ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>{{$title}}</title>
        <script>var BASE_URL = "{{url('')}}";</script>
        <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/carousel/">-->

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Favicons -->
        <!--<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
        <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">-->


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }


        </style>
        <!-- Custom styles for this template -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
        <link href="{{url('css/myCss.css')}}" rel="stylesheet">
        <link href="{{url('css/fonts.css')}}" rel="stylesheet">
        <link href="{{url('css/default.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <br>
        <br>
        <header>

            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="#">Carousel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                       
                         
                        
                        <li class="nav-item">

                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('shop/GoToCart')}}">
                                <span id="cart_icon" style="color:white;position:relative;top: -15px;left:20px; ">
                                    {{Cart::getTotalQuantity()}}
                                </span>
                                <i class="fab fa-opencart"></i>
                            </a>
                        </li>
                    </ul>
                    @if(!Session::get('user_id'))
                    <a href="{{url('user/login')}}">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">log In</button>
                        </a>
                      <a href="{{url('user/signin')}}">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Sign In</button>
                        </a>
                    @else
                     <a href="{{url('user/logout')}}">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">log Out</button>
                        </a>
                    @endif
                     @if(Session::get('is_admin'))
                     <a href="{{url('cms/dashboard')}}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">CMS</button>
                        </a>
                    @endif
                </div>
            </nav>
        </header>
        @if(Session::get('sm'))
        <div class="cotainer">
            <div class="alert alert-success text-center sm" role="alert">
                {{Session::get('sm')}}
            </div>
        </div>
        @endif
        @yield('content')

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
    
</html>
