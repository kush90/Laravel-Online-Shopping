<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use Storage;
use App\Http\Requests\ProductInsertFormRequest;
use App\Http\Requests\UpdateProductFormRequest;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    /*  the following method is to show the add product page */

    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        return view('Admin.products.create',compact('brands','categories'));
    }
    /* the following method is to show all the products   */

    public  function show()
    {
        $products=Product::paginate(5);
        $categories=Category::all();
        $brands=Brand::all();
        return view("Admin.products.view",compact('products','categories','brands'));
    }

    /*  the following method is insert the product into the database */

    public  function store(ProductInsertFormRequest $request)
    {
        $img=$request->file('imgs');
        $img_name=array();
        foreach ($img as $im)
        {
            $name=uniqid().'_'.$im->getClientOriginalName();
            array_push($img_name,$name);
            $im->move(public_path().'/images',$name);
        }
        Product::create([

            'title'=>$request->get("title"),
            'slug'=>$request->get("slug"),
            'description'=>$request->get("description"),
            'imgs'=>serialize($img_name),

            'cat_id'=>(int)$request->get("cat_id"),
            'brand_id'=>(int)$request->get("brand_id"),
            'price'=>$request->get("price"),
            'stock'=>$request->get("stock"),

        ]);
        return redirect("admin/product/create")->with('status','Successfully Inserted');
    }

    /* the following method is delete the particular product */

    public function delete($id)
    {
        $product=Product::whereId($id)->first();
        $product->delete();
       return redirect("admin/product/view")->with('status','Successfully Deleted');
    }

    /* the following method is to show the information of the particular product in the form */
    public function editform($id)
    {
        $product=Product::where('id',$id)->first();
        $categories=Category::all();
        $brands=Brand::all();
        return view("Admin.products.edit",compact('product','categories','brands'));
    }

    /* the following method is update  the particular product */

    public  function update(UpdateProductFormRequest $request,$id)
    {
        $image_array=array();

        $images=$request->file('imgs');
         if(empty($images))
         {
             $product=Product::whereId($id)->firstOrFail();
             for ($i=0;$i<count(unserialize($product->imgs));$i++)
             {


                 $img=unserialize($product->imgs)[$i];
                 array_push($image_array,$img);
             }

         }
         else
         {
             foreach ($images as $image)
             {
                 $image_name=uniqid().'_'.$image->getClientOriginalName();
                 array_push($image_array,$image_name);
                 $image->move(public_path().'/images',$image_name);


             }




         }


       $product=Product::where('id',$id)->first();
           $product->title=$request->get('title');
           $product->slug=$request->get('slug');
           $product->description=$request->get('description');
           $product->price=$request->get('price');
           $product->imgs=serialize($image_array);
           $product->cat_id=(int)$request->get('cat_id');
           $product->brand_id=(int)$request->get('brand_id');
           $product->stock=(int)$request->get('stock');
           $product->update();
           return redirect("admin/product/view")->with('status','Successfully Updated');



    }
}
