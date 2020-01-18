

@extends('master.master')

@section('content')
<div class="container pt-4 mb-5">
    <div class="row">
        <h1>{{$title}}Product Page</h1>
    </div>
</div>

<div class="container marketing">

    <div class="row ">

        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{$product['name']}}</strong>
                    <h3 class="mb-0"></h3>
                    <div class="mb-1 text-muted">Price :{{$product['price']}}</div>
                    <p class="card-text mb-auto">{{$product['description']}}</p>
                    <input type="button" id="{{$product['id']}}" value="Add To Cart" class="add_to_cart">
                    <input type="button" value="Go To Cart" onclick="window.location ='{{url('shop/GoToCart')}}'">
                    <input type="button" value="Back" onclick="window.location ='{{url('category').'/'.$category['cat_name']}}'">
                </div>
                <div class="col-auto d-none d-lg-block">
                    <image  class="bd-placeholder-img mt-4" width="200" height="250" src="{{asset('images')."/".$product['image']}}">
                </div>
                
            </div>
            
        </div>


    </div><!-- /.row -->



    <div class="wrapperit" style="display: grid;
  grid-template-columns: 100px 100px 100px;
  grid-gap: 10px;background-color: #fff;position: absolute;left: 70%;top:250px;
  color: #444;">
        
  <!--<image  class="bd-placeholder-img mt-4" width="100" height="100" src="{{asset('images')."/".$product['image']}}">-->
 
</div>
 </div><!-- /.container -->

@endsection