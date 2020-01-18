

@extends('master.master')

@section('content')
<div class="container pt-4 mb-5">
    <div class="row">
        <h1>{{$title}} Category Page</h1>
    </div>
</div>

            <div class="container marketing">

                <div class="row">
@foreach ($products['data'] as $data)    
              <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">{{$data['name']}}</strong>
          <h3 class="mb-0"></h3>
          <div class="mb-1 text-muted">Price :{{$data['price']}}</div>
          <p class="card-text mb-auto">{{$data['description']}}</p>
          <input type="button" id="{{$data['id']}}" value="Add To Cart" class="add_to_cart"/>
          <input type="button" value="Reade more" onclick="window.location='{{url('product').'/'.$data['id']}}'">
          <input type="button" value="Back" onclick="window.location ='{{url('/')}}'">
        </div>
        <div class="col-auto d-none d-lg-block">
            <image  class="bd-placeholder-img mt-4" width="200" height="250" src="{{asset('images')."/".$data['image']}}">
        </div>
      </div>
    </div>
                    
                    
@endforeach
                </div><!-- /.row -->
     
{{ $objProducts->links() }}
            </div><!-- /.container -->

@endsection