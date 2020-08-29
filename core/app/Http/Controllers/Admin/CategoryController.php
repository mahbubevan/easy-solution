<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index')->with([
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'category' => 'required|string|min:1|max:200,unique:categories'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $category = new Category();
        $category->name = strtoupper($request->category);
        $category->save();

        return redirect()->back()->with('success','Added');
    }

    public function destroy(Request $request)
    {
        $id = $request->category;
        $category = Category::findOrFail($id);
        $category->delete();


        return redirect()->back()->with('success','Deleted');
    }
}
