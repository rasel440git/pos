@extends('layout.main')

@section('main_contant')
    

    <div class="row clearfix page_header">
        <div class="col-md-6">
            <h2>User List</h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-info" href="{{url('users/create')}}"><i class="fa fa-plus"></i> New User</a>
        </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users DataTables </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Group ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-right">Action</th>  
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Group ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-right">Action</th>                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            
                        
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->group->title}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td class="text-right">
                                    
                                    <form method="POST" action=" {{ route('users.destroy', ['user' => $user->id]) }} ">
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user' => $user->id]) }}"> 
                                             <i class="fa fa-eye"></i> 
                                        </a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}"> 
                                            <i class="fa fa-edit"></i> 
                                       </a>
                                       @if($user->sales()->count() ==0)

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
                </table>
            </div>
        </div>
    </div>
@endsection