@extends('users.user_layout')

@section('user_contant')

        
<!-- Reports DataTable Sales -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales Reports </h6>
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
            <h6 class="m-0 font-weight-bold text-primary">Purchases Reports</h6>
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
            <h6 class="m-0 font-weight-bold text-primary">Receipts Reports</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th class="text-right">Amount</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($receipts as $receipt)
                                                    
                            <tr>
                                <td >{{$receipt->date }}</td>
                                <td class="text-right">{{number_format($receipt->amount,2)}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr> 
                            <th class="text-right">Total</th>
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
            <h6 class="m-0 font-weight-bold text-primary">Payments Reports </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th class="text-right">Amount</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($payments as $payment)
                                                    
                            <tr>
                                <td>{{$payment->date }}</td>
                                <td class="text-right">{{number_format($payment->amount,2)}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr> 
                            <th class="text-right">Total</th>
                            <th class="text-right"> {{number_format($payments->sum('amount'),2)}}</th>                           
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection