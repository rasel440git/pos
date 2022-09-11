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

