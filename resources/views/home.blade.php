@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding: 0">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                   <!--  <div class="row">
                        <div class="col-lg-6"><a href="" class="btn btn-primary">Create New Stock</a></div>
                        <div class="col-lg-6"><a href="" class="btn btn-primary">View Stock</a></div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-lg-6"><a href="" class="btn btn-primary">Create New Cost</a></div>
                        <div class="col-lg-6"><a href="" class="btn btn-primary">View Cost</a></div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-lg-6"><a href="" class="btn btn-primary">Create New Product</a></div>
                        <div class="col-lg-6"><a href="" class="btn btn-primary">View Product</a></div>
                    </div> -->

                  




<!--                     <table class="table">
                        <tr style="border: none">
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">Create New Stock</a></div>
                            </td>
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">View Stock</a></div>
                            </td>
                        </tr>
                        <tr style="border: none">
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">Create New Cost</a></div>
                            </td>
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">View Cost</a></div>
                            </td>
                        </tr>
                        <tr style="border: none">
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">Create New Product</a></div>
                            </td>
                            <td style="text-align: center; border: none">
                                <div><a href="" class="btn btn-primary">View Product</a></div>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
