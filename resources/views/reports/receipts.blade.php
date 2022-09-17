@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <h2>Receipts Reports</h2>
        </div>
        <div class="col-md-8 text-right">
            {!! Form::open([ 'route' => ['reports.receipts'], 'method' => 'get' ]) !!}
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
            <h6 class="m-0 font-weight-bold text-primary">Payments Reports From {{$start_date}} to {{$end_date}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Date</th>    
                            <th>User</th>
                            <th class="text-right">Amount</th>                           
                        </tr>
                    </thead>
                                        
                    <tbody>
                        @foreach ($receipts as $receipt)
                                                    
                            <tr>
                                <td>{{$receipt->date}}</td> 
                                <td class="text-right">{{optional($receipt->user)->name }}</td>
                                <td class="text-right">{{$receipt->amount}}</td> 
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                    <tfoot>
                        <tr>  
                            <th class="text-right" colspan="2">Total</th>
                            <th class="text-right"> {{$receipts->sum('amount')}}</th>                           
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection