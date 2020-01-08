@extends('layouts.admin')

@section('content')
<head>
	<meta charset="utf-8"> 

  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
  <link  rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">        </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
</head>
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
