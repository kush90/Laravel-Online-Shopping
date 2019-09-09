@extends('Admin.admin_layout.admin_master')
@section("title",'Payment Information')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include("Admin.admin_layout.admin_nav")
            </div>
            <div class="col-md-9">
                <h2>List of Payment Information</h2>
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
                                <th>Transaction</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Status</th>
                                <th>Created at</th>


                            </tr>

                            </thead>
                            <tbody>
                            @foreach($payments as $payment)

                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>
                                        @foreach($users as $user )
                                            @if($user->id == $payment->user_id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach

                                    </td>


                                    <td>{{$payment->transaction}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->currency}}</td>
                                    <td>{{$payment->status}}</td>
                                    <td>{{$payment->created_at}}</td>




                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$payments->links()}}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    @include('layout.footer')
    @endsection