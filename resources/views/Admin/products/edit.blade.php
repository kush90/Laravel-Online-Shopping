@extends('Admin.admin_layout.admin_master')
@section("title",'Add Product')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include("Admin.admin_layout.admin_nav")
            </div>
            <div class="col-md-9">
                <div class="well">
                    <legend>Edit A New Product</legend>
                    <form method="post" enctype="multipart/form-data">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissable fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{$error}}</strong>
                            </div>

                        @endforeach

                      
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$product->title}}" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="slug">Short Description</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$product->slug}}" placeholder="Short Description">
                        </div>
                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea class="form-control" rows="3" id="description"  name="description" placeholder="Description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" class="form-control" value="{{$product->price}}" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="images">Images Upload</label>
                            <input type="file" id="images" name="imgs[]" multiple><br>
                            <div class="panel" style="overflow: auto;">

                                
                                    @for($i=0;$i<count(unserialize($product->imgs));$i++)
                                        <img class="img-responsive"  src="{{asset('images/'.unserialize($product->imgs)[$i])}}" alt="image" style="width:100px;float:left;margin-left: 10px;">
                                    @endfor
                                

                            </div>
                            <div class="clearfix"></div>


                        </div>

                        <div class=" form-group " >
                            <label for="category">Categories</label>
                            <select name="cat_id" id="category" class="form-control">
                                <option value="">---Select---</option>
                                @foreach($categories as $category)

                                    <option value='{{$category->id}}'

                                    @if($category->id == $product->cat_id)
                                        selected="selected"
                                        @endif
                                    >{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class=" form-group " >
                            <label for="brand">Brands</label>
                            <select name="brand_id" id="brand" class="form-control">
                                <option value="">---Select---</option>
                                @foreach($brands as $brand)
                                    <option value='{{$brand->id}}'
                                     @if($brand->id == $product->brand_id)
                                         selected="selected"
                                         @endif
                                    >{{$brand->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stock">In Stock</label>
                            <input type="number" class="form-control" value="{{$product->stock}}" name="stock" id="stock" placeholder="Stock">
                        </div>




                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @include('layout.footer')
@endsection
