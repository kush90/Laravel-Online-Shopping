@extends('Admin.admin_layout.admin_master')
@section("title",'Add Product')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include("Admin.admin_layout.admin_nav")
            </div>
            <div class="col-md-9">
                <h2>List of products</h2>
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
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($products as $product)

                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>
                                        <img src="{{asset('images/'.unserialize($product->imgs)[0])}}" alt="Image" width="100" height="50">
                                    </td>
                                    <td>
                                        @foreach($categories as $category )
                                            @if($category->id == $product->cat_id)
                                                {{$category->name}}
                                                @endif
                                            @endforeach

                                    </td>
                                    <td>
                                        @foreach($brands as $brand )
                                            @if($brand->id == $product->brand_id)
                                                {{$brand->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td><a href="{{action('Admin\ProductController@editform',$product->id)}}">Edit</a></td>
                                    <td><a href="{{action('Admin\ProductController@delete',$product->id)}}">Delete</a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>

                    </div>
                </div>
            </div>
        </div>
    @include('layout.footer')
    @endsection