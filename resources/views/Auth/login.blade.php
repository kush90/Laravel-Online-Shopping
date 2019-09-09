@extends('layout.master')
@section('title','Login')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                 <div class="well">
                     @if(session('success'))
                         <div class="alert alert-success alert-dismissable">
                             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <strong>{{session('success')}}</strong>
                         </div>


                     @endif
                         @foreach($errors->all() as $error)

                             <div class="alert alert-danger alert-dismissable">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 <strong>{{$error}}</strong>
                             </div>
                         @endforeach
                         @if(session('warning'))
                             <div class="alert alert-success alert-dismissable">
                                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                 <strong>{{session('warning')}}</strong>
                             </div>


                         @endif
                     <legend style="font: 400 21px Lato, sans-serif;">Login Form</legend>
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>

                            <a href="{{url('forget/password')}}">Forget Your Password?</a>
                            <button type="submit" class="btn btn-primary pull-right">Login</button>
                            <div class="clearfix"></div>
                        </form>

                 </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @endsection