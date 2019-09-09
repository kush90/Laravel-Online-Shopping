<style>
    /*-----------------------------Price Rage--------------------------*/
    input[type=range] {
        -webkit-appearance: none;
        margin: 18px 0;
        width: 100%;
    }
    input[type=range]:focus {
        outline: none;
    }
    input[type=range]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        cursor: pointer;
        animate: 0.2s;

        background:white;
        border-radius: 1.3px;
        border: 0.2px solid #010101;
    }
    input[type=range]::-webkit-slider-thumb {

        border: 1px solid #000000;
        height: 18px;
        width: 16px;
        border-radius: 3px;
        background: #ffffff;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -7px;
    }
    input[type=range]:focus::-webkit-slider-runnable-track {
        background: white;
    }
    input[type=range]::-moz-range-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        animate: 0.2s;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        background: white;
        border-radius: 1.3px;
        border: 0.2px solid #010101;
    }
    input[type=range]::-moz-range-thumb {
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        border: 1px solid #000000;
        height: 36px;
        width: 16px;
        border-radius: 3px;
        background: #ffffff;
        cursor: pointer;
    }
    input[type=range]::-ms-track {
        width: 100%;
        height: 8.4px;
        cursor: pointer;
        animate: 0.2s;
        background: transparent;
        border-color: transparent;
        border-width: 16px 0;
        color: transparent;
    }
    input[type=range]::-ms-fill-lower {
        background: white;
        border: 0.2px solid #010101;
        border-radius: 2.6px;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
    }
    input[type=range]::-ms-fill-upper {
        background: white;
        border: 0.2px solid #010101;
        border-radius: 2.6px;
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
    }
    input[type=range]::-ms-thumb {
        box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
        border: 1px solid #000000;
        height: 36px;
        width: 16px;
        border-radius: 3px;
        background: #ffffff;
        cursor: pointer;
    }
    /*-------------------------------------------------------*/
</style>

<div class="panel panel-info">
    <div class="panel-heading">Price Range</div>
    <div class="panel-body">

        Minimum Price :<span id="min_p">$0</span><br>
        Maximum Pric :<span id="max_p">$100</span><br>
        <form method="post" action="{{url('search/price')}}">
            {{csrf_field()}}
            <input type="range" name="min" id="min" value="0" onchange="colorchange()" >
            <input type="range" name="max"  id="max" value="100" onchange="colorchange()">
            @foreach($brands as $brand)
                <label class="checkbox-inline">
                    <input type="checkbox" value="{{$brand->id}}"  name="{{$brand->id}}">{{$brand->name}}
                </label>
                @endforeach
            <br>
            <button type="submit"  class="btn btn-primary">Search</button>
        </form>
    </div>
</div>
<script src="{{asset("js/custom.js")}}"></script>