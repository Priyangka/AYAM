@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Update a Cost</h1>

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
		<form method="post" action="{{ route('updateCost', $Cost->id) }}">
			@csrf
			<div class="form-group">

				<label for="cost_name">Cost Name:</label>
				<input type="text" class="form-control" name="cost_name" value={{$Cost->cost_name }}>
			
			</div>

			<div class="form-group">
				<label for="cost">Cost Amount: RM</label>
				<input type="number" class="form-control" name="cost" value={{$Cost->cost }} />
			</div>

			<div class="form-group">
				<label for="stock_id">Stock:</label>
				<select id="stock_id" name="stock_id" class="form-control" value={{$Cost->stock_id}}>
					@foreach($stock as $stock)
					<option value="{{$stock->id}}">{{$stock->stock_name}}</option>
					@endforeach
				</select>
			</div>

			<br>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection