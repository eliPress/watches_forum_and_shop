

@extends('cms.master')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="container pt-4 mb-5">
        <div class="row">
            <h1>{{$title}} Page</h1>
        </div>
    </div>

    <div class="container marketing">

        <div class="row ">



            <table class="table table-bordered table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">product name</th>
                        <th scope="col">Category name</th>
                        <th scope="col">product Description</th>
                        <th scope="col">product Image</th>
                        <th scope="col">product Price</th>
                        <th scope="col">Edit category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @foreach($products as $data)
                   

                    <tr>
                        <th scope="row">{{$counter++}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->cat_name}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->image}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <button id="{{$data->id}}" onclick="window.location ='{{url('cms/products/allProducts/'.$data->id.'/edit')}}'"/>
                            <i class="fas fa-edit"></i>
                            </button>
                        </td>
                      <td>
                            <button id="{{$data->id}}" onclick="window.location ='{{url('cms/products/allProducts/'.$data->id)}}'"/>
                            <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                       
                    </tr>
                    @endforeach

 <td>
                          
                        </td>
                </tbody>
            </table>
              <button id="{{$data->id}}" onclick="window.location ='{{url('cms/products/allProducts/create')}}'"/>
                            Add Product
                            </button>
            <div class="row">
               
            </div>
        </div><!-- /.row -->



        <div class="wrapperit" style="display: grid;
             grid-template-columns: 100px 100px 100px;
             grid-gap: 10px;background-color: #fff;position: absolute;left: 70%;top:250px;
             color: #444;">


        </div>
    </div><!-- /.container -->
</main>

@endsection