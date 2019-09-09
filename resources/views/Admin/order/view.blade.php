@extends('Admin.admin_layout.admin_master')
@section("title",'Order Information')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include("Admin.admin_layout.admin_nav")
            </div>
            <div class="col-md-9">
                <h2>List of Order Information</h2>
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
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created at</th>


                            </tr>

                            </thead>
                            <tbody>
                            @foreach($orders as $order)

                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                        @foreach($users as $user )
                                            @if($user->id == $order->user_id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        @foreach($products as $product )
                                            @if($product->id == $order->product_id)
                                                {{$product->title}}
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->total}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>




                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    @include('layout.footer')
    @endsection