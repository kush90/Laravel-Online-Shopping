<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryInsertFormRequest;
use App\Category;

class CategoryController extends Controller
{
    /* the following method is to show the category page*/
    public function show()
    {
        $categories=Category::all();
        return view('Admin.categories.view',compact('categories'));
    }

    /* the following method is insert category page */

    public function create()
    {
        return view('Admin.categories.add');
    }

    /* the following method is insert the category  into the database*/

    public function store(CategoryInsertFormRequest $request)
    {
        $name= $request->get('name');
        Category::create(['name'=>$name]);
        return redirect("admin/category/create")->with('status','A new category Is Successfully Inserted');

    }
}
