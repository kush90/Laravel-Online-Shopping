@extends('layout.master')
@section('title','User Profile')
@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">

                <div class="panel-heading">User Information</div>
                @if(session('change'))
                <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('change')}}</strong>
                </div>
                @endif
                <div class="panel-body">
                     @if(Auth::check())
                        <Blockquote style="">
                            Name : {{Auth::user()->name}}<br>
                            Email: {{Auth::user()->email}}<br>
                            <a href="{{url('user/change/password')}}">Change password</a>
                        </Blockquote>
                         @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Billing Address</div>
                <div class="panel-body">

                          @if($billing==null)
                        <Blockquote style="">
                            No Billing Information Yet.
                        </Blockquote>

                    @else
                        <Blockquote style="">
                            First Name &nbsp;&nbsp;&nbsp;:   {{$billing->first_name}}<br>
                            Last Name  &nbsp;&nbsp;&nbsp;:          {{$billing->last_name}}<br>
                            Email     &nbsp;&nbsp;&nbsp; :{{$billing->email}} <br>
                            Mobile    &nbsp;&nbsp;&nbsp; :{{$billing->mobile}}<br>
                            Address    &nbsp;&nbsp;&nbsp;:{{$billing->address}}<br>

                        </Blockquote>




                    <a href="{{action('PageController@edit_billing_form',$billing->user_id)}}" class="btn btn-primary pull-right">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Order Information</div>
                <div class="panel-body">

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

                                                @if($users->id == $order->user_id)
                                                    {{$users->name}}
                                                @endif


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
                        </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Payment Information</div>
                <div class="panel-body">
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

                                                @if($users->id == $payment->user_id)
                                                    {{$users->name}}
                                                @endif

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
                        </div>

                </div>
            </div>

        </div>
    </div>
    @include('layout.footer')

    @endsection