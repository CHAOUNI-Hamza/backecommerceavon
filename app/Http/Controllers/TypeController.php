<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Resources\TypeResource;
use Illuminate\Http\Request;

class TypeController extends Controller
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
            return new ContactResource(Type::paginate($request->paginate));
        }*/
        $type = Type::all();
        return TypeResource::collection($type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type;
        $type->name = $request->name;
        $type->image = $request->image;
        $type->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type, $id)
    {
        $type = Type::find($id);
        $type->name = $request->name;
        $type->image = $request->image;
        $type->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $type = Type::onlyTrashed()->get();
        return TypeResource::collection($type);
    }

    // delete
    public function destroy($id) {
        $type = Type::withTrashed()
        ->where('id', $id);
        $type->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $type = Type::onlyTrashed()
        ->where('id', $id);
        $type->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $type = Type::onlyTrashed()
        ->where('id', $id);
        $type->forceDelete();
        return 'forced';
    }
}
