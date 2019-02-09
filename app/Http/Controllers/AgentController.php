<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Stage;
use Session;
use DB;
use Auth;

class AgentController extends Controller
{
    public function showAgentContacts() {
    	$id = Auth::user()->id;
        $user_id = User::find($id);
        $contacts = Contact::where('user_id', 2)->get(); //edit to original $user_id
        $stages = Stage::all();
        return view('agent.contacts', compact('contacts', 'stages')); 
    }

    public function showOpportunities() {
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	$contacts = Contact::all();
    	$stages = Stage::all();
    	return view('agent.opportunities', compact('id', 'user', 'contacts', 'stages'));
    }

    public function saveNewContact(Request $request) {
        $rules = array(
            "contactFirstName" => "required",
            "contactLastName" => "required",
            "contactContactNumber" => "required",
            "contactEmail"  => "required",
            "contactOccupation"  => "required",
            "contactCompany"  => "required",
            "contactAddress"  => "required",
            "contactStage"  => "required",
            
        );
        //to validate $request from form
        $this->validate($request, $rules);

        $id = Auth::user()->id;
        $users = User::all();
        $contact = new Contact;
        $contact->first_name = $request->contactFirstName;
        $contact->last_name = $request->contactLastName;
        $contact->contact_number = $request->contactContactNumber;
        $contact->email = $request->contactEmail;
        $contact->occupation = $request->contactOccupation;
        $contact->company = $request->contactCompany;
        $contact->address = $request->contactAddress;
        $contact->stage_id = $request->contactStage;
        $contact->user_id = $id;
        $contact->save();

        Session::flash("successmessage", "New Contact added successfully!");
        return redirect('/agent/contacts');
    }

    public function viewProfileContact($id) {
        $user_id = Auth::user()->id; // get user id
        $contact = Contact::find($id); // get specific contact
        $tasks = $contact->tasks()->get(); // get all tasks for contact
        // $notes = $contact->notes()->get(); 
        // $properties = $contact->projects()->get(); 
        $stages = Stage::all(); // to get names of stages
        return view('agent.contactprofile', compact('contact', 'stages', 'tasks')); 
    }
}
