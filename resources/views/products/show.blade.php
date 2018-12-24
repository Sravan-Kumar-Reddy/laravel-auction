@extends('layouts.app')

@section('content')

	<div class="card" style="width: 18rem;margin:0 37%">
  		<div class="card-body">
    		<h5 class="card-title">{{$product->Name}}</h5>
    		<h6 class="card0-subtitle mb-2 text-muted">{{$product->user->name}}</h6>
    		<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		    <div class="row">
    			<div class="col-6">	
    			</div>
    			<div class="col-6">
    				<p><strong>Cost:</strong> Rs.{{$product->Cost}}</p>
    			</div>
    		</div>
  		</div>
	</div>
	<hr>
	@if(!Auth::guest())
		@if(Auth::user()->id == $product->user_id)
			<button class="btn btn-default">
				<a href="/products/{{$product->id}}/edit">Edit</a>
			</button>
			<br><br>
			<form action="/products/{{$product->id}}" method="POST"><!--NEED TO MOVE TO THE RIGHT-->
				{{ method_field('DELETE')}} 	
				{{ csrf_field() }} 				

				<div>
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>	
			</form>
		@else
			<a href="#"><button type="button" class="btn btn-success"style="align-content: right">Buy This</button></a>
		
		@endif
	@else
		<h5 style="text-align: center;">Login to either add or buy products</h5>
	@endif

@endsection