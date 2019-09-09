<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Billing;
use App\Product;
use App\Category;
use App\Brand;

class AddressController extends Controller
{
    /* the following method is to show the address page */
    public  function show()
    {
        $products=Product::all();
        $categories=Category::all();
        $brands=Brand::all();
        $billings=Billing::paginate(5);
        $users=User::all();
        return view("Admin.billing.view",compact('products','categories','brands','billings','users'));
    }
}
