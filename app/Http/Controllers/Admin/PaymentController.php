<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Billing;
use App\Product;
use App\Category;
use App\Brand;
use App\User;
use App\Order;
use App\Payment;

class PaymentController extends Controller
{
    /* the following method is to show all the information of the payment */
    public function show()
    {
        $products=Product::all();
        $categories=Category::all();
        $brands=Brand::all();
        $billings=Billing::all();
        $users=User::all();
        $orders=Order::all();
        $payments=Payment::paginate(5);
        return view("Admin.payment.view",compact('products','categories','brands','billings','users','orders','payments'));
    }
}
