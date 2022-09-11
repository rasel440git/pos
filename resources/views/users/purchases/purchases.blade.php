@extends('users.user_layout')

@section('user_contant')

        
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Purchases of <strong>{{$user->name}}</strong> </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                          {{-- {{$groups}}   --}}
                            
                            <thead>
                                <tr>
                                    <th>Chalan No</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>                                    
                                    <th class="text-right">Action</th>  
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    
                                    $TotalItem=0;
                                    $grandTotal=0;
                                ?>

                                @foreach ($user->purchases as $purchase)
                                    
                                
                                    <tr>
                                        <td>{{$purchase->invoice_id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$purchase->date}}</td>
                                        <td>
                                            <?php
                                                $itemQty= $purchase->items()->sum('quantity');
                                                $TotalItem= $itemQty;
                                                echo $itemQty;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $total= $purchase->items()->sum('total');
                                                $grandTotal= $total;
                                                echo $total;
                                            ?>
                                        </td>
                                        <td class="text-right">
                                            
                                            <form method="POST" action=" {{ route('user.purchases.destroy', ['id' => $user->id, 'invoice_id' =>$purchase->id]) }} ">
                                                <a class="btn btn-primary btn-sm" href="{{ route('user.purchases.invoice_details', ['id' => $user->id, 'invoice_id'=>$purchase->id]) }}"> 
                                                     <i class="fa fa-eye"></i> 
                                                </a>
                                                @if($itemQty==0)
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                                        <i class="fa fa-trash"></i>  
                                                    </button>	
                                                @endif                                                        
                                                
                                            </form>
                                            
                                        </td>                                
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Chalan No</th>
                                    <th>Customer</th>
                                    <th>Date</th>
                                    <th>{{$TotalItem}}</th>
                                    <th>{{$grandTotal}}</th>                                    
                                    <th class="text-right">Action</th>  
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        <!-- DataTales Example -->

@endsection