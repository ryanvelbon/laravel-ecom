@extends('layouts.admin')

@section('css')
<style type="text/css">
	* {
		/*color: pink;*/
	}
</style>
@endsection

@section('content')
	<div class="btn-container">
		<a class="btn btn-primary" href="{{ route('admin.products.create') }}" role="button">+ Add a Product</a>
	</div>

	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Title</th>
				<th scope="col">Description</th>
				<th scope="col">Slug</th>
				<th scope="col">SKU</th>
				<th scope="col">Price</th>				
				<th scope="col">View</th>
				<th scope="col">Edit</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $product)
				<tr>
					<th scope="row">{{$product->id}}</th>
					<td>{{$product->title}}</td>
					<td><small>{{$product->description}}</small></td>
					<td>{{$product->slug}}</td>
					<td>{{$product->sku}}</td>
					<td>{{$product->price}}</td>					
					<td><a class="btn btn-outline-primary btn-sm" href="/products/{{$product->slug}}" role="button">View</a></td>
					<td><a class="btn btn-outline-primary btn-sm" href="/admin/products/{{$product->id}}/edit" role="button">Edit</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection