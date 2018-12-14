@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;"><h5>Dashboard</h5></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/products/create" class="btn btn-primary pull-right">Add Product</a><br><br><hr>
                    <h3>Your Products</h3>
                    @if(count($products) > 0)
                        <table class="table tabel-striped">
                            <tr>
                                <th>Name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <th>{{$product->Name}}</th>
                                    <th><a href="/products/{{$product->id}}/edit" class="btn btn-default">Edit</a></th>
                                    <th><form action="/products/{{$product->id}}" method="POST"><!--NEED TO MOVE TO THE RIGHT-->
                                    {{ method_field('DELETE')}}     
                                    {{ csrf_field() }}              

                                        <div>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>  
                                    </form></th>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>No Products Yet</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
