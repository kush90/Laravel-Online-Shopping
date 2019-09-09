@extends('Admin.admin_layout.admin_master')
@section('title','Admin Dashboard')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @include('Admin.admin_layout.admin_nav')
            </div>
            <div class="col-md-8">

                <h2>Users</h2>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit Role</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{action('Admin\UserController@editform',$user->id)}}">Edit Role</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection

