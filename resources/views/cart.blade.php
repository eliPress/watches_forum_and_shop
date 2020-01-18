

@extends('master.master')

@section('content')
<div class="container pt-4 mb-5">
    <div class="row">
        <h1>{{$title}}Product Page</h1>
    </div>
</div>

<div class="container marketing">

    <div class="row ">



        <table class="table table-bordered table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Qun</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Tottal Price</th>
                    <th scope="col">Delet Product</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                @foreach($CartContent as $data)
                

                <tr>
                    <th scope="row">{{$counter++}}</th>
                    <td>{{$data->name}}</td>
                    <td>
                        <button id="{{$data->id}}" class="add_to_cart"/>
                        <i class="far fa-plus-square"></i>
                        </button>
                        {{$data->quantity}}
                        <button id="{{$data->id}}" class="remove_from_cart"/>

                        <i class="far fa-minus-square"></i>
                        </button>
                    </td>
                    <td>{{$data->price}}$</td>
                    <td>{{$data->quantity*$data->price}}</td>
                    <td>
                        <button id="{{$data->id}}" class="delete_product"/>
                        <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        <div class="row">
            <button type="button" class="btn btn-outline-info">Total Sum: {{ Cart::getSubTotal()}}$</button>
            <input type="button" class="btn btn-success ml-3" value="Save order" onclick="window.location ='{{url('shop/save_order')}}'"/>
            @if(Session::get('sm'))
            <input type="button" class="btn btn-success ml-3" value="Pay Now" onclick="window.location ='{{url('pay')}}'"/>
            @endif
        </div>
    </div><!-- /.row -->



    <div class="wrapperit" style="display: grid;
         grid-template-columns: 100px 100px 100px;
         grid-gap: 10px;background-color: #fff;position: absolute;left: 70%;top:250px;
         color: #444;">


    </div>
</div><!-- /.container -->

@endsection