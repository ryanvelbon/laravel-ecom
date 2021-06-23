@extends('layouts.admin')

@section('content')
<h1>Edit a Product</h1>
<form class="row g-3" method="POST" action="{{ route('admin.products.update', ['product' => $product->id]) }}" autocomplete="off">

		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $product->title }}" required>

		<textarea class="form-control" name="description" id="description" rows="4" cols="50" placeholder="Describe the product..." required>{{ $product->description }}</textarea>

		<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ $product->slug }}" required>

		<input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" value="{{ $product->sku }}" required>

		<input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ $product->price }}" required>

		<div class="col-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>

		<input type="hidden" name="token" value="{{ Session::token() }}">
</form>
<br>
<form method="POST" action="{{ route('admin.products.destroy', ['product' => $product->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
@endsection