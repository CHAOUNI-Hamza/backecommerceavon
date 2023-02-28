<?php

namespace App\Http\Controllers;

use App\Models\Sex;
use App\Http\Requests\StoreSexRequest;
use App\Http\Requests\UpdateSexRequest;
use App\Http\Resources\SexResource;
use Illuminate\Http\Request;

class SexController extends Controller
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
            return new SexResource(Sex::paginate($request->paginate));
        }*/
        return new SexResource(Sex::paginate(2));
        //$sex = Sex::all();
        //return SexResource::collection($sex);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sex = new Sex;
        $sex->title = $request->title;
        $sex->description = $request->description;
        $sex->image = $request->image;
        $sex->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sex  $sex
     * @return \Illuminate\Http\Response
     */
    public function show(Sex $sex)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Sex  $sex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sex $sex, $id)
    {
        $sex = Sex::find($id);
        $sex->title = $request->title;
        $sex->description = $request->description;
        $sex->image = $request->image;
        $sex->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $sex = Sex::onlyTrashed()->get();
        return SexResource::collection($sex);
    }

    // delete
    public function destroy($id) {
        $sex = Sex::withTrashed()
        ->where('id', $id);
        $sex->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $sex = Sex::onlyTrashed()
        ->where('id', $id);
        $sex->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $sex = Sex::onlyTrashed()
        ->where('id', $id);
        $sex->forceDelete();
        return 'forced';
    }
}
