@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <legend>View Cost Details</legend>

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

                <label for="cost_name">Cost Name:</label>
                <input type="text" readonly="readonly"  class="form-control" name="name" value="{{ $cost->cost_name }}" />
            </div>


            <div class="form-group">
                <label for="cost"> Cost:</label>
                <input type="text" readonly="readonly" class="form-control" name="cost" value="{{ $cost->cost }}" />
            </div>

            

            <a href="{{ route('viewCost')}}" class="btn btn-success">Back</a>
        </form>
    </div>
</div>
@endsection