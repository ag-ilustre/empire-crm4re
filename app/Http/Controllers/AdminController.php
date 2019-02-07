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

    public function editAgentRole($id, Request $request){
        $agentroleedit = User::find($id);
        $agentroleedit->role_id = $request->editedRoleId;
    	$agentroleedit->save();
        
        $agent_first_name = $agentroleedit->first_name;
        $agent_last_name = $agentroleedit->last_name;

        $role = Role::find($agentroleedit->role_id);
        $role_id = $role->id;
        $role_name = $role->name;

        

        // $response = array(
        //   'role_id' => 'role_id', 
        //   'role_name' => 'role_name'
        // );

        return response()->json(['agent_first_name'=> $agent_first_name, 'agent_last_name'=> $agent_last_name,'role_id' => $role_id, 'role_name' => $role_name]);
        // return response()->json(['role_id' => 'role_id', 'role_name' => 'role_name']);
    	// return redirect('/admin/agents');

        // return view('nameview', compact('agenttroleedit'));

        // $query = Response::json($request->input('agentroledit'));
      //  $query = Response::json($request->input('yourData'));
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
