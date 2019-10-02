<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Billing;
use DateTime;
use Auth;
use App\Payment;
use App\User;
use App\Http\Requests\BillingUpdateRequestForm;
use Carbon\Carbon;


use DB;
use App\Http\Requests\BillingFormInsertRequest;
use MongoDB\BSON\Timestamp;


class PageController extends Controller
{

    /* the following method is to  show all the information from database inside the home page*/
    public  function index()
    {
        $products=Product::all();
        if($products){

        $brands=Brand::all();
        $categories=Category::all();

        $a=array();

        foreach($brands as $brand)
        {
            $ps=Product::where('brand_id',$brand->id)->get();

              $c=array();
            foreach ($ps as $product)
            {
                if($brand->id==$product->brand_id)
                {

                    array_push($c,$product->id);

                }



            }

            array_push($a,[$brand->name,count($c)]);



        }
         $c_p=array();
        foreach ($categories as $category)
        {
            $product=Product::where('cat_id',$category->id)->get();
            $catp=array();

             foreach ($product as $p)
             {
                 if($category->id==$p->cat_id)
                 {
                     array_push($catp,$p->id);
                 }

             }
            array_push($c_p,[$category->name,count($catp)]);
        }


       return view('home',compact('products','a','c_p','brands'));
        }
    }


    /* the following method is add the products into the cart*/


    public  function add_cart(Request $request,$id)

    {
        $items=array();
        $product=Product::find($id);
        $wasfound=false;

        if($request->session()->has('cart'))/* create session cart for adding the products*/
        {
              $items= $request->session()->get('cart');

             $i=0;
            $j=1;
            foreach ($items as $item) {

                if($item['pid']==$id)/* if the product is already in the cart then increase the quantity of that product*/
                {
                    array_splice($items,$i,1,[["pid"=>$id,"price"=>$item["price"],"qty"=>$item["qty"]+1,'total'=>($item["price"]*$item["qty"])+$item["price"]]]);
                    $wasfound=true;
                }
          $i++;
                $j++;

             }
             if(!$wasfound)
             {
                 array_push($items,['pid'=>$id,'qty'=>1,'price'=>$product->price,'total'=>$product->price]);
             }

        }
        else
        {

            array_push($items,['pid'=>$id,'qty'=>1,'price'=>$product->price,'total'=>$product->price]);
        }

        $request->session()->put('cart',$items);


        $products=Product::all();
        $brands=Brand::all();
        $categories=Category::all();

        $a=array();

        foreach($brands as $brand)
        {
            $ps=Product::where('brand_id',$brand->id)->get();

            $c=array();
            foreach ($ps as $product)
            {
                if($brand->id==$product->brand_id)
                {

                    array_push($c,$product->id);

                }


            }

            array_push($a,[$brand->name,count($c)]);


        }
        $c_p=array();
        foreach ($categories as $category)
        {
            $product=Product::where('cat_id',$category->id)->get();
            $catp=array();

            foreach ($product as $p)
            {
                if($category->id==$p->cat_id)
                {
                    array_push($catp,$p->id);
                }

            }
            array_push($c_p,[$category->name,count($catp)]);
        }

        return view('home',compact('products','a','c_p','brands'))->with('add_cart','Successfuly Inserted Into Your Cart');



    }
    /* the following method is to show all the products from the session cart*/

    public  function show_cart(Request $request)
    {
        $carts=$request->session()->get("cart");
        if(!empty($carts)) {
            $products = array();
            for ($i = 0; $i < count($carts); $i++) {
                $product = Product::find($carts[$i]["pid"]);

                array_push($products, $product);
            }
            $total = array();
            foreach ($carts as $cart) {
                array_push($total, $cart['total']);
            }
            $t = array_sum($total);
            return view("cart",compact('products','t'));
        }
        else
        {
            return view("cart",compact('products','t'));
        }

    }
    /* the following method is update the quantity of the product from session cart*/
    public  function update_cart(Request $request, $id)
    {
        $items=$request->session()->get('cart');
        $qt=(int)$request->qty;

        $i=0;
        foreach ($items as $item)
        {
            if($item['pid']==$id)
            {
                array_splice($items,$i,1,[["pid"=>$id,"price"=>$item["price"],"qty"=>$qt,'total'=>($item["price"]*$qt)]]);
            }
            $i++;
        }

      $request->session()->put('cart',$items);
       // return redirect('cart');
        return "You have successfully updated the quantity";

    }

    /* the following method is delete the product from session cart*/
    public  function delete_cart(Request $request,$id)
    {
        $carts=$request->session()->get("cart");

        foreach ($carts as $key=>$cart)
        {
            if($cart["pid"]==$id)
            {
                unset($carts[$key]);
                sort($carts);

            }
        }
          $request->session()->put('cart',$carts);
        return redirect('cart')->with('delete','You have successfully deleted item');
    }
    /* the following method is to show the details of a product*/
    public  function detail($id)
    {

        $product=Product::find($id);

        $brand_name=Brand::where('id',$product->brand_id)->get();
        $bname;
        foreach ($brand_name as $b) {
            $bname=$b->name;
        }
        $category_name=Category::where('id',$product->cat_id)->get();
        $cname;
        foreach ($category_name as $c) {
            $cname=$c->name;
        }
       $view=$product->view_count;
        $view=$view+1;
        $product->view_count=$view;
        $product->save();
        return view('product_detail',compact('product','cname','bname'));
    }



   /* the following method is to show  all products of the particular brand*/
    public function dynamic_show($name)
    {
        $brands=Brand::all();
        $categories=Category::all();

        $a=array();

        foreach($brands as $brand)
        {
            $ps=Product::where('brand_id',$brand->id)->get();

            $c=array();
            foreach ($ps as $product)
            {
                if($brand->id==$product->brand_id)
                {

                    array_push($c,$product->id);

                }



            }

            array_push($a,[$brand->name,count($c)]);



        }
        $c_p=array();
        foreach ($categories as $category)
        {
            $product=Product::where('cat_id',$category->id)->get();
            $catp=array();

            foreach ($product as $p)
            {
                if($category->id==$p->cat_id)
                {
                    array_push($catp,$p->id);
                }

            }
            array_push($c_p,[$category->name,count($catp)]);
        }




        $br=Brand::where('name',$name)->get();
        $b_id;
        foreach ($br as $b)
        {
            $b_id=$b->id;
        }
        $products=Product::where('brand_id',$b_id)->get();
       return view('home',compact('products','a','c_p','brands'));
    }


 /* the following method is to show  all products of the particular category */
    public function dynamic_show1($name)
    {
        $brands=Brand::all();
        $categories=Category::all();

        $a=array();

        foreach($brands as $brand)
        {
            $ps=Product::where('brand_id',$brand->id)->get();

            $c=array();
            foreach ($ps as $product)
            {
                if($brand->id==$product->brand_id)
                {

                    array_push($c,$product->id);

                }



            }

            array_push($a,[$brand->name,count($c)]);



        }
        $c_p=array();
        foreach ($categories as $category)
        {
            $product=Product::where('cat_id',$category->id)->get();
            $catp=array();

            foreach ($product as $p)
            {
                if($category->id==$p->cat_id)
                {
                    array_push($catp,$p->id);
                }

            }
            array_push($c_p,[$category->name,count($catp)]);
        }




        $cat=Category::where('name',$name)->get();
        $c_id;
        foreach ($cat as $c)
        {
            $c_id=$c->id;
        }
        $products=Product::where('cat_id',$c_id)->get();
        return view('home',compact('products','a','c_p','brands'));
    }


   /* the following method is search the product according to price range and brand */
    public  function search(Request $request)
    {
        $min=$request->get("min");
        $max=$request->get("max");
        $brand=$request->get("1");
        $brand2=$request->get("2");

           if(empty($brand) && empty($brand2))
           {
               $products=Product::all();
           }
           else
           {
               $products=Product::whereBetween('price', [$min, $max])->whereIn('brand_id',[$brand,$brand2])->get();
           }
        $brands=Brand::all();
        $categories=Category::all();

        $a=array();

        foreach($brands as $brand)
        {
            $ps=Product::where('brand_id',$brand->id)->get();

            $c=array();
            foreach ($ps as $product)
            {
                if($brand->id==$product->brand_id)
                {

                    array_push($c,$product->id);

                }



            }

            array_push($a,[$brand->name,count($c)]);



        }
        $c_p=array();
        foreach ($categories as $category)
        {
            $product=Product::where('cat_id',$category->id)->get();
            $catp=array();

            foreach ($product as $p)
            {
                if($category->id==$p->cat_id)
                {
                    array_push($catp,$p->id);
                }

            }
            array_push($c_p,[$category->name,count($catp)]);
        }






        return view('home',compact('products','a','c_p','brands'));
    }

    /* the following method redirect to checkout page */
    public  function checkout(Request $request)
    {
         $order_user_id="";
        if(Auth::check()) {
            $id = Auth::user()->id;
            $billings=Billing::where('user_id',$id)->first();
            $now=new DateTime();

           $order=Order::where('user_id',$id)->where('status','pending')->where('created_at','<',$now)->get();
            foreach ($order as $or)
            {
                $order_user_id=$or->user_id;
            }

        }
        $carts=$request->session()->get("cart");
        $products = array();
        for ($i = 0; $i < count($carts); $i++) {
            $product = Product::find($carts[$i]["pid"]);

            array_push($products, $product);
        }
        $total = array();
        foreach ($carts as $cart) {
            array_push($total, $cart['total']);
        }
        $t = array_sum($total);








       return view('checkout',compact('billings','products','t','order_user_id'));
    }
    /*  the following method is insert user billing information*/
    public  function insert_billing(BillingFormInsertRequest $request)
    {
      $billing=Billing::create([

           'user_id'=>Auth::user()->id,
           'first_name'=>$request->get('first_name'),
           'last_name'=>$request->get('last_name'),
           'email'=>$request->get('email'),
           'mobile'=>$request->get('mobile'),
           'address'=>$request->get('address'),

       ]);

        return 1;


    }

     /* the following method is to show the users' payment information */


    public function paymentInfo(Request $request){

        $user_id=Auth::user()->id;

        $orders=Order::where('user_id',$user_id)->where('status','pending')->get();
        $products=Product::all();

        foreach($orders as $order)
        {
            foreach($products as $product)
            {
                $oqty=$order->quantity;
                $pqty=$product->stock;
                if($order->product_id == $product->id)
                {
                    $product->stock=$pqty-$oqty;
                    $product->update();
                }
            }
        }

        foreach ($orders as $order)
        {
            $order->status="completed";

            $order->save();
        }

        $transaction=$request->get('tx');
        $amount=$request->get('amt');
        $currency=$request->get('cc');
        $status=$request->get('st');
        Payment::create([
            'user_id'=>$user_id,
            'transaction'=>$transaction,
            'amount'=>$amount,
            'currency'=>$currency,
            'status'=>$status,
        ]);
       $request->session('cart')->flush();
        return view('payment_success')->with('tra',$transaction);

    }
    /* the following method is to show the view of payment cancel page*/

    public  function paymentcancle()
    {
          return view('payment_cancel');
    }

    /* the following method is insert the product which users place order */

    public  function placeorder(Request $request)
    {
        if(Auth::check()) {
            $id = Auth::user()->id;
            $carts=$request->session()->get('cart');

            foreach ($carts as $cart)
            {
                $order=new Order();
                $order->user_id=$id;
                $order->product_id=$cart["pid"];
                $order->quantity=$cart["qty"];
                $order->total=$cart["total"];
                $order->save();

            }
            return 1;

        }

    }

    /* the following method is show the signed in user profile */

    public  function profile()
    {

            $user_id = Auth::user()->id;

        $billing = Billing::where('user_id', $user_id)->first();
        $orders = Order::where('user_id', $user_id)->get();
        $users = User::where('id', $user_id)->first();
        $products = Product::all();
        $payments = Payment::where('user_id', $user_id)->get();
        return view('profile', compact('billing', 'orders', 'payments', 'users', 'products'));

    }

    /* the following method is to show the signed in user's  billing information. */

    public  function edit_billing_form($id)
    {
        $billing=Billing::where('user_id',$id)->first();
        return view('edit_billing',compact('billing'));
    }

    /* the following  method  is the update the signed in user's billing information */

    public function update_billing_form(BillingUpdateRequestForm $request)
    {
        $first_name=$request->get('first_name');
        $last_name=$request->get('last_name');
        $address=$request->get('address');
        $mobile=$request->get('mobile');

        $u_id=Auth::user()->id;
        $billing=Billing::where('user_id',$u_id)->first();

        $billing->email=Auth::user()->email;
        $billing->first_name=$first_name;
        $billing->last_name=$last_name;
        $billing->address=$address;
        $billing->mobile=$mobile;
        $billing->save();
        return redirect(url('users/profile'));
    }
    /* the following method is to show change password form */
    public function show_form()
    {
        return view('change_password');
    }

    /* the following  method is update the signied user's password  */

    public  function update_password(Request $request)
    {
        $this->validate($request,[
        'password' => 'required|string|confirmed',
        'password_confirmation' => 'required|string',
    ]);

        $id=Auth::user()->id;
        $user=User::where('id',$id)->first();

        $user->password=bcrypt($request->get('password'));
        $user->save();
        return redirect()->to('users/profile')->with('change','Your password has been changed successfully');
    }


}
