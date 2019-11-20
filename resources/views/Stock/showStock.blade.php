@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <legend>View Stock Details</legend>

        @if(session()->get('success'))
   <div class="alert alert-success">
    <strong> {{ session()->get('success') }}  </strong>
   </div>'
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


        <form >
  
            <div class="form-group">

                <label for="stock_name">Stock Name:</label>
                <input type="text" readonly="readonly"  class="form-control" name="name" value="{{ $stock->stock_name }}" />
            </div>


            <div class="form-group">
                <label for="stock_qty"> Stock Quantity:</label>
                <input type="text" readonly="readonly" class="form-control" name="cost" value="{{$stock->stock_qty }}" />
            </div>

            <div class="form-group">
                <label for="stock_unit"> Stock Unit:</label>
                <input type="text" readonly="readonly" class="form-control" name="cost" value="{{ $stock->stock_unit }}" />
            </div>

            <div class="form-group">
                <label for="stock_price_per_kg"> Stock Price Per Kg:</label>
                <input type="text" readonly="readonly" class="form-control" name="cost" value="{{ $stock->stock_price_per_kg }}" />
            </div>

            <div class="form-group">
                <label for="stock_weight_per_qty "> Stock Weight per Qty</label>
                <input type="text" readonly="readonly" class="form-control" name="cost" value="{{ $stock->stock_weight_per_qty }}" />
            </div>


            <a href="{{ route('home')}}" class="btn btn-success">Back</a>
        </form>
    </div>
</div>
@endsection