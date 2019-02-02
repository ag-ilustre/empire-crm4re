<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
use DB;
use Auth;

class AdminController extends Controller
{
	//page: /agents
    public function showAgents(){
        //SELECT all from items_table
        $users = User::all(); 
    	// $items = DB::table('items')->select('name')->get(): //example of raw query
        //SELECT all from categories_table
    	$roles = Role::all();
        //return the catalog.blade.php with the variables $items and 
    	return view('admin.agents', compact('users', 'roles')); 
    }

    public function editAgentRole(Request $request, $id){
    	$agentroleedit = User::find($id);
    	$agentroleedit->role_id = $request->editedRole;
    	$agentroleedit->save();
    	// dd($taskupdate);
    	return redirect('/agents');
    }

    public function deleteAgent($id){
    	$agentdelete = User::find($id);
    	$agentdelete->delete();
    	return redirect('/agents');
    }

    //page: /contacts
}
