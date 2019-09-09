@extends('layout.master')
@section('title','check out')
@section('content')
    <style>
        .wizard {
            margin: 20px auto;
            background: #fff;
        }

        .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
        }

        .wizard > div.wizard-inner {
            position: relative;
        }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
        }
        span.round-tab i{
            color:#555555;
        }
        .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;

        }
        .wizard li.active span.round-tab i{
            color: #5bc0de;
        }

        span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
        }

        .wizard .nav-tabs > li {
            width: 25%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #5bc0de;
            transition: 0.1s ease-in-out;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #5bc0de;
        }

        .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
        }

        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }

        .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
        }

        .wizard h3 {
            margin-top: 0;
        }

        @media( max-width : 585px ) {

            .wizard {
                width: 90%;
                height: auto !important;
            }

            span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
            }
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <section>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1" >
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-usd"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>
            <div class="col-md-9 col-md-offset-1">

                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="row">

                                @if(Auth::check())
                                    <div class="well" style="color:black;">
                                    <h2 >Account Information</h2>
                                    <p>User Name :&nbsp;&nbsp;{{Auth::user()->name}}</p>
                                    <p>Email:&nbsp;&nbsp;{{Auth::user()->email}}</p>
                                </div>
                                  @else


                                <div class="col-md-6">
                                    <div class="well">
                                        <h2 style="color:black;">Account Benefits</h2>
                                        <blockquote style="color:black;">Save your addresses for easy ordering
                                            Easily reorder a previous order
                                            Get access to coupon codes
                                            Create an Account</blockquote>
                                        <a href="{{url('users/register')}}" class="btn btn-primary">Create an Account</a>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="well">
                                <blockquote>
                                        @if(session('success'))
                                            <div class="alert alert-success alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>{{session('success')}}</strong>
                                            </div>


                                        @endif
                                        @foreach($errors->all() as $error)

                                            <div class="alert alert-danger alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>{{$error}}</strong>
                                            </div>
                                        @endforeach
                                        @if(session('warning'))
                                            <div class="alert alert-warning alert-dismissable">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>{{session('warning')}}</strong>
                                            </div>


                                        @endif


                                        <h2 style="color:black;">Login Form</h2>
                                        <form method="post">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                                            </div>

                                            <a href="{{url('forget/password')}}">Forget Your Password?</a>
                                            <button type="submit" class="btn btn-primary pull-right">Login</button>
                                            <div class="clearfix"></div>
                                        </form>

                                </blockquote>
                                    </div>

                                </div>
                                @endif
                            </div>
                               @if(Auth::check())
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                                   @endif
                            </div>
                            <div class="tab-pane " role="tabpanel" id="step2">
                                <div class="row">
                                    @if(empty($billings))
                                    <div class="col-md-12">


                                        <input type="hidden" name="_token" id="tok" value="{{csrf_token()}}" >
                                        <h3 class="text-center" style="color:black;">shipping Address</h3>
                                        <p id="ss"  style="display:none;color:red;"></p>
                                        <hr>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                                <label id="efirst_name" style="color:red;"></label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                                <label id="elast_name" style="color:red;"></label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control input-sm" value="
      @if(Auth::check())
                                                        {{Auth::user()->email}}
                                                        @endif
                      ">
                                                <label id="eemail" style="color:red;"></label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="mobile" id="mobile" class="form-control input-sm" placeholder="Mobile no">
                                                <label id="emobile" style="color:red;"></label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <textarea rows="4" name="address" id="address" class="form-control" placeholder="Your details Address here ..."></textarea>
                                                <label id="eaddress" style="color:red;"></label>
                                            </div>
                                        </div>



                                            <button class="btn btn-primary" id="bill">Insert Billing</button>




                                    </div>
                                        @else
                                        <h2 style="color:black;">Billing Information</h2>
                                       <div class="table-responsive">
                                        <table class="table well table-striped" style="background-color:#D6EFF7;color:black;">


                                            <tr>
                                                <td>First Name</td>
                                                <td>{{$billings->first_name}}</td>
                                                </tr>
                                            <tr>
                                                <td>Last Name</td>
                                                <td>{{$billings->last_name}}</td>
                                            </tr>
                                            <tr>
                                                    <td>Email</td>
                                                    <td>{{$billings->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile</td>
                                                <td>{{$billings->mobile}}</td>
                                            </tr>

                                                <tr>
                                                <td>Address</td>
                                                <td>{{$billings->address}}</td>
                                            </tr>

                                        </table>
                                       </div>
                                        <ul class="list-inline pull-right" style="">
                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                            <a href=""></a><li><button type="button"  class="btn btn-primary next-step">continue</button></li>
                                        </ul>
                                    @endif

                                </div>
                                @if(Auth::check())
                                <ul class="list-inline pull-right" style="display: none;">
                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                    <a href=""></a><li><button type="button"  class="btn btn-primary next-step">Save and continue</button></li>
                                </ul>
                                    @endif
                            </div>







                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="alert alert-success" style="display: none;" id="order">Successfuly submit your order.</p>
                                        <h3 style="color:black;">Place Order</h3>

                                        <div class="well">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped" style="">
                                                    <tr style="color:black;background-color:#D6EFF7;">
                                                        <th>Title</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>SubTotal</th>
                                                    </tr>
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td>{{$product["title"]}}</td>
                                                            <td style="text-align: center;">

                                                                @if(session('cart'))

                                                                    @foreach(session('cart') as $carts)
                                                                        @if($carts["pid"]==$product->id)
                                                                            {{$carts["qty"]}}
                                                                        @endif
                                                                    @endforeach

                                                                @endif


                                                            </td>
                                                            <td>{{$product["price"]}}</td>
                                                            <td>
                                                                @if(session('cart'))

                                                                    @foreach(session('cart') as $carts)
                                                                        @if($carts["pid"]==$product->id)
                                                                            ${{$carts["total"]}}
                                                                        @endif
                                                                    @endforeach

                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3" style="text-align:right;">Total:</td>
                                                        <td>${{$t}}</td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>










                                        @if($order_user_id)

                                            <ul class="list-inline pull-right" style="" id="saveandcontinue">
                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>

                                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                            </ul>
                                            @else
                                            <ul class="list-inline pull-right" style="display: none;" id="saveandcontinue2">
                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>

                                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                            </ul>

                                            <a href="{{url('cart')}}" class="btn btn-primary" id="updateorder" style="">Update Your Order</a>
                                            <button class="btn btn-primary"  id="placeorder"  style="">Place Order</button>

                                        @endif










                                    </div>


                                </div>


                            </div>









                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="well">
                                        <h3 style="color:black;">Payment</h3>

                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                            <input type="hidden" name="business" value="kushgc90-facilitator@gmail.com">
                                            <input type="hidden" name="cmd" value="_cart">
                                            <input type="hidden" name="upload" value="1">
                                            <?php $count=0;?>
                                            @foreach(session('cart') as $carts)
                                                <?php $count++;?>
                                                <input type="hidden" name="item_name_{{$count}}" value="{{$carts["pid"]}}">
                                                <input type="hidden" name="amount_{{$count}}" value="{{$carts["price"]}}">
                                                <input type="hidden" name="quantity_{{$count}}" value="{{$carts["qty"]}}">
                                                <input type="hidden" name="shipping_{{$count}}" value="1.75">
                                            @endforeach

                                            <input type="hidden" name="cancel_return" value="{{url('payment-cancel')}}">
                                            <input type="hidden" name="return" value="{{url('payment-status')}}">
                                            <input type="image" name="submit" border="0"
                                                   src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
                                                   alt="Buy Now">
                                            <img alt="" border="0" width="1" height="1"
                                                 src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

            </div>
                </div>
            </section>
        </div>
    </div>


    @include('layout.footer')
    <script>
        $(document).ready(function () {
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }


         $('#bill').click(function (e){
             e.preventDefault();
             var first_name=$('#first_name').val();
             var last_name=$('#last_name').val();
             var email=$('#email').val();
             var mobile=$('#mobile').val();
             var address=$('#address').val();
             var tok=$("#tok").val();
             $.ajax({
                 type: "post",
                 dataType:'json',
                 url:"checkout/billing",
                 cache:false,
                 data:{first_name:first_name,last_name:last_name,email:email,mobile:mobile,address:address,tok:tok},
                 success:function(data)
                 {
                     $('.list-inline').show();
                     if(data==1)
                     {
                         document.getElementById('ss').innerHTML="You have inserted your billing information successfully";
                         $('#ss').show();
                         $('#bill').hide();
                         $('#saveandcontinue2').hide();

                     }
                 },
                 error: function(data) {

                     var errors = "";
                     for(a in data.responseJSON){
                         errors +='*' +data.responseJSON[a] + '<br>';

                     }
                     $('#ss').show().html(errors);
                 }
             });



         });

        $('#placeorder').click(function(){


            $.ajax({
                type:'get',
                url:'place/order',
                cache:false,

                success:function(data)
                {
                    if(data==1) {

                        $('#order').show();
                        $('#placeorder').hide();
                        $('#updateorder').hide();
                        $("#saveandcontinue2").show();


                    }
                }
            });

        });

        $.ajaxSetup({ cache: false });
        $.ajaxSetup(
                {
                    headers:
                    {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    }
                });






    </script>
    @endsection