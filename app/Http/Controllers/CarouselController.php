<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Http\Requests\StoreCarouselRequest;
use App\Http\Requests\UpdateCarouselRequest;
use App\Http\Resources\CarouselResource;
use Illuminate\Http\Request;

class CarouselController extends Controller
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
        return new CarouselResource(Carousel::latest()->take(2)->get());
        /*$carousel = Carousel::all();
        return ArticleResource::collection($carousel);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carousel = new Carousel;
        $carousel->title = $request->title;
        $carousel->description = $request->description;
        $carousel->image = $request->image;
        $carousel->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel, $id)
    {
        $carousel = Carousel::find($id);
        $carousel->title = $request->title;
        $carousel->description = $request->description;
        $carousel->image = $request->image;
        $carousel->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $carousel = Carousel::onlyTrashed()->get();
        return CarouselResource::collection($carousel);
    }

    // delete
    public function destroy($id) {
        $carousel = Carousel::withTrashed()
        ->where('id', $id);
        $carousel->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $carousel = Carousel::onlyTrashed()
        ->where('id', $id);
        $carousel->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $carousel = Carousel::onlyTrashed()
        ->where('id', $id);
        $carousel->forceDelete();
        return 'forced';
    }
}
