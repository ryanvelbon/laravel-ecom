@extends('layouts.admin')

@section('content')
<h1>Create a Product</h1>
<form class="row g-3" method="POST" action="{{ route('admin.products.store') }}" autocomplete="off">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required>

		<textarea class="form-control" name="description" id="description" rows="4" cols="50" placeholder="Describe the product..." required>{{ old('description') }}</textarea>

		<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{ old('slug') }}" required>

		<input type="text" class="form-control" name="sku" id="sku" placeholder="SKU" value="{{ old('sku') }}" required>

		<input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ old('price') }}" required>

		<div class="col-12">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>

		<input type="hidden" name="token" value="{{ Session::token() }}">
</form>
@endsection