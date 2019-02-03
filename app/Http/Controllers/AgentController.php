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
    public function showAgentContacts(){
        $users = User::all();
        $contacts = Contact::all(); 
        $stages = Stage::all();
        return view('agent.contacts', compact('users', 'contacts', 'stages')); 
    }
}
