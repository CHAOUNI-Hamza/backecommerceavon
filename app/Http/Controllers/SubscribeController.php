<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Http\Requests\StoreSubscribeRequest;
use App\Http\Requests\UpdateSubscribeRequest;
use App\Http\Resources\SubscribeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
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
            return new ContactResource(Subscribe::paginate($request->paginate));
        }*/
        $subscribe = Subscribe::all();
        return SubscribeResource::collection($subscribe);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscribeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscribe = new Subscribe;
        $subscribe->name = $request->name;
        $subscribe->email = $request->email;
        $subscribe->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscribeRequest  $request
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscribe $subscribe, $id)
    {
        $subscribe = Subscribe::find($id);
        $subscribe->name = $request->name;
        $subscribe->email = $request->email;
        $subscribe->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $subscribe = Subscribe::onlyTrashed()->get();
        return SubscribeResource::collection($subscribe);
    }

    // delete
    public function destroy($id) {
        $subscribe = Subscribe::withTrashed()
        ->where('id', $id);
        $subscribe->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $subscribe = Subscribe::onlyTrashed()
        ->where('id', $id);
        $subscribe->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $subscribe = Subscribe::onlyTrashed()
        ->where('id', $id);
        $subscribe->forceDelete();
        return 'forced';
    }
}
