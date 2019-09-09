@extends('Admin.admin_layout.admin_master')
@section('title','Admin Dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('Admin.admin_layout.admin_nav')
            </div>
            <div class="col-md-8">

                <div class="well">
                    <h2>List of Brands</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)

                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <th>{{$brand->name}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @include('layout.footer')
    @endsection