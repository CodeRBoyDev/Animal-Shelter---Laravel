<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;
use View;
use DB;
use Validator;
use App\Mail\ContactFormMail;
use App\Mail\UserRequest;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $contact = DB::table('inquiry')->paginate(5);
        return View::make('contact.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
            $data = request()->validate([
            'inquiry_name'=>'required|min:4|',
            'inquiry_email'=>'required|email|',
            'inquiry_subject'=>'required|min:3',
            'inquiry_message'=>'required|min:10',
            ]);
            $input = $request->all();
            Contact::create($input); 
            Mail::to('petsociety0708@gmail.com')->send(new ContactFormMail($data));
    
            return Redirect::to('contact/create')
                ->with('success', 'Thanks for sending us a message! Someone from our shelter will be contacting
                you soon to respond to your inquiry.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return View::make('contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return Redirect::to('contact')->with('success','Contact Deleted!');
    }
}
