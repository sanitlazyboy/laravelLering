<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category = Product::find(1)->category;
        // return $this->hasOne(Product::class, 'category_id');
        // dd($category);
        // $category = Category::all();
        // $product = Product::with('category')->first();
        // dd($product->toArray());
        $product = Product::with('category')->get();
        // dd($product);
        return view('product.index', ["title"=>"Product list", 'data' =>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = Category::all()->pluck('category_name','id');
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $input  = $request->all();
        // $input['category_id']= 1;
        // $input['product_name']= 1;
        // $input['color']= 1;
        // $input['quantity']= 1;
        // $input['status']= 1;

        try{
            // Category::create(['category_name'=>$input['category_name'], 'image'=> $file_name, 'status'=>1]);
            Product::create($input);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('products.index')->with('error', $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Created Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("Show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $categories  = Category::all()->pluck('category_name','id');
        return view('product.edit', compact('data','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Product::where('id', $id)->first();

        $data->update($input);
        return redirect()->back()->with('success', 'Updated Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
