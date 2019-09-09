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
    <legend>Add Category</legend>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{$error}}</strong>
        </div>
    @endforeach
    @if(session('status'))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{session('status')}}</strong>
        </div>
    @endif
    <form method="post">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text" class="form-control" id="name" placeholder="Role Name" name="name">
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
        <div class="clearfix"></div>
    </form>
</div>
    </div>
    </div>
    </div>
    @include('layout.footer')
 @endsection