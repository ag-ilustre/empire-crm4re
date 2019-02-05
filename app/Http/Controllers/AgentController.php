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
}
