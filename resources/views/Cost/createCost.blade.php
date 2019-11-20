@extends('layouts.app')

@section('content')

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
