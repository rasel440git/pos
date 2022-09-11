@extends('layout.main')

@section('main_contant')
    
    <div class="row clearfix page_header">
        <div class="col-md-4">
            <a class="btn btn-info" href="{{route('users.index')}}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        
        <div class="col-md-8 text-right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
                    <i class="fa fa-plus"></i> New Sale
                </button>

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
                    <i class="fa fa-plus"></i> New Purchase
                </button>
                
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                    <i class="fa fa-plus"></i> New Payment
                </button>

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
                    <i class="fa fa-plus"></i> New Receipt
                </button>

        </div>

    </div>

    @yield('user_card')

    @include('users.user_layout_content')

<!-- Modal for add new Payment -->

    <!-- Modal -->
    <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLavel" aria-hidden="true">
      <div class="modal-dialog" role="document">

          {!! Form::open([ 'route' => ['user.payments.store', $user->id], 'method' => 'post' ]) !!}	
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="newPaymentModalLavel">New Payments</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">

                  <div class="form-group row">
                      <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                      <div class="col-sm-9">
                        {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
                      <div class="col-sm-9">
                        {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label for="note" class="col-sm-3 col-form-label">Note </label>
                      <div class="col-sm-9">
                        {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
                      </div>
                    </div>
  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>	
            </div>
          </div>

       {!! Form::close() !!}

      </div>
  </div>


<!-- Modal for add Receipt-->
<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLavel" aria-hidden="true">
  <div class="modal-dialog" role="document">

      {!! Form::open([ 'route' => ['user.receipts.store', $user->id], 'method' => 'post' ]) !!}	
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="newReceiptModalLavel">New Receipts</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">

              <div class="form-group row">
                  <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                  <div class="col-sm-9">
                    {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
                  <div class="col-sm-9">
                    {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'id' => 'amount', 'placeholder' => 'Amount', 'required' ]) }}
                  </div>
                </div>

                <div class="form-group row">
                  <label for="note" class="col-sm-3 col-form-label">Note </label>
                  <div class="col-sm-9">
                    {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
                  </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>	
        </div>
      </div>

   {!! Form::close() !!}

  </div>
</div>   


<!-- Modal for New Sales-->
<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLavel" aria-hidden="true">
<div class="modal-dialog" role="document">

    {!! Form::open([ 'route' => ['user.sales.store', $user->id], 'method' => 'post' ]) !!}	
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="newSaleModalLavel">New Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                <div class="col-sm-9">
                  {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
                </div>
              </div>

              <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label">Invoice No </label>
                <div class="col-sm-9">
                  {{ Form::text('invoice_id', NULL, [ 'class'=>'form-control', 'id' => 'invoice_id', 'placeholder' => 'invoice id' ]) }}
                </div>
              </div>

              <div class="form-group row">
                <label for="note" class="col-sm-3 col-form-label">Note </label>
                <div class="col-sm-9">
                  {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
                </div>
              </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>	
      </div>
    </div>

 {!! Form::close() !!}

</div>
</div>   

<!-- Modal for New Purchases-->
<div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newPurchaseModalLavel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
      {!! Form::open([ 'route' => ['user.purchases.store', $user->id], 'method' => 'post' ]) !!}	
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="newPurchaselLavel">New Purchase</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
  
              <div class="form-group row">
                  <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                  <div class="col-sm-9">
                    {{ Form::date('date', NULL, [ 'class'=>'form-control', 'id' => 'date', 'placeholder' => 'Date', 'required' ]) }}
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="amount" class="col-sm-3 col-form-label">Invoice No </label>
                  <div class="col-sm-9">
                    {{ Form::text('invoice_id', NULL, [ 'class'=>'form-control', 'id' => 'invoice_id', 'placeholder' => 'invoice id' ]) }}
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="note" class="col-sm-3 col-form-label">Note </label>
                  <div class="col-sm-9">
                    {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'id' => 'note', 'rows' => '3', 'placeholder' => 'Note' ]) }}
                  </div>
                </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>	
        </div>
      </div>
  
   {!! Form::close() !!}
  
  </div>
  </div>   

    

@endsection