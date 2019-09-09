@extends('layout.master')
@section('title','payment success')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="well" >
                <blockquote style="color:black;">
                    Your payment has been Cancelled.<br>

                    <a href="{{url('cart')}}" class="btn btn-primary">Continue Shopping</a>
                </blockquote>
            </div>
        </div>
    </div>
    @include('layout.footer')
@endsection