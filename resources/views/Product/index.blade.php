@extends('layouts.admin')

@section('content')
<html>
<head>
	<meta charset="utf-8"> 
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
  

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"  type="text/javascript"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

</head>

@if(session()->get('success'))
   <div class="alert alert-success">
    <strong> {{ session()->get('success') }}  </strong>
   </div>
 @endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<body>
		<h1>Product</h1>
		@if (session('alert'))
		<!-- <div class="alert alert-danger" role="alert">Please delete Product(s) and Cost(s) that are associated with the select Stock.</div> -->
		@elseif(session('success'))
		<div class="alert alert-success" role="alert">Product Deleted!</div>
		@endif   
		<table class="table" class="table table-striped">
			<thead >
				<tr>
					<th >ID</th>
					<th >Product Name</th>
					<th >Product Demand</th>
					<th >Demand Unit</th>
					<th >Price per Kg</th>
					<th >Weight per Qty</th>
					<th >Actions</th>
				</tr>
			</thead>
		<tbody>
				@foreach($product as $products)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$products->pro_name}}</td>
					<td>{{$products->pro_demand}}</td>
					<td>{{$products->dem_unit}}</td>
					<td>{{$products->price_per_kg}}</td>
					<td>{{$products->weight_per_qty}}</td>
					<td>
						<a class="btn btn-primary"  href="{{route('showProduct',$products->id)}}">View</a>
						<a href="{{ route('editProduct',$products->id)}}" class="btn btn-primary">Edit</a>
						<form action="{{route('deleteProduct', $products->id)}}" method="POST">
							@method('DELETE')
							@csrf							
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
	
		</tbody>
		</table>
	</body>
	</html>



		@endsection



		@section('js')

@push('scripts')
<script type="text/javascript">

	$(document).ready( function () {
	$.noConflict();
    $('.table').DataTable();
} );

</script>

@endpush
