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
        $user = User::find($id);
        $contacts = Contact::all(); 
        $stages = Stage::all();
        return view('agent.contacts', compact('user', 'contacts', 'stages')); 
    }

    public function showOpportunities() {
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	$contacts = Contact::all();
    	$stages = Stage::all();
    	return view('agent.opportunities', compact('user', 'contacts', 'stages'));
    }

    public function addAContact() {
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




    }
}
