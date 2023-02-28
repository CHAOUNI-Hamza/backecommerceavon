<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Http\Resources\ColorResource;
use Illuminate\Http\Request;

class ColorController extends Controller
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
        /*if($request->paginate) {
            return new ContactResource(Color::paginate($request->paginate));
        }*/
        $color = Color::all();
        return ColorResource::collection($color);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color;
        $color->name = $request->name;
        $color->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSizeRequest  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color, $id)
    {
        $color = Color::find($id);
        $color->name = $request->name;
        $color->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $color = Color::onlyTrashed()->get();
        return ColorResource::collection($color);
    }

    // delete
    public function destroy($id) {
        $color = Color::withTrashed()
        ->where('id', $id);
        $color->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $color = Color::onlyTrashed()
        ->where('id', $id);
        $color->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $color = Color::onlyTrashed()
        ->where('id', $id);
        $color->forceDelete();
        return 'forced';
    }
}
