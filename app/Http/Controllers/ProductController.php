<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::join('categories', 'categories.id','=', 'products.category_id')->select('products.*','categories.category_name')->get();
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
        // dd($input);
        // $file_name = $request->photo->store('images');

        $file = $request->file('image'); // Retrieve the uploaded file from the request
        $file_name = $file->getClientOriginalName(); // Retrieve the original file_name

        Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
        $input['image']= $file_name;
        $input['status']= true;

        try{
            // Product::create(['product_name'=>$input['product_name'], 'image'=> $file_name, 'status'=>1]);
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
        //
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
        return view('product.edit', compact('data'));

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
        $file_name = "";  
        // $file_name = $data->image;  
        if($request->hasFile('image')){
            $file = $request->file('image'); // Retrieve the uploaded file from the request
            $file_name = $file->getClientOriginalName(); // Retrieve the original file_name

            Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
        };

        if($file_name){
            $input['image']=$file_name;
        }
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
