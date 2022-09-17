@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2>User List</h2>
        </div>
        

    </div>

    <!-- DataTales Example -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products DataTables </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Purchase </th>
                            <th>Sale</th>
                            <th>Stocks</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($products as $product)
                            
                        
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->title }}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$purchase = $product->purchaseItem()->sum('quantity')}}</td>
                                <td>{{$sale = $product->saleItem()->sum('quantity')}}</td>
                                <td>{{$purchase-$sale}}</td>
                                                              
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Purchase </th>
                            <th>Sale</th>
                            <th>Stocks</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection