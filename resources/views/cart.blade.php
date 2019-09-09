@extends('layout.master')

@section('content')


   <div class="row">
       <div class="col-md-8 col-md-offset-2">


           @if(empty($products))
               <div class="alert alert-warning alert-dismissable fade in">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Your cart is empty now..</strong>


               </div>
               <a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a>

           @else

                   <div class="alert alert-success alert-dismissable" id="ss" style="display: none;">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       <strong id="success"  style="display: none;"></strong>
                   </div>
                    @if(session('delete'))

               <div class="alert alert-success alert-dismissable">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>{{session('delete')}}</strong>
               </div>
               @endif

               <div class="table-responsive">
                   <table id="cart" class="table table-hover table-condensed">
                       <thead>
                       <tr>
                           <th style="width:50%">Product</th>
                           <th style="width:10%">Price</th>
                           <th style="width:8%">Quantity</th>
                           <th style="width:22%" class="text-center">Subtotal</th>
                           <th style="width:10%"></th>
                       </tr>
                       </thead>
                       @foreach($products as $product)

                           <tbody>
                           <tr>
                               <td data-th="Product">
                                   <div class="row">
                                       <div class="col-sm-2 hidden-xs"><img src="{{asset("images/".unserialize($product->imgs)[0])}}" alt="..." class="img-responsive"/></div>
                                       <div class="col-sm-10">
                                           <h4 class="nomargin">{{$product->title}}</h4>
                                           <p>{{$product->slug}}</p>
                                       </div>
                                   </div>
                               </td>
                               <td data-th="Price">{{$product->price}}</td>
                               <td data-th="Quantity">
                                   @if(session('cart'))

                                       @foreach(session('cart') as $carts)
                                           @if($carts["pid"]==$product->id)
                                               <input type="text" id="{{$product->id}}"  class="qty form-control text-center" value="{{$carts["qty"]}}">
                                           @endif
                                       @endforeach

                                   @endif


                               </td>
                               <td data-th="Subtotal" class="text-center total" id="{{$product->id}}">

                                   @if(session('cart'))

                                       @foreach(session('cart') as $carts)
                                           @if($carts["pid"]==$product->id)
                                              ${{$carts["total"]}}
                                           @endif
                                       @endforeach

                                   @endif
                               </td>
                               <td class="actions" >
                                   <button id="{{$product->id}}" class="btn btn-info btn-sm "><i class="fa fa-refresh"></i></button>
                                   <a href="{{action('PageController@delete_cart',$product->id)}}" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i></a>
                               </td>
                           </tr>
                           @endforeach
                           </tbody>
                           <tfoot>
                           <tr class="visible-xs">
                               <td class="text-center"><strong>
                                      ${{$t}}
                                   </strong></td>
                           </tr>
                           <tr>
                               <td><a href="{{url('/')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                               <td colspan="2" class="hidden-xs"></td>
                               <td class="hidden-xs text-center"><strong>
                                      ${{$t}}
                                   </strong></td>
                               <td><a href="{{url('checkout')}}" class="btn btn-success btn-block " id="ch">Checkout <i class="fa fa-angle-right"></i></a></td>
                           </tr>
                           </tfoot>
                   </table>
               </div>
           @endif

       </div>
   </div>
   @include('layout.footer')

@endsection

@section('title','View Cart')


