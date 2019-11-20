@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<form method="post" action="{{route('storeProduct')}}" class="form-horizontal" >
	@csrf
	<fieldset>

		<!-- Form Name -->
		<legend>Create New Product</legend>

		<!-- Text input-->
		<!-- <div class="form-group">
			<label class="col-md-6 control-label" for="pro_name">Product Name</label>  
			<div class="col-md-6">
				<input id="pro_name" name="pro_name" type="text" placeholder="Product Name" class="form-control input-md" required="">

			</div>
		</div> -->
		<div class="form-group">
			<label class="col-md-6 control-label" for="pro_name">Product</label>
			<div class="col-md-6"> 
				<select id="pro_name" name="pro_name" class="form-control">

					@php
					$A = 0;
					$D = 0;
					$K = 0;
					$Dr = 0;
					$P = 0;
					$PP = 0;


					@endphp


					@foreach($product as $products)

					@if($products->pro_name == "Ayam Bulat")
					@php
					$A = 1;
					@endphp

					@elseif($products->pro_name == "Dada")
					@php
					$D = 1;
					@endphp

					@elseif($products->pro_name == "Kepak")
					@php
					$K = 1;
					@endphp

					@elseif($products->pro_name == "Drumstik")
					@php
					$Dr = 1;
					@endphp


					@elseif($products->pro_name == "Paha")
					@php
					$P = 1;
					@endphp

					@elseif($products->pro_name == "Peha Penuh")
					@php
					$PP = 1;
					@endphp

					@endif

					@endforeach	


					@if($A == 0)
					<option value="Ayam Bulat">Ayam Bulat</option>
					@endif

					@if($D == 0)
					<option value="Dada">Dada Ayam</option>
					@endif

					@if($K == 0)
					<option value="Kepak">Kepak Ayam</option>
					@endif

					@if($Dr == 0)
					<option value="Drumstik">Drumstik Ayam</option>
					@endif

					@if($P == 0)
					<option value="Peha">Peha Ayam</option>
					@endif

					@if($PP == 0)
					<option value="Peha Penuh">Peha Penuh Ayam</option>
					@endif

					@if(($PP == 1) && ($A == 1) && ($D == 1) && ($K == 1) && ($Dr == 1) && ($P == 1) && ($PP == 1) )
					<option disabled selected value>All chicken parts have been selected</option>
					@endif

					
				</select>
			</div>
		</div>

		<!-- Text input-->
		<div class="form-group">
			<label class="col-md-6 control-label" for="pro_demand">Demand Amount</label>  
			<div class="col-md-6">
				<input id="pro_demand" name="pro_demand" type="number" step="any" placeholder="Demand Amount" class="form-control input-md" required="">

			</div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
			<label class="col-md-6 control-label" for="dem_unit">Unit</label>
			<div class="col-md-6">
				<select id="dem_unit" name="dem_unit" class="form-control">
					<option value="Kg">Kg</option>
					<option value="Qty">Qty</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-6 control-label" for="price_per_kg">Price Per Kg</label>  
			<div class="col-md-6">
				<input id="price_per_kg" name="price_per_kg" type="number" step="any" placeholder="Price Per Kg" class="form-control input-md" required="">

			</div>

			<br>
			<div class="form-group">
				<label class="col-md-6 control-label" for="weight_per_qty">Weight Per Quantity</label>  
				<div class="col-md-6">
					<input id="weight_per_qty" name="weight_per_qty" type="number" step="any" placeholder="Weight Per Quantity" class="form-control input-md" required="">

				</div>
			</div>

			<div class="form-group">
				<label class="col-md-6 control-label" for="stock_id">Stock</label>
				<div class="col-md-6">
					<select id="stock_id" name="stock_id" class="form-control">
						@foreach($stock as $stock)
						<option value="{{$stock->id}}">{{$stock->stock_name}}</option>
						@endforeach
					</select>
				</div>
			</div>


			<button type="submit" class="btn btn-success">Add Product</button>
			<button type="reset" class="btn btn-danger">Clear Entries</button>
		</fieldset>
	</form>

	@endsection
