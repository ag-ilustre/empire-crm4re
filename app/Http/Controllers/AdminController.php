<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Contact;
use App\Stage;
use Session;
use DB;
use Auth;

class AdminController extends Controller
{
    public function showAgents(){
        $users = User::all(); 
    	$roles = Role::all();
    	return view('admin.agents', compact('users', 'roles')); 
    }

    public function editAgentRole(Request $request, $id){
    	$agentroleedit = User::find($id);
    	$agentroleedit->role_id = $request->editedRole;
    	$agentroleedit->save();
    	return redirect('/admin/agents');
    }

    public function deleteAgent($id){
    	$agentdelete = User::find($id);
    	$agentdelete->delete();
    	return redirect('/admin/agents');
    }

    public function showContacts(){
        $users = User::all();
        $contacts = Contact::all(); 
        $stages = Stage::all();
        return view('admin.contacts', compact('users', 'contacts', 'stages')); 
    }
}
