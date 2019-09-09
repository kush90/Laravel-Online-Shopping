<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandInsertFormRequest;
use App\Brand;
class BrandController extends Controller
{
    /* the following method is to show the brand page*/
    public function show()
    {
        $brands=Brand::all();
        return view('Admin.brands.view',compact('brands'));
    }
    /* the following method is insert brand page */
    public function create()
    {
        return view('Admin.brands.add');
    }
    /* the following method is insert the brand into the database*/

    public function store(BrandInsertFormRequest $request)
    {
        $name= $request->get('name');
        Brand::create(['name'=>$name]);
        return redirect("admin/brand/create")->with('status','A new brand Is Successfully Inserted');

    }
}
