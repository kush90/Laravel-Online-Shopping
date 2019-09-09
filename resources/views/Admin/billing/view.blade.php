@extends('Admin.admin_layout.admin_master')
@section("title",'Billing Information')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include("Admin.admin_layout.admin_nav")
            </div>
            <div class="col-md-9">
                <h2>List of Billing Information</h2>
                <div class="well">

                    @if(session('status'))
                        <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{session('status')}}</strong>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Address</th>


                            </tr>

                            </thead>
                            <tbody>
                            @foreach($billings as $billing)

                                <tr>
                                    <td>{{$billing->id}}</td>
                                    <td>
                                        @foreach($users as $user )
                                            @if($user->id == $billing->user_id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>{{$billing->first_name}}</td>
                                    <td>{{$billing->last_name}}</td>
                                    <td>{{$billing->email}}</td>
                                    <td>{{$billing->mobile}}</td>
                                    <td>{{$billing->address}}</td>



                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$billings->links()}}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    @include('layout.footer')
    @endsection