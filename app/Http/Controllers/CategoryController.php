<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('categories.index' , compact('category'));
    }

    public function download(Category $category) {

    //    return $category;
        $full_path = public_path('categories/' . $category->file_name);
        return response()->download($full_path);

    }

    public function changeStatus(Category $category){
        // return $category;
        if($category->status == 'public'){
            $category->status = 'private';
        }else {
            $category->status = 'public';
        }
        $category->save();
        return redirect()->back();
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'=>'string|required|min:5',
            'image'=>'File|required'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $image = $request->file('image');
        // dd($image);
        $file_name = time() . "-" . $image->getClientOriginalName();
        $file_type = $image->getClientMimeType();
        $image->move(public_path('categories/') , $file_name);
        $category->file_name = $file_name;
        $category->file_type = $file_type;

        $category->save();
        return redirect()->route('categories.index')->with('success' , "data stored successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'string|required|min:5',
            'image'=>'File'
        ]);
        // $category = new Category();
        $category->name = $request->name;

        $category->update();

        $image = $request->file('image');


        // if($image) {
        //     echo "yes image"; // check if exist image or no
        // }else {
        //     echo "no image";
        // }
        if($image) {
            $path = public_path('categories/' . $category->file_name);
            $file_name = time() . "-" . $image->getClientOriginalName();
            $file_type = $image->getClientMimeType();
            $image ->move(public_path('categories/') , $file_name);
            $category->file_name = $file_name;
            $category->file_type = $file_type;
            unlink($path);

        }

        $category->save();


        return redirect()->route('categories.index')->with('success' , "data updated");

     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $path = public_path('categories/' . $category->file_name);
        unlink($path);
        $category->delete();


        return redirect()->route('categories.index')->with('success' , 'data deleted');
    }
}
