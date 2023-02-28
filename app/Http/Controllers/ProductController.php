<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        if( $request->search ) {
            $products = Product::where('name','LIKE','%'.$request->search.'%')->paginate(8); 
        }
        elseif( $request->size || $request->color || $request->type || $request->category ) {

            $products = Product::orderBy('id', 'DESC')
                ->orWhereIn('size_id', [$request->size])
                ->orWhereIn('color_id', [$request->color])
                ->orWhereIn('type_id', [$request->type])
                ->orWhere('category_id', $request->category)
                ->paginate(20);

        }
        else {
            $products = Product::orderBy('id', 'DESC')->paginate(9);
        }

        return new ProductResource($products);     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product = $request->product;
        $product->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $slug)
    {
        $products = DB::table('products')->where('slug', $slug)->first();
        return $products;
        //return new ProductResource($products);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $product = Product::find($id);
        $product->product = $request->product;
        $product->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $product = Product::onlyTrashed()->get();
        return ProductResource::collection($product);
    }

    // delete
    public function destroy($id) {
        $product = Product::withTrashed()
        ->where('id', $id);
        $product->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $product = Product::onlyTrashed()
        ->where('id', $id);
        $product->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $product = Product::onlyTrashed()
        ->where('id', $id);
        $product->forceDelete();
        return 'forced';
    }
}
