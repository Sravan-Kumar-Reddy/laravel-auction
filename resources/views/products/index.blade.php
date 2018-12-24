@extends('layouts.app')

@section('content')
	<h3>Products</h3>
	@if(count($products)>0)
		@foreach($products as $product)

			<div class="card" style="margin-bottom: 15px">
  				<div class="card-body">
    				<h5 class="card-title">{{ $product->Name }}</h5>
    				<h6 class="card-subtitle mb-2 text-muted">This Product is added by {{$product->user->name}}.</h6>
    				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

    				<div class="row"  style="padding-bottom: 10px;">
    					<div class="col-6"><a href="/products/{{$product->id}}" class="card-link col-6 btn btn-primary">View</a></div>
    					<div class="col-6"><a href="/products/{{$product->id}}" class="card-link col-6 btn btn-success">Buy</a></div>
    				</div>
  				</div>
			</div>
		@endforeach
		{{$products->links()}}
		<!--Pagination HERE-->
	@else
		<p>No Products Yet</p>
	@endif
@endsection