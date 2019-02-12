<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Project;
use App\PropertyStatus;
use App\Role;
use App\Stage;
use App\Task;
use App\TaskStatus;
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
        $stages = Stage::all(); // to get names of stages
        $projects =Project::all();


        // $user->posts()->where('active', 1)->get(); //example of syntax

        // $projects = $contact->projects()->detach();   //this deletes a row   
       
        
        $property_statuses = PropertyStatus::all();
        $tasks = $contact->tasks()->get(); // get all tasks for this contact
        // $notes = $contact->notes()->get(); 
      
        $properties = $contact->projects()->get();
        // dd($projects);

        if($user_id == $contact->user_id) {
            return view('agent.contactprofile', compact('contact', 'stages', 'projects', 'properties', 'property_statuses', 'tasks')); 
        } else {
            return redirect('/home');
        }
    }

    public function deleteContact($id){
        $countTask = Task::where(['contact_id' => $id])->get()->count();

        // to check in console.log:
        // return response()->json(['message' => 'test']);

        if ($countTask == 0) {
            $contact = Contact::find($id);

            $contact->delete();
            // return redirect('/admin/agents');
            return response()->json(['status' => 'deleted', 'message'=> 'Deleted Contact successfully!', 'contactdelete_id'=> $id]);
        } else {
            return response()->json(['message'=> 'Not allowed! Contact has associated tasks.']);
        }
    }

    public function saveNewTask($id, Request $request) {
        
        $task = new Task;
        $task->name = $request->newTask;
        $task->deadline = $request->taskDeadline;
        $task->task_status_id = 1;
        $task->contact_id = $id;
        $task->save();

        return response()->json(['status' => 'saved', 'message'=> 'Added new task successfully!']);
    }

    public function showEditContactForm($id) {
        $user_id = Auth::user()->id; // get user id
        $contact = Contact::find($id);
        $stages = Stage::all();


        if($user_id == $contact->user_id) {
            return view('agent.editcontact', compact('contact', 'stages')); 
        } else {
            return redirect('/home');
        }

    }

    public function saveEditedContact($id, Request $request) {
        $rules = array(
            "editContactFirstName" => "required",
            "editContactLastName" => "required",
            "editContactContactNumber" => "required",
            "editContactEmail"  => "required",
            "editContactOccupation"  => "required",
            "editContactCompany"  => "required",
            "editContactAddress"  => "required",
            "editContactStage"  => "required",
            
        );
        //to validate $request from form
        $this->validate($request, $rules);

        $user_id = Auth::user()->id;
        $users = User::all();
        $contact = Contact::find($id);
        $contact->first_name = $request->editContactFirstName;
        $contact->last_name = $request->editContactLastName;
        $contact->contact_number = $request->editContactContactNumber;
        $contact->email = $request->editContactEmail;
        $contact->occupation = $request->editContactOccupation;
        $contact->company = $request->editContactCompany;
        $contact->address = $request->editContactAddress;
        $contact->stage_id = $request->editContactStage;
        $contact->user_id = $user_id;
        $contact->save();

        Session::flash("successmessage", "Edited Profile successfully!");
        return redirect('/agent/contacts/viewprofile/'.$id);        
    }

    public function showAddAPropertyForm($id) {
        $user_id = Auth::user()->id; // get user id
        $contact = Contact::find($id); // get specific contact
        // $tasks = $contact->tasks()->get(); // get all tasks for contact
        // $properties = $contact->projects()->get(); 
        // $notes = $contact->notes()->get(); 
        $property_statuses = PropertyStatus::all(); // to get names of stages
        $projects = Project::all(); // to get names of stages
        
        if($user_id == $contact->user_id) {
            return view('agent.addaproperty', compact('contact', 'property_statuses', 'projects')); 
        } else {
            return redirect('/home');
        }       
    }

    public function saveNewProperty($id, Request $request) {
        $rules = array(
            "newPropertyProject" => "required",
            "newPropertyDescription" => "required",
            "newPropertyStatus" => "required",
            "newPropertyTotalContractPrice"  => "required"
        );
        //to validate $request from form
        $this->validate($request, $rules);

        $project_id = $request->newPropertyProject;
        // dd($project_id);
        $property_description = $request->newPropertyDescription;
        $property_status_id = $request->newPropertyStatus;
        $total_contract_price = $request->newPropertyTotalContractPrice;

        $estimated_commission = 0.04 * $total_contract_price;

        $contact = Contact::find($id);

        //Change contact_stage per property_status_id
        if ($property_status_id == 5) {
            $contact->stage_id = 4; //change the contact_stage to "lost" since a property acquisition is cancelled!
            $contact->save();
        } else {
            $contact->stage_id = 3; //change the contact_stage to "customer" since a property is reserved/purchased!
            $contact->save();
        }

        $projects = Project::all();

        foreach($projects as $project) {
             if($project->id == $project_id) {

            $contact->projects()->updateExistingPivot($project_id, ['property_description' => $property_description, 'property_status_id' => $property_status_id, 'total_contract_price' => $total_contract_price, 'estimated_commission' => $estimated_commission]);
            }
        }

        // $contact_projects = DB::table('contact_projects')->insert(
        //      ['contact_id' => $contact->id, 'project_id' => $project_id, 'property_description' => $property_description, 'property_status_id' => $property_status_id, 'total_contract_price' => $total_contract_price, 'estimated_commission' => $estimated_commission]
        // );
         

        Session::flash("successmessage", "New Property added successfully!");
        return redirect('/agent/contacts/viewprofile/'.$id);  
    }
}
