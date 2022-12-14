@extends('users.invoice_layout')

@section('user_contant')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sales Invoice Details </h6>
        </div>
        <div class="card-body">
            
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-6">
                    <p><strong>Customer :</strong> {{$user->name}}</p>
                    <p><strong>Email :</strong> {{$user->email}}</p>
                    <p><strong>Phone :</strong>  {{$user->phone}}</p>
                </div>

                <div class="col-md-6 ">
                    <p><strong>Date :</strong> {{$invoice->date}}</p>
                    <p><strong>Invoice No :</strong>  {{$invoice->invoice_id}}</p>
                    
                </div>
            </div>
            <div class="invoice_item">
                <table class="table table-borderless">
                    <thead>
                        <th>SL</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th class="text-right">Total</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($invoice->items as $key =>$item)
                            
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->product->title}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td class="text-right">{{$item->total}}</td>
                                <td>
                                    <form method="POST" action=" {{ route('user.sales.invoice.delete_item', ['id' => $user->id, 'invoice_id' =>$invoice->id,'item_id' =>$item->id]) }} ">
                                                                                        
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                            <i class="fa fa-trash"></i>  
                                        </button>	
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th></th>   
                        <th> <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProcuct">
                            <i class="fa fa-plus"></i>Add Product
                             </button>
                        </th>                        
                        <th colspan="2" class="text-right">Total :</th>                        
                        <th class="text-right">{{$totalPayable = $invoice->items()->sum('total')}}</th>
                        <th></th>
                    </tr>

                      <tr>
                        <th></th>   
                        <th> <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newReceiptForInvoice">
                            <i class="fa fa-plus"></i>Add Receipt
                             </button>
                        </th>                        
                        <th colspan="2" class="text-right">Paid :</th>                        
                        <th class="text-right">{{$totalPaid = $invoice->receipts()->sum('amount')}}</th>
                        <th></th>
                      </tr>

                      <tr>                                            
                        <th colspan="4" class="text-right">Due :</th>                        
                        <th class="text-right">{{$totalPayable - $totalPaid }}</th>
                        <th></th>
                      </tr>

                    
                </table>

            </div>
            

        </div>
    </div>
    
     <!-- Modal for add New Product-->
     <div class="modal fade" id="newProcuct" tabindex="-1" role="dialog" aria-labelledby="newProcuctModalLavel" aria-hidden="true">
        <div class="modal-dialog" role="document">
  
            {!! Form::open([ 'route' => ['user.sales.invoices.add_item', ['id' =>$user->id, 'invoice_id' =>$invoice->id]], 'method' => 'post' ]) !!}	
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newProcuctModalLavel">New Sale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
  
                    <div class="form-group row">
                        <label for="product" class="col-sm-3 col-form-label text-right" > Products <span class="text-danger">*</span> </label>
                        <div class="col-sm-9">
                            {{ Form::select('product_id',$products,NULL, ['class' => 'form-control', 'id'=>'product', 'placeholder'=>'Select Product']) }}
                       </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="amount" class="col-sm-3 col-form-label text-right">Unit Price <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                          {{ Form::text('price', NULL, [ 'class'=>'form-control', 'id' => 'price', 'onkeyup' => 'getTotal()', 'required', 'placeholder' => 'Unit price' ]) }}
                        </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label text-right">Quantity <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                          {{ Form::text('quantity', NULL, [ 'class'=>'form-control', 'id' => 'quantity','onkeyup' => 'getTotal()', 'required', 'placeholder' => 'Quantity' ]) }}
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label text-right">Total <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                          {{ Form::text('total', NULL, [ 'class'=>'form-control', 'id' => 'total',  'placeholder' => 'Total' ]) }}
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

    <!-- New Receipt for Invoice-->
    <div class="modal fade" id="newReceiptForInvoice" tabindex="-1" role="dialog" aria-labelledby="newReceiptForInvoiceModalLavel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            {!! Form::open([ 'route' => ['user.receipts.store', [$user->id, $invoice->id]], 'method' => 'post' ]) !!}	
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="newReceiptForInvoiceModalLavel">New Receipt for this invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-9">
                          {{ Form::date('date', NULL, [ 'class'=>'form-control', 'placeholder' => 'Date', 'required' ]) }}
                        </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="amount" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span>  </label>
                        <div class="col-sm-9">
                          {{ Form::text('amount', NULL, [ 'class'=>'form-control', 'placeholder' => 'Amount', 'required' ]) }}
                        </div>
                      </div>
    
                      <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label">Note </label>
                        <div class="col-sm-9">
                          {{ Form::textarea('note', NULL, [ 'class'=>'form-control', 'rows' => '3', 'placeholder' => 'Note' ]) }}
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

    <script type="text/javascript">
        function getTotal(){

          var price = document.getElementById("price").value;
          var quantity = document.getElementById("quantity").value;
          if(price && quantity){
            var total = price*quantity;
            document.getElementById("total").value = total;
            //console.log(Total);
          }
        }
    </script>


@stop