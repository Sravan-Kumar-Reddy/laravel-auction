@extends('layouts.app')

@section('content')
	<h1>Bid</h1>
	<table class="table">
		<td>
			<tr>{{$product->Name}}</tr>
			<tr>
				<input type="number" name="Current Price">
			</tr>
		</td>
	</table>
@endsection