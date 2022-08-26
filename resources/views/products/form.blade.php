@extends('layout.main')

@section('main_contant')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <h2>{{$headline}}</h2>

    <div class="card shadow md-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$headline}}</h6>        
        </div>
        <div class="card-body">
            <div class="row justify-content-md-center">
                <div class="col-md-5">

                    @if($mode == 'edit')
	    				{!! Form::model($product, [ 'route' => ['products.update', $product->id], 'method' => 'put' ]) !!}
	    			@else
	    				{!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!}	
	    			@endif
                        

                            <div class="form-group">
                                 {{ Form::select('category_id',$categories,NULL, ['class' => 'form-control', 'id'=>'category_id', 'placeholder'=>'Product Category']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::text('title',NULL, ['class' => 'form-control', 'id'=>'title', 'placeholder'=>'Title']) }}
                            </div>
                            
                            <div class="form-group">
                                {{ Form::textarea('desc',NULL, ['class' => 'form-control', 'id'=>'desc', 'placeholder'=>'Description']) }}
                           </div>

                           <div class="form-group">
                               {{ Form::text('cost_price',NULL, ['class' => 'form-control', 'id'=>'cost_price', 'placeholder'=>'Cost Price']) }}
                             </div>

                             <div class="form-group">
                               {{ Form::text('price',NULL, ['class' => 'form-control', 'id'=>'price', 'placeholder'=>'Price']) }}
                           </div>
                           
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          
                        
                        {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
@endsection

