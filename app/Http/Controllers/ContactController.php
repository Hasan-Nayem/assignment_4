<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // exit();
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        // return view('index')->with('message', 'Contact Added Successfully');
        return redirect()->route('contact.index')->with('message', 'Contact Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        return view('show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // exit();
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();
        return redirect()->route('contact.index')->with('message', 'Contact Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('message', 'Contact Information Deleted Successfully');
    }

    public function search(Request $request)
    {
        // dd($request->title);
        // exit();
        $contacts = Contact::where('name', 'LIKE', '%' . $request->title . '%')
            ->orWhere('email', 'LIKE', '%' . $request->title . '%')
            ->get();
        return view('index', compact('contacts'))->with('message', "No contact found!!");
        // return redirect()->route('contact.index', ['contacts' => $contacts]);
    }

    public function sort(Request $request)
    {
        // dd($request->sort_by);
        // exit();
        $contacts = Contact::orderBy($request->sort_by, "ASC")->get();
        return view('index', compact('contacts'))->with('message', "contacts sorted by " . $request->sort_by . " successfully");
        // return redirect()->route('contact.index', ['contacts' => $contacts]);
    }
}
