@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-4">
            <a class="btn btn-info" href="{{route('users.index')}}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        
        <div class="col-md-8 text-right">
            <a class="btn btn-info" href="{{url('users/create')}}"><i class="fa fa-plus"></i> New Sale</a>
            <a class="btn btn-info" href="{{url('users/create')}}"><i class="fa fa-plus"></i> New Purchase</a>
            <a class="btn btn-info" href="{{url('users/create')}}"><i class="fa fa-plus"></i> New Payment</a>
            <a class="btn btn-info" href="{{url('users/create')}}"><i class="fa fa-plus"></i> New Receipt</a>

        </div>

    </div>

    <div class="row clearfix mt-5">
        <div class="col-md-2">
            <div class="nav flex-column nav-pills">
                <a class="nav-link @if($tab_manu=='User info')active @endif" href="{{route('users.show',$user->id) }}">User Info</a>
                <a class="nav-link @if($tab_manu=='Sales')active @endif" href="{{route('user.sales',$user->id) }}">Sales</a>
                <a class="nav-link @if($tab_manu=='Purchases')active @endif" href="{{route('user.purchases',$user->id) }}">Purchases</a>
                <a class="nav-link @if($tab_manu=='Payments')active @endif"href="{{route('user.payments',$user->id) }}">Payments</a>
                <a class="nav-link @if($tab_manu=='Receipts')active @endif"href="{{route('user.receipts',$user->id) }}">Receipts</a>

            </div>
        </div>

        <div class="col-md-10">
            @yield('user_contant')
        </div>
        <!-- DataTales Example -->
        
    </div>

@endsection