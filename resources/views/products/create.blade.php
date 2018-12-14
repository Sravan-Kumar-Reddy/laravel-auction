@extends('layouts.app')

@section('content')
	<h1>Add a new Product</h1>
	
	<form action="/products" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<div>
				<label for="Name" >Name:</label>
				<input type="text" name="Name" placeholder="Enter the Name of Product" class="form-control">
			</div>
			<div>
				<label for="Cost" >Cost:</label>
				<input type="text" name="Cost" placeholder="Price of the Product" class="form-control">
			</div><br>
			<div>
				<label for="to_be_auctioned_on" >Auction Date:</label>
				<input type="date" name="to_be_auctioned_on" placeholder="To be Auctioned on .." class="form-control">
			</div><br>
			<!--<div class="form-group">
				<input type="file" name="product_image" id="image">
			</div>-->
			<div>
				<button type="submit" class="btn btn-primary">Add Product</button>		
			</div>		
		

		</div>	
	</form>
@endsection