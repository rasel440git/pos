@extends('layout.main')

@section('main_contant')
    <h1>Welcom to Groups Page</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    
                  {{-- {{$groups}}   --}}
                    
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Action</th>  
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Action</th>                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($groups as $group)
                            
                        
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->title}}</td>
                                <td>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>                                
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection