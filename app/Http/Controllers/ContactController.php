<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Request;

class ContactController extends Controller
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
            return new ContactResource(Contact::paginate($request->paginate));
        }*/
        $contact = Contact::all();
        return ContactResource::collection($contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->save();

        return "created";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact, $id)
    {
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->save();

        return 'Updated';
    }

    // trashed
    public function trashed() {
        $contact = Contact::onlyTrashed()->get();
        return ContactResource::collection($contact);
    }

    // delete
    public function destroy($id) {
        $contact = Contact::withTrashed()
        ->where('id', $id);
        $contact->delete();
        return 'delete';
    }

    // restore
    public function restore($id) {
        $contact = Contact::onlyTrashed()
        ->where('id', $id);
        $contact->restore();
        return 'restore';
    }

    // forced
    public function forced($id) {
        $contact = Contact::onlyTrashed()
        ->where('id', $id);
        $contact->forceDelete();
        return 'forced';
    }
}
