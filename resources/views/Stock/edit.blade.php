@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Update a Stock</h1>

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		<br /> 
		@endif
		<form method="post" action="{{ route('updateStock', $Stock->id) }}">
			{{ csrf_field() }}
			<div class="form-group">

				<label for="stock_name">Stock Name:</label>
				<!-- <input type="text" class="form-control" name="stock_name" value={{$Stock->stock_name }} /> -->
				<select id="stock_name" name="stock_name" class="form-control" value={{$Stock->stock_name}}>
					<option value="Ayam">Ayam</option>
				</select>
			</div>

			<div class="form-group">
				<label for="stock_qty">Stock Amount:</label>
				<input type="number" class="form-control" name="stock_qty" value={{$Stock->stock_qty }} />
			</div>

			<div class="form-group">
				<label for="stock_unit">Stock Unit:</label>
				<select id="stock_unit" name="stock_unit" class="form-control" value={{$Stock->stock_unit}}>
					<option value="Kg">Kg</option>
					<option value="Qty">Qty</option>
				</select>
			</div>

			<div class="form-group">
				<label for="stock_price_per_kg">Price Per Kg:</label>
				<input type="number" class="form-control" name="stock_price_per_kg" value={{$Stock->stock_price_per_kg }} />
			</div>
			<div class="form-group">
				<label for="stock_weight_per_qty">Weight Per Qty:</label>
				<input type="number" class="form-control" name="stock_weight_per_qty" value={{$Stock->stock_weight_per_qty }} />
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection