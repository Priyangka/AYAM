@extends('layouts.app')

@section('content')
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
</div>
</div>
@endsection