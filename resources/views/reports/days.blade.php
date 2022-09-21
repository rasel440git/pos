@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2>Days Reports</h2>
        </div>
        <div class="col-md-8 text-right">
            {!! Form::open([ 'route' => ['reports.days'], 'method' => 'get' ]) !!}
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
    <div class="row">
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($sales->sum('total'),2)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Purchases</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($purchases->sum('total'),2)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Receipts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($receipts->sum('total'),2)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Payments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($payments->sum('amount'),2)}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reports DataTable Sales -->
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
                            <th>Product</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Total</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($sales as $sale)
                                                    
                            <tr>
                                <td>{{$sale->title}}</td>
                                <td class="text-right">{{$sale->quantity}}</td>
                                <td class="text-right">{{number_format($sale->price,2) }}</td>
                                <td class="text-right">{{number_format($sale->total,2)}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right">Total Items</th>
                            <th class="text-right">{{$sales->sum('quantity')}}</th>
                            <th class="text-right"> Grand Total</th>
                            <th class="text-right">{{number_format($sales->sum('total'),2)}}</th>   
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Reports DataTable Purchases -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Purchases Reports From {{$start_date}} to {{$end_date}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    
                
                    
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Total</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($purchases as $purchase)
                                                    
                            <tr>
                                <td>{{$purchase->title}}</td>
                                <td class="text-right">{{$purchase->quantity}}</td>
                                <td class="text-right">{{number_format($purchase->price,2) }}</td>
                                <td class="text-right">{{number_format($purchase->total,2)}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-right">Total Items</th>
                            <th class="text-right">{{$purchases->sum('quantity')}}</th>
                            <th class="text-right"> Grand Total</th>
                            <th class="text-right">{{number_format($purchases->sum('total'),2)}}</th>   
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div> 

    <!-- Reports DataTable Receipts -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Receipts Reports From {{$start_date}} to {{$end_date}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Phone</th>
                            <th class="text-right">Amount</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($receipts as $receipt)
                                                    
                            <tr>
                                <td class="text-right">{{$receipt->name }}</td>
                                <td class="text-right">{{$receipt->phone }}</td>
                                <td class="text-right">{{number_format($receipt->amount,2)}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr> 
                            <th colspan="2" class="text-right">Total</th>
                            <th class="text-right"> {{number_format($receipts->sum('amount'),2)}}</th>                           
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!-- Reports DataTable Payments -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payments Reports From {{$start_date}} to {{$end_date}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Phone</th>
                            <th class="text-right">Amount</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($payments as $payment)
                                                    
                            <tr>
                                <td class="text-right">{{$payment->name }}</td>
                                <td class="text-right">{{$payment->phone }}</td>
                                <td class="text-right">{{number_format($payment->amount,2)}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr> 
                            <th colspan="2" class="text-right">Total</th>
                            <th class="text-right"> {{number_format($payments->sum('amount'),2)}}</th>                           
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection