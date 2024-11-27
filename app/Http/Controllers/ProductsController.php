<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class ProductsController extends Controller
{
    // This method will show products page
    public function index(){
        //to show list of products 
       $products =  Products::orderBy("created_at", "DESC")->get();
       return view('Products.list',[
        'products' => $products
       ]);
    }
    // This method will show  create products page

    public function create(){
        return view('Products.create');
    }
    // This method will store products in database

    public function store(Request $request){
        $rules=[
            'name' => 'Required|min:5',
            'sku' => 'Required|min:3',
            'price' => 'Required|numeric',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    
        ];

        // here we will append a image in rules
        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Products.create')->withInput()->withErrors($validator);
        }

        //here we will be insert product in database:
        $products = new Products();
        $products->name = $request->name;
        $products->sku = $request->sku;
        $products->price = $request->price;
        $products->description = $request->description;
        // save the product before handling the image
        $products->save();

        if  ($request->image != "") {

            //here we will store image 
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension(); //define img extension
            $imageName = time().'.'.$ext; //Unique image name

            //save image in product directory

            $image->move(public_path('Uploads/Products'),$imageName);

            //we will save image name in database
            $products->image = $imageName;
            $products->save();
        }
              
        return redirect()->route('Products.index')->with('success', 'Product added successfully');
    }
    // This method will edit products page
    public function edit($id){
        $product = Products::findorfail($id);
        return view('Products.edit',[
            'product'=> $product]
        );

    }
    // This method will update products page
    public function update($id, Request $request){
        
        $product = Products::findorfail($id);
        $rules=[
            'name' => 'Required|min:5',
            'sku' => 'Required|min:3',
            'price' => 'Required|numeric',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    
        ];

        // here we will append a image in rules
        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        $validator = validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('Products.edit',$product->id)->withInput()->withErrors($validator);
        }

        //here we will be update product in database:
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        // save the product before handling the image
        $product->save();

        if  ($request->image != "") {
            // delete old image
            File::delete(public_path('Uploads/Products/'.$product->image));

            //here we will update  image 
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension(); //define img extension
            $imageName = time().'.'.$ext; //Unique image name

            //save image in product directory

            $image->move(public_path('Uploads/Products'),$imageName);

            //we will save image name in database
            $product->image = $imageName;
            $product->save();
        }
              
        return redirect()->route('Products.index')->with('success', value: 'Product updated successfully');

    }
    // This method will delete products
    public function destory($id){
        $product = Products::findorfail($id);

        // delete prooduct image
        File::delete(public_path('Uploads/Products/'.$product->image));

        //delete product from database
        $product->delete();
        
        // redirect to products page
        return redirect()->route('Products.index')->with('success', value: 'Product deleted successfully');

    }
}
