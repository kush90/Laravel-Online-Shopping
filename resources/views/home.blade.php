@extends('layout.master')
@section('content')

    @include('layout.page_container')

    <style>

        @media  screen and (max-width: 1319px) {
            .thumbnail .ratings p a  {
                display: block;
            }


        }
    </style>
    @include('layout.footer')

@endsection

@section('title','Home')
