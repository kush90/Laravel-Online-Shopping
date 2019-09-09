
<div class="panel-group" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Brands</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">




                    @foreach($a as $key=>$b)




                    <tr>

                        <td>


                            <a href="{{action('PageController@dynamic_show',$b[0])}}" class="btn btn-default btn-block">{{$b[0]}}



                            <span>

                           &nbsp;({{$b[1]}})

                            </span>
                            </a>

                        </td>

                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Clothes</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">

                    @foreach($c_p as $key=>$b)




                        <tr>

                            <td>


                                <a href="{{action('PageController@dynamic_show1',$b[0])}}" class="btn btn-default btn-block">{{$b[0]}}



                                    <span>

                           &nbsp;({{$b[1]}})

                            </span>
                                </a>

                            </td>

                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>


</div>