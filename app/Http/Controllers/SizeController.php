<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Http\Resources\SizeResource;
use Illuminate\Http\Request;

class SizeController extends Controller
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
            return new ContactResource(Size::paginate($request->paginate));
        }*/
        $size = Size::all();
        return SizeResource::collection($size);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = new Size;
        $size->name = $request->name;
        $size->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSizeRequest  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size, $id)
    {
        $size = Size::find($id);
        $size->name = $request->name;
        $size->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $size = Size::onlyTrashed()->get();
        return SizeResource::collection($size);
    }

    // delete
    public function destroy($id) {
        $size = Size::withTrashed()
        ->where('id', $id);
        $size->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $size = Size::onlyTrashed()
        ->where('id', $id);
        $size->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $size = Size::onlyTrashed()
        ->where('id', $id);
        $size->forceDelete();
        return 'forced';
    }
}
