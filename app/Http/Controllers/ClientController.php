<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        if($request->paginate) {
            return new CategoryResource(Client::paginate($request->paginate));
        }
        /*$client = Client::all();
        return CategoryResource::collection($client);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->image = $request->image;
        $client->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, $id)
    {
        $client = Client::find($id);
        $client->name = $request->name;
        $client->image = $request->image;
        $client->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $client = Client::onlyTrashed()->get();
        return CategoryResource::collection($client);
    }

    // delete
    public function destroy($id) {
        $client = Client::withTrashed()
        ->where('id', $id);
        $client->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $client = Client::onlyTrashed()
        ->where('id', $id);
        $client->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $client = Client::onlyTrashed()
        ->where('id', $id);
        $client->forceDelete();
        return 'forced';
    }
}
