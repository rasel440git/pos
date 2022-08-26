@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{route('products.index')}}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        
        

    </div>

    <!-- DataTales Example -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users DataTables </h6>
        </div>
        <div class="card-body">
            
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-8">
                    <table class="table table-borderless table-striped">
                        <tr>
                            <th class="text-right">Category :</th>
                            <td>{{$product->category->title}}</td>
                        </tr>
        
                        <tr>
                            <th class="text-right">Title :</th>
                            <td>{{$product->title}}</td>
                        </tr>
        
                        <tr>
                            <th class="text-right">Description :</th>
                            <td>{{$product->desc}}</td>
                        </tr>
        
                        <tr>
                            <th class="text-right">Cost Price :</th>
                            <td>{{$product->cost_price}}</td>
                        </tr>
        
                        <tr>
                            <th class="text-right">Sales Price :</th>
                            <td>{{$product->price}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            

        </div>
    </div>
@endsection