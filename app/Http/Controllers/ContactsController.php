<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Contacts;
class ContactsController extends Controller
{
    public function index()
    {
        return Inertia::render('index', [
            'contacts' => Contacts::all()->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'name' => $contact->name,
                    'email' => $contact->email,
                    'phone' => $contact->phone,
                    'address' => $contact->address,
                    'dateOfBirth' => $contact->dateOfBirth,
                ];
            })
        ]);
    }
    public function create(){
        return Inertia::render('create');
    }

    public function store(Request $request){
        $validated= $request->validate([
            'name' => 'required|max:255',
            'email'=> 'required|email|unique:contacts',
            'phone'=> 'required|unique:contacts|max:14|min:10',
            'dateOfBirth'=>'required',
            'address'=> 'required',
        ]);
        Contacts::create($validated);
        return Redirect::route('contacts.index')->with('message','Contact Created Successfully');
    }

    public function edit($id){
        $contact= Contacts::find($id);
        return Inertia::render('edit',[
            'contact'=> $contact
        ]);
    }
    public function update(Request $request, $id){

        $contact= Contacts::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($contact->id),
            ],
            'phone' => [
                'required',
                Rule::unique('contacts')->ignore($contact->id),
                'max:14',
                'min:10',
            ],
            'dateOfBirth' => 'required',
            'address' => 'required',
        ]);
    
        $contact->update($validated);

        return Redirect::route('contacts.index')->with('message','Contact Updated Successfully');
    }

    public function destroy($id){
        $contact=Contacts::findOrFail($id);
       $contact->delete();
       return Redirect::route('contacts.index')->with('message','Contact Deleted Successfully');
    }

   
}
