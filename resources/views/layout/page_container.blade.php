<!-- Page Content -->
<div class="container">

    <div class="row">

         <div class="col-md-3">

            @include('layout.rightsidebar')

            @include('layout.price_range')


         </div>

          <div class="col-md-9">

             @include('layout.slider')
              <div class="clearfix"></div>





                <div class="row">
                    <div class="col-md-5"><hr  style=""></div>
                    <div class="col-md-2"><h3  class='line' style="text-align:center;position:relative;top:-13px; font-size:20px; font-family:Novecentowide;text-shadow:0px 0px 0px black, 1px 1px 1px silver;">Products</h3></div>
                    <div class="col-md-5"><hr  style=""></div>
                </div>

           <div class="row">

                @include('layout.products')


            </div>

        </div>

    </div>

</div>
<!-- /.container -->