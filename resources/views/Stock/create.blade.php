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
<form method="post" action="{{route('storeStock')}}">
  @csrf
  <fieldset>

    <!-- Form Name -->
    <legend>Create New Stock</legend>

    <!-- Text input-->
    <div class="form-group">
      <label  class="col-md-6 control-label" for="stock_name">Stock Name</label>  
      <div class="col-md-6">
        <input id="stock_name" name="stock_name" type="text" placeholder="Stock Name"  required="" >

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-6 control-label" for="stock_qty">Stock Amount</label>  
      <div class="col-md-6">
        <input id="stock_qty" name="stock_qty" type="number" step="any" placeholder="Stock Amount" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-6 control-label" for="stock_unit">Unit</label>
      <div class="col-md-6">
        <select id="stock_unit" name="stock_unit" class="form-control">
          <option value="Kg">Kg</option>
          <option value="Qty">Qty</option>
        </select>
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-6 control-label" for="stock_price_per_kg">Price Per Kg</label>  
      <div class="col-md-6">
        <input id="stock_price_per_kg" name="stock_price_per_kg" type="number" step="any" placeholder="Price of Chicken Per Kg" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-6 control-label" for="stock_weight_per_qty">Weight Per Qty</label>  
      <div class="col-md-6">
        <input id="stock_weight_per_qty" name="stock_weight_per_qty" type="number" step="any" placeholder="Weight of One Chicken" class="form-control input-md" required="">
      </div>
    </div>

    <button type="submit" class="btn btn-success">Add Stock</button>

  </fieldset>
</form>

@endsection
