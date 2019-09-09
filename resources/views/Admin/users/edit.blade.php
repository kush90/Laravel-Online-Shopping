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
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{session('status')}}</strong>
                        </div>
                    @endif
                    <legend>Edit User</legend>


                    <form method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" class="form-control" readonly value="{{$user->name}}" id="name" placeholder="User Name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" readonly value="{{$user->email}}" id="email" placeholder="User Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select name="role[]" class="form-control" multiple>
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}"
                                            @if(in_array($role->name,$selected))
                                            selected="selected"
                                            @endif

                                    >
                                        {{$role->name}}
                                    </option>
                                @endforeach


                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit User</button>
                        <a href="{{url('admin/user')}}" class="btn btn-danger">Cancel</a>
                        <div class="clearfix"></div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection