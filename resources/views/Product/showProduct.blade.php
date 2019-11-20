@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <legend>View Product Details</legend>

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

                <label for="pro_name"> Product Name:</label>
                <input type="text" readonly="readonly"  class="form-control" name="pro_name" value="{{ $product->pro_name }}" />
            </div>


            <div class="form-group">
                <label for="pro_demand"> Product Demand:</label>
                <input type="text" readonly="readonly" class="form-control" name="pro_demand" value="{{ $product->pro_demand }}" />
            </div>

            
              <div class="form-group">
                <label for="dem_unit"> Demand Unit :</label>
                <input type="text" readonly="readonly" class="form-control" name="dem_unit" value="{{ $product->dem_unit}}" />
            </div>

              <div class="form-group">
                <label for="price_per_kg"> Price per Kg:</label>
                <input type="text" readonly="readonly" class="form-control" name="price_per_kg" value="{{ $product->price_per_kg }}" />
            </div>

              <div class="form-group">
                <label for="weight_per_qty"> Weight per Qty:</label>
                <input type="text" readonly="readonly" class="form-control" name="weight_per_qty" value="{{ $product->weight_per_qty }}" />
            </div>

             


            <a href="{{ route('home')}}" class="btn btn-success">Back</a>
        </form>
    </div>
</div>
@endsection