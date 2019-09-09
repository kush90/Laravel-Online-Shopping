<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Brand;
use App\Product;
use App\Order;
use App\Payment;
use App\Billing;
use DateTime;
use DB;




class ReportController extends Controller
{

    /* the following method is to show the report page */
    public  function show()
    {

        $products=Product::all();
        $categories=Category::all();
        $brands=Brand::all();
        $billings=Billing::all();
        $users=User::all();
        $orders=Order::all();
        $payments=Payment::all();


        return view('Admin.report.view',compact('products','categories','brands','billings','users','orders','payments'));
    }

    /* the following method is generate the report according to daily,weekly and monthly */
    public  function view(Request $request)
    {

        $products=Product::all();
        $categories=Category::all();
        $brands=Brand::all();
        $billings=Billing::all();
        $users=User::all();
        $orders=Order::all();
        $payments=Payment::all();
        $option = $request->get('optradio');
        $date = $request->get('dt');
        $month=$request->get('month');
        $daily="";
        $order="";


        switch ($option) {
            case 'daily':
                $daily = Payment::where('created_at', $date)->get();
                $order=Order::where('created_at',$date)->get();

                $error = 'No report found';
                $title='List of daily transaction reports for';
                $title1='List of daily sales reports for';

                if (count($daily) == 0 && count($order)==0) {
                    return view('Admin.report.view', compact('products', 'categories', 'brands', 'billings', 'users', 'orders', 'payments', 'error','title','title1'));
                } else {
                     return view('Admin.report.view',compact('products','categories','brands','billings','users','orders','payments','daily','order','title','date','title1'));
                }
                break;

            case 'weekly':
                $error = 'No report found';
                $title='List of weekly transaction reports for';
                $title1='List of weekly sales reports for';

                $today = date('Y-m-d');
                $lastday=date('Y-m-d', strtotime('-7 days'));

                $daily=Payment::whereBetween('created_at',[$lastday, $today])->get();
                $order=Order::whereBetween('created_at',[$lastday, $today])->get();



                if (count($daily) == 0 && count($order)==0) {
                    return view('Admin.report.view', compact('products', 'categories', 'brands', 'billings', 'users', 'orders', 'payments', 'error','title','title1'));
                } else {
                    return view('Admin.report.view',compact('products','categories','brands','billings','users','orders','payments','daily','order','title','date','title1'));
                }

                break;
            case 'monthly':
                $error = 'No report found';
                $title='List of monthly transaction reports for';
                $title1='List of monthly sales reports for';
                $year = date('Y');
                $day = date('d');
                $monthly=array();
                for($i=1;$i<=31;$i++)
                {
                    $monthly[]=$year.'-'.$month.'-'.$i;


                }
                $daily=Payment::whereIn('created_at',$monthly)->get();
                $order=Order::whereIn('created_at',$monthly)->get();
                if (count($daily) == 0 && count($order)==0) {
                    return view('Admin.report.view', compact('products', 'categories', 'brands', 'billings', 'users', 'orders', 'payments', 'error','title','title1'));
                } else {
                    return view('Admin.report.view',compact('products','categories','brands','billings','users','orders','payments','daily','order','title','date','title1'));
                }




                break;
        }




    }

}
