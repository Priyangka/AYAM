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

<div class="row">
  <div class="col-sm-8 offset-sm-2">
    @if ($errors->any())

    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{route('storeStock')}}" class="form-horizontal" >
     @csrf

     <fieldset>

    <!-- Form Name -->
    <legend>Create New Stock</legend>

     <div class="form-group">
      <label for="stock_name">Stock Name:</label>
      <input id="stock_name" name="stock_name" type="text" placeholder="Stock Name" class="form-control input-md" required=""> 
     <!-- <select id="stock_name" name="stock_name" class="form-control" required="">
         <option disabled selected value>Stock Name Here</option> 
        @foreach($stock as $stock)
        @if($stock->stock_name != "Ayam")
        <option value="Ayam">Ayam</option>
        @else
        <option disabled selected value>"Stock Ayam" has already been created.</option>
        @endif
        @endforeach
      </select>-->
    </div>

    <div class="form-group">
      <label for="stock_qty">Stock Amount:</label>
      <input id="stock_qty" name="stock_qty" type="number" step="any" placeholder="Stock Amount" class="form-control input-md" required="">
    </div>

    <div class="form-group">
      <label for="stock_unit">Stock Unit:</label>
      <select id="stock_unit" name="stock_unit" class="form-control">
        <option value="Kg">Kg</option>
        <option value="Qty">Qty</option>
      </select>
    </div>


    <div class="form-group">
      <label for="stock_price_per_kg">Price Per Kg:</label>
      <input id="stock_price_per_kg" name="stock_price_per_kg" type="number" step="any" placeholder="Price of Chicken Per Kg" class="form-control input-md" required="">
    </div>

    <div class="form-group">
      <label for="stock_weight_per_qty">Weight Per Qty:</label>
      <input id="stock_weight_per_qty" name="stock_weight_per_qty" type="number" step="any" placeholder="Weight of One Chicken" class="form-control input-md" required="">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-danger">Clear Entries</button>
  </form>
  </fieldset>
</div>
</div>
@endsection