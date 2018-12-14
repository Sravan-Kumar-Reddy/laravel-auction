@extends('layouts.app')

@section('content')
	<h1>Auctions</h1>
	<table class="table">
				<thead>
				    <tr>
				      	<th scope="col">Product Name</th>
				      	<th scope="col">Current Price</th>
				      	<th scope="col"></th>
				      	<th scope="col"></th>
				    </tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					    <tr>
					      	<th scope="row">{{$product->Name}}</th>
					      	<td>{{$product->Cost}}</td>
					      	<div id="Value">
					      	<td><input type="number" name="current Price"></td></div>
					      	<td>
					      		<a class="btn btn-primary">Bid</a> 
					      	</td><!--Event Trigger to increase the bid-->
					    </tr>
					@endforeach
				</tbody>
			</table>					
	
@endsection