<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()  
    {
        //$this->middleware(['auth:api'], ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::all();
        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->image = $request->image;
        $category->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $category = Category::onlyTrashed()->get();
        return CategoryResource::collection($category);
    }

    // delete
    public function destroy($id) {
        $category = Category::withTrashed()
        ->where('id', $id);
        $category->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $category = Category::onlyTrashed()
        ->where('id', $id);
        $category->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $category = Category::onlyTrashed()
        ->where('id', $id);
        $category->forceDelete();
        return 'forced';
    }
}
