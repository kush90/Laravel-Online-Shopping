@extends('layout.master')
@section('title','User Profile')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="well">
                <legend>Change Password</legend>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{$error}}</strong>
                    </div>
                @endforeach
                <form method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm New Password</label>
                        <input type="password" id="cpassword" name="password_confirmation" class="form-control" placeholder="Confirm New Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>
    @include('layout.footer')

@endsection