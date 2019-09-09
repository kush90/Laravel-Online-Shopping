@extends('layout.master')
@section('title','Edit Billing Information')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{$error}}</strong>
                </div>
                @endforeach
            <div class="well">
                <legend>Edit Billing Form</legend>
                <form method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" value="{{$billing->first_name}}" name="first_name" id="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" value="{{$billing->last_name}}" name="last_name" id="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                            <input type="text" class="form-control" value="{{$billing->address}}" name="address" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                            <input type="number" class="form-control" value="{{$billing->mobile}}" name="mobile" id="mobile" placeholder="Mobile">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @endsection