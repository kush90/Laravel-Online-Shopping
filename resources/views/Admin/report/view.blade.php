@extends('Admin.admin_layout.admin_master')
@section("title",'Generate reports')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include("Admin.admin_layout.admin_nav")
            </div>
            <div class="col-md-9">

                <h2>Generate Report</h2>

                 <div class="well">
                     <form method="post">
                         {{csrf_field()}}
                     <label class="radio-inline"><input type="radio" id="daily" name="optradio" value="daily">Daily</label>
                     <label class="radio-inline"><input type="radio" checked id="weekly" name="optradio" value="weekly">Weekly</label>
                     <label class="radio-inline"><input type="radio" id="monthly" name="optradio" value="monthly">Monthly</label>
                         <br><br>
                         <p style="display:none;" id="hdp">Date: <input type="text" name="dt" id="datepicker" data-date-format="yyy-mm-dd"></p>
                         <div id="month"style="display:none;">
                             <label for="exampleSelect1">Select Months:</label>
                             <select  id="exampleSelect1" name="month">
                                 <option value="01">January</option>
                                 <option value="02">February</option>
                                 <option value="03">March</option>
                                 <option value="04">April</option>
                                 <option value="05">May</option>
                                 <option value="06">June</option>
                                 <option value="07">July</option>
                                 <option value="08">August</option>
                                 <option value="09">September</option>
                                 <option value="10">October</option>
                                 <option value="11">November</option>
                                 <option value="12">December</option>
                             </select>
                         </div><br><br>
                         <input type="submit" name="submit" value="View Report" class="btn btn-primary btn-sm">


                     </form>

                 </div>

                @if(!empty($daily))
                    <?php
                        $total=0;
                            ?>
                <div class="well">
                    <h2>
                        @if(!empty($title) || !empty($date))
                        {{$title}} {{$date}}


                            @endif

                    </h2>
                    @if(!empty($daily))
                        <div class="table-responsive">
                            <table class="table  table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>User</td>
                            <td>Transaction ID</td>
                            <td>Amount</td>
                            <td>Currency</td>
                            <td>Status</td>
                            <td>Created at</td>
                        </tr>
                        </thead>
                                <tbody>
                     @foreach($daily as $da)
                          <tr>
                              <td>{{$da->id}}</td>
                              <td>
                                  @foreach($users as $user)
                                      @if($user->id==$da->user_id)
                                          {{$user->name}}
                                      @endif
                                      @endforeach
                              </td>
                              <td>{{$da->transaction}}</td>
                              <td>{{$da->amount}}</td>
                              <td>{{$da->currency}}</td>
                              <td>{{$da->status}}</td>
                              <td>{{$da->created_at}}</td>
                              <?php

                                  $total=$da->amount;
                                  $total+=$total;



                                  ?>
                          </tr>
                         @endforeach
                                <tr>
                                    <td colspan="3" style="text-align: right">Total:</td>
                                    <td>

                                        {{$total}}

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                       @else
                        @if(!empty($error))
                        <p class="alert alert-danger text-center">{{$error}}</p>
                            @endif


                    @endif
                </div>

                <div class="well">
                    <h2>
                        @if(!empty($title1) || !empty($date))
                            {{$title1}} {{$date}}


                        @endif

                    </h2>
                    @if(!empty($order))
                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>User</td>
                                    <td>Product</td>
                                    <td>Price</td>
                                    <td>Quantity</td>
                                    <td>Total</td>
                                    <td>Status</td>
                                    <td>Created at</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $or)
                                    <tr>
                                        <td>{{$or->id}}</td>
                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id==$or->user_id)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($products as $product)
                                                @if($product->id==$or->product_id)
                                                    {{$product->title}}
                                                    @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @foreach($products as $product)
                                                @if($product->id==$or->product_id)
                                                    {{$product->price}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$or->quantity}}</td>
                                        <td>{{$or->total}}</td>
                                        <td>{{$or->status}}</td>
                                        <td>{{$or->created_at}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    @else
                        @if(!empty($error))
                            <p class="alert alert-danger text-center">{{$error}}</p>
                        @endif


                    @endif
                </div>
                    @else
                    @if(!empty($error))
                        <p class="alert alert-danger text-center">{{$error}}</p>
                    @endif
                    @endif

                </div>
            </div>
        </div>
    @include('layout.footer')
    <script>

        $( function() {

            $( "#datepicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        } );

        $('#daily').click(function(){
            $('#hdp').show();
            $('#month').hide();
        });
        $('#weekly').click(function(){
            $('#hdp').hide();
            $('#month').hide();
        });
        $('#monthly').click(function(){
            $('#hdp').hide();
            $('#month').show();
        });
    </script>



    @endsection