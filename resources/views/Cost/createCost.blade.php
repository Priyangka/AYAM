@extends('layouts.admin')

@section('content')
<head>
  <meta charset="utf-8"> 
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
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
    
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"> </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">        </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
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
<form method="post" action="{{route('storeCost')}}" class="form-horizontal" >
  @csrf
  <fieldset>

    <!-- Form Name -->
    <legend>Create New Cost</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-6 control-label" for="cost_name">Cost Name</label>  
      <div class="col-md-6">
        <input id="cost_name" name="cost_name" type="text" placeholder="Cost Name" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-6 control-label" for="cost">Cost (RM)</label>  
      <div class="col-md-6">
        <input id="cost" name="cost" type="number" placeholder="Cost (RM)" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Select Basic -->
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
    <br>
    <button type="submit" class="btn btn-success">Add Cost</button>
    <button type="reset" class="btn btn-danger">Clear Entries</button>

  </fieldset>
</form>

@endsection
