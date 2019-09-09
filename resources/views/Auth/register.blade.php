@extends('layout.master')
@section('title','Register')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                 <div class="well">
                     <legend style="font: 400 21px Lato, sans-serif;">Register Form</legend>

                       @foreach($errors->all() as $error)
                         <div class="alert alert-warning alert-dismissable fade in">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>{{$error}}</strong>
                         </div>
                           @endforeach
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control" id="username" name="name" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation" placeholder="Confirm Password">
                            </div>


                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>

                 </div>
            </div>
        </div>
    </div>
    @endsection