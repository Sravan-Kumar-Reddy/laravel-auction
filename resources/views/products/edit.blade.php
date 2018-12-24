@extends('layouts.app')

@section('content')
	<h1>Update Product</h1>
	
	<form action="/products/{{$product->id}}" method="POST">
		{{method_field('PATCH ')}}
		{{ csrf_field() }}
		<div class="form-group">
			<div>
				<label for="Name" >Name:</label>
				<input type="text" name="Name" placeholder="Enter the Name of Product" class="form-control" value="{{$product->Name}}">
			</div>
			<div>
				<label for="Cost" >Cost:</label>
				<input type="text" name="Cost" placeholder="Price of the Product" class="form-control" value="{{$product->Cost}}">
			</div>
			<br>
			<div>
				<button type="submit" class="btn btn-primary">Submit</button>		
			</div>		
		

		</div>	
	</form>
@endsection