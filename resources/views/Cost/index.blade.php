@extends('layouts.admin')

@section('content')
<html>
<head>

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
  

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"  type="text/javascript"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

</head>
<body>


		<h1 >Cost</h1>
		@if (session('alert'))
		<!-- <div class="alert alert-danger" role="alert">Please delete Product(s) and Cost(s) that are associated with the select Stock.</div> -->
		@elseif(session('success'))
		<div class="alert alert-success" role="alert">Cost Deleted!</div>
		@endif   
		<table class="table" class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Cost Name</td>
					<td>Cost</td>
					<td>Stock</td>
					<td >Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($Cost as $Cost)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$Cost->cost_name}}</td>
					<td>{{$Cost->cost}}</td>
					@foreach($Stock as $stock)
					<td>{{$stock->stock_name}}</td>
					@endforeach
					<td>
						 <a class="btn btn-primary"  href="{{route('showCost',$Cost->id)}}">View</a>
						<a href="{{ route('editCost',$Cost->id)}}" class="btn btn-primary">Edit</a>
					  
						<form action="{{route('deleteCost', $Cost->id)}}" method="POST">
							@method('DELETE')
							@csrf							
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
</body>
</html>
		@endsection

		@section('js')

@push('scripts')
<script type="text/javascript">
   
	jQuery( document ).ready(function( $ ) {
    $('.table').DataTable();
} );

</script>
@endpush