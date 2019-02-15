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

class AdminController extends Controller
{

// ADMIN - AGENTS
    public function showAgents(){
        $users = User::all(); 
    	$roles = Role::all();

     	return view('admin.agents', compact('users', 'roles')); 
    }

    public function searchAgentsPage(){ //NOT YET WORKING  

    }

    public function editAgentRole($id, Request $request){
        $agentroleedit = User::find($id);
        $agentroleedit->role_id = $request->editedRoleId;
    	$agentroleedit->save();
        
        $agent_first_name = $agentroleedit->first_name;        $agent_last_name = $agentroleedit->last_name;
        $agent_name = $agent_first_name." ".$agent_last_name;

        $role = Role::find($agentroleedit->role_id);
        $role_id = $role->id;
        $role_name = $role->name;
       
        // $response = array(
        //   'role_id' => 'role_id', 
        //   'role_name' => 'role_name'
        // );
        // Session::flash("successmessage", "Updated Role successfully!")
        return response()->json(['message' => 'Saved role successfully!', 'agent_name'=> $agent_name, 'role_id' => $role_id, 'role_name' => $role_name]);
        // return response()->json(['role_id' => 'role_id', 'role_name' => 'role_name']);
    	// return redirect('/admin/agents');

        // return view('nameview', compact('agenttroleedit'));
    }

    public function deleteAgent($id){
        $count = Contact::where(['user_id' => $id])->get()->count();

        if ($count == 0) {
        	$agentdelete = User::find($id);
        	$agentdelete->delete();
        	// return redirect('/admin/agents');
            return response()->json(['status' => 'deleted', 'message'=> 'Deleted Agent successfully!', 'agentdelete_id'=> $id]);
        } else {
            return response()->json(['message'=> 'Cannot delete! Agent has associated Contacts.']);
        }


    }

// ADMIN - CONTACTS
    public function showContacts(){
        $users = User::all();
        $contacts = Contact::all(); 
        $stages = Stage::all();
        return view('agent.contacts', compact('users', 'contacts', 'stages')); 
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

    public function showAddAContactForm() {
        $users = User::all();

        return view('agent.addacontact', compact('users'));
    }

    public function saveNewContact(Request $request) {
        $rules = array(
            "contactAgent" => "required",
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
        $contact->user_id = $request->contactAgent;
        $contact->save();

        Session::flash("successmessage", "New Contact added successfully!");
        return view('/admin/contacts');
    }

//ADMIN - VIEW PROFILE
    public function viewProfileContact($id) {
        $contact = Contact::find($id); // get specific contact
        $stages = Stage::all(); // to get names of stages
        $projects =Project::all();
        
        $property_statuses = PropertyStatus::all();
        $tasks = $contact->tasks()->get(); // get all tasks for this contact
        // $notes = $contact->notes()->get(); 
      
        $properties = $contact->projects()->get();
        // dd($projects);
        
        return view('agent.contactprofile', compact('contact', 'stages', 'projects', 'properties', 'property_statuses', 'tasks')); 
    }

    public function showEditContactForm($id) {
        $contact = Contact::find($id);
        $stages = Stage::all();
        return view('agent.editcontact', compact('contact', 'stages')); 
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
        $contact->save();

        Session::flash("successmessage", "Edited Profile successfully!");
        return redirect('/admin/contacts/viewprofile/'.$id);        
    }

    public function showAddAPropertyFormVP($id) {
        $contact = Contact::find($id); // get specific contact
        $property_statuses = PropertyStatus::all(); // to get names of stages
        
        $collection = collect(Project::all()); // to get names of stages
        $projects = $collection->sortBy('name');

        return view('agent.addaproperty', compact('contact', 'property_statuses', 'projects')); 
       
    }

    public function saveNewPropertyVP($id, Request $request) {
        $rules = array(
            "newPropertyProject" => "required|numeric",
            "newPropertyDescription" => "required",
            "newPropertyStatus" => "required",
            "newPropertyTotalContractPrice"  => "required"
        );
        //to validate $request from form
        $this->validate($request, $rules);

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

        // $projects = Project::all();
        
        $project_id = $request->newPropertyProject;
        // dd($project_id); 
        
        $contact->projects()->attach($project_id, ['contact_id' => $contact->id, 'property_description' => $property_description, 'property_status_id' => $property_status_id, 'total_contract_price' => $total_contract_price, 'estimated_commission' => $estimated_commission]);

        Session::flash("successmessage", "New Property added successfully!");
        return redirect('/admin/contacts/viewprofile/'.$id);  
    }

    public function showAddATaskFormVP($id) { //from view profile page
        $contact = Contact::find($id);
        return view('agent.viewprofile_addatask', compact('contact'));
    }

    public function saveNewTaskVP($id, Request $request) {
        $rules = array(
            "newTaskNameVP" => "required",
            "newTaskDeadlineVP" => "required",            
        );
        //to validate $request from form
        $this->validate($request, $rules);

        $task = new Task;
        $task->name = $request->newTaskNameVP;
        $task->deadline = $request->newTaskDeadlineVP;
        $task->task_status_id = 1;
        $task->contact_id = $id;
        $task->save();
        // dd($task);
        Session::flash("successmessage", "New Task added successfully!");
        return redirect('/admin/contacts/viewprofile/'.$id);
    }

    public function deleteTask($id) {
        $task = Task::find($id); 
        $task->delete();

        return response()->json(['status' => 'deleted', 'message'=> 'Deleted Task successfully!', 'taskdelete_id'=> $id]);
    }

    public function showPendingTasks() {
        $contacts = Contact::all();
        // dd($contacts);
        $stages = Stage::all();
        $pendingtasks = Task::where('task_status_id', 1)->get();

        $collection = collect($pendingtasks);

        $tasks = $collection->sortBy('deadline');
        // dd($tasks);

        return view('agent.pendingtasks', compact('contacts', 'stages', 'tasks'));

    }
    
    public function showAddATaskForm() {
        $collection = collect(Contact::all());
        $contacts = $collection->sortBy('first_name');
        return view('agent.addatask', compact('contacts'));
    }

    public function saveAddedTask(Request $request) {
        $rules = array(
            "newTaskContactId" => "required|numeric",
            "newTaskName" => "required",
            "newTaskDeadline" => "required",            
        );
        //to validate $request from form
        $this->validate($request, $rules);

        $task = new Task;
        $task->contact_id = $request->newTaskContactId;
        $task->name = $request->newTaskName;
        $task->deadline = $request->newTaskDeadline;
        $task->task_status_id = 1;
        $task->save();
        // dd($task);
        Session::flash("successmessage", "New Task added successfully!");
        return redirect('/admin/tasks/pending');
    }

    public function showCompletedTasks() {
        $collection = collect(Contact::all()); //edit to original $user_id
        $contacts = $collection->sortBy('first_name');
        // dd($contacts);
        $stages = Stage::all();
        $pendingtasks = Task::where('task_status_id', 2)->get();

        $collection = collect($pendingtasks);

        $tasks = $collection->sortBy('deadline');
        // dd($tasks);

        return view('agent.completedtasks', compact('contacts', 'stages', 'tasks'));
    }

    public function showUploadPhotoForm($id) {
         $contact = Contact::find($id);

         return view('agent.viewprofile_uploadphoto', compact('contact'));
    }

    public function saveUploadPhoto($id, Request $request) {
        $rules = array(
            "image_path"  => "required|image|mimes:jpeg, jpg, png, gif, svg|max:2048"
        );

        $this->validate($request, $rules);

        $contact = Contact::find($id);
        //uploading the image
        $image = $request->file('image_path'); //sample.jpg
        $image_name = time().".".$image->getClientOriginalExtension(); //151688578.jpg
                    //time() - includes date and time (up to seconds)
        $destination = "images/";
        $image->move($destination, $image_name);

        //saving the image path
        $contact->image_path  = $destination.$image_name;
        $contact->save(); 
        Session::flash("successmessage", "Image saved successfully!");
        return redirect('/admin/contacts/viewprofile/'.$id);
    }
}
