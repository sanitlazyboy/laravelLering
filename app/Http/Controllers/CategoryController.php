<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', ["title"=>"Category list", 'data' =>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input  = $request->all();
        // $file_name = $request->photo->store('images');

        $file = $request->file('image'); // Retrieve the uploaded file from the request
        $file_name = $file->getClientOriginalName(); // Retrieve the original file_name

        Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
        $input['image']= $file_name;
        $input['status']= 1;

        try{
            // Category::create(['category_name'=>$input['category_name'], 'image'=> $file_name, 'status'=>1]);
            Category::create($input);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }

        return redirect()->route('categories.index')->with('success', 'Created Data');

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
        $data = Category::find($id);
        return view('category.edit', compact('data'));

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
        $data = Category::where('id', $id)->first();
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
