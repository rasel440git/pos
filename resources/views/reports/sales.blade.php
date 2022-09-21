@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2>Sales Reports</h2>
        </div>
        <div class="col-md-8 text-right">
            {!! Form::open([ 'route' => ['reports.sales'], 'method' => 'get' ]) !!}
                <div class="form-row align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Start Date</label>
                    <div class="input-group mb-2">
                    {{ Form::date('start_date', $start_date, [ 'class'=>'form-control', 'id' => 'start_date', 'placeholder' => 'Start Date']) }}
                    </div>
                  </div>

                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">End Date</label>
                    <div class="input-group mb-2">
                    {{ Form::date('end_date', $end_date, [ 'class'=>'form-control', 'id' => 'end_date', 'placeholder' =>'End Date']) }}
                    </div>
                  </div>
                  
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                  </div>
                </div>
            {!! Form::close() !!}
        </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales Reports From {{$start_date}} to {{$end_date}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Date</th>    
                            <th>Product</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Total</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($sales as $sale)
                                                    
                            <tr>
                                <td>{{$sale->date}}</td> 
                                <td>{{$sale->title}}</td>
                                <td class="text-right">{{$sale->quantity}}</td>
                                <td class="text-right">{{$sale->price }}</td>
                                <td class="text-right">{{$sale->total}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th class="text-right">Total Items</th>
                            <th class="text-right">{{$sales->sum('quantity')}}</th>
                            <th class="text-right"> Grand Total</th>
                            <th class="text-right">{{$sales->sum('total')}}</th>   
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection