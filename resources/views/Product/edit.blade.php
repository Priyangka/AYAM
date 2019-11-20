@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Update a Product</h1>

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
		<form method="post" action="{{ route('updateProduct', $Product->id) }}">
			{{ csrf_field() }}
			<div class="form-group">

				<label for="pro_name">Product Name:</label>
				<select id="pro_name" name="pro_name" class="form-control" value={{$Product->pro_name}}>

					@php

					$A = 0;
					$D = 0;
					$K = 0;
					$Dr = 0;
					$P = 0;
					$PP = 0;

					$ayam = 0;
					$kepak = 0;
					$drum = 0;
					$paha = 0;
					$pehaPenuh = 0;
					$dada = 0;
					$test = 0;


					@endphp


					@foreach($all as $all)
					@if($all->pro_name == "Ayam Bulat")
					@php
					$A = 1;
					@endphp

					@elseif($all->pro_name == "Dada")
					@php
					$D = 1;
					@endphp

					@elseif($all->pro_name == "Kepak")
					@php
					$K = 1;
					@endphp

					@elseif($all->pro_name == "Drumstik")
					@php
					$Dr = 1;
					@endphp


					@elseif($all->pro_name == "Paha")
					@php
					$P = 1;
					@endphp

					@elseif($all->pro_name == "Peha Penuh")
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
					<option value="Paha">Peha Ayam</option>
					@endif

					@if($PP == 0)
					<option value="Peha Penuh">Peha Penuh Ayam</option>
					@endif


					@if(($PP == 1) && ($A == 1) && ($D == 1) && ($K == 1) && ($Dr == 1) && ($P == 1))

					@foreach($products as $product)

					@php

					

					if($product->pro_name == "Ayam Bulat")
					{
						$ayam = 1;
					}
					elseif($product->pro_name == "Kepak")
					{
						$kepak = 1;

					}
					elseif($product->pro_name == "Drumstik")
					{
						$drum = 1;
					}
					elseif($product->pro_name == "Paha")
					{
						$paha = 1;	
					}
					elseif($product->pro_name == "Peha Penuh")
					{
						$pehaPenuh = 1;
					}
					elseif($product->pro_name == "Dada")
					{
						$dada = 1;
					}

					@endphp

					@endforeach
					@endif



					@if($dada == 1)
					<option value="Dada">Dada Ayam</option>
					@endif

					
					<option value="Ayam Bulat">Ayam Bulat</option>
					

					@if($kepak == 1)
					<option value="Kepak">Kepak Ayam</option>
					@endif

					@if($drum == 1)
					<option value="Drumstik">Drumstik Ayam</option>
					@endif

					@if($paha == 1)
					<option value="Paha">Peha Ayam</option>
					@endif

					@if($pehaPenuh == 1)
					<option value="Peha Penuh">Peha Penuh Ayam</option>
					@endif





				</select>
			</div>

			<div class="form-group">
				<label for="pro_demand">Product Demand:</label>
				<input type="number" class="form-control" name="pro_demand" value={{$Product->pro_demand }} />
			</div>

			<div class="form-group">
				<label for="dem_unit">Demand Unit:</label>
				<select id="dem_unit" name="dem_unit" class="form-control" value={{$Product->dem_unit}}>
					<option value="Kg">Kg</option>
					<option value="Qty">Qty</option>
				</select>
			</div>

			<div class="form-group">
				<label for="price_per_kg">Price Per Kg:</label>
				<input type="number" class="form-control" name="price_per_kg" value={{$Product->price_per_kg }} />
			</div>
			<div class="form-group">
				<label for="weight_per_qty">Weight Per Qty:</label>
				<input type="number" class="form-control" name="weight_per_qty" value={{$Product->weight_per_qty }} />
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>
@endsection