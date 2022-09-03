@extends('users.user_layout')

@section('user_contant')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Payments of <strong>{{$user->name}}</strong> </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                          {{-- {{$groups}}   --}}
                            
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Paymant By</th>
                                    <th>Date</th>
                                    <th>Total</th> 
                                    <th>Note</th>  
                                    <th class="text-right">Action</th>  
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    
                                    <th colspan="3" class="text-right">Total :</th>
                                    <th>{{$user->payments()->sum('amount')}}</th>  
                                    <th colspan="2"></th>                                                                     
                                     
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($user->payments as $payment)
                                    
                                
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{ optional($payment->admin)->name}}</td>  
                                        <td>{{$payment->date}}</td>                                        
                                        <td>{{$payment->amount}}</td>
                                        <td>{{$payment->note}}</td>
                                        <td class="text-right">
                                            
                                            <form method="POST" action=" {{ route('user.payments.destroy', ['id' => $user->id, 'payment_id'=> $payment->id]) }} ">
                                                                                                        
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
                        </table>
                    </div>
                </div>
            </div>
        

@endsection