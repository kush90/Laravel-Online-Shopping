@extends('layout.master')
@section('title','payment success')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="well" >
                <blockquote style="color:black;">
                    Your payment has been completed.<br>
                    Thanks for your shopping from our website.<br>
                    The payment for your transaction id is  {{$tra}}

                </blockquote>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @endsection