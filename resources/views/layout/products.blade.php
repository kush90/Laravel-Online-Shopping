@if(session('add_cart'))
    <p>{{session('add_cart')}}</p>
@endif


@foreach($products as $product)
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">

            <img src="{{asset('images/'.unserialize($product->imgs)[0])}}" alt="" class="img-responsive">
            <div class="caption">
                <h4 class="pull-right">${{$product->price}}</h4>
                <h4><a href="#">{{$product->title}}</a>
                </h4>
                <p>{{$product->slug}}</p>
            </div>
            <div class="ratings" style="margin-top: 10px;">

                <p>
                    <a href="{{action('PageController@detail',$product->id)}}" class="btn btn-primary pp" role="button">View Details</a>
                    &nbsp;&nbsp;<a href="{{action('PageController@add_cart',$product->id)}}" id="{{$product->id}}"  class="btn btn-danger car"  role="button">Add To Cart</a>
                </p>
                <p class="text-center"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;{{$product->view_count}}&nbsp;views</p>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @endforeach



