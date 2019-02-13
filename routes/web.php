<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('auth.login');
});
 
//admin
// Route::group(['middleware' => 'admin'], function() {
Route::middleware(['admin'])->group(function(){
    //nav bar
    Route::get('/agents', 'AdminController@showAgents');
    Route::get('/contacts', 'AdminController@showContacts');

    // agents page
    Route::get('/admin/menu/searchagentspage', 'AdminController@searchAgentsPage');
    Route::get('/admin/menu/addagent', 'AgentController@addAgent');
    Route::delete('/admin/agentdelete/{id}', 'AdminController@deleteAgent');
    Route::put('/admin/agentroleedit/{id}', 'AdminController@editAgentRole');   

    // contacts page

});
// });

//agent
Route::middleware(['agent'])->group(function(){
    //nav bar
    Route::get('/contacts', 'AgentController@showAgentContacts');
	Route::get('/opportunities', 'AgentController@showOpportunities');
	Route::get('/tasks', function () {
    	return view('agent.tasks');
    	});
    
    // contacts page
    Route::get('/contacts/addacontact', function () {
        return view('agent.addacontact');
        });
    Route::post('/contacts/addacontact', 'AgentController@saveNewContact');
    
    Route::delete('/contacts/delete/{id}', 'AgentController@deleteContact');
    Route::post('/contacts/addatask/{id}', 'AgentController@saveNewTask');
    
    // view profile
    Route::get('/contacts/viewprofile/{id}', 'AgentController@viewProfileContact');
                // edit URI for uniformity
    Route::get('/contacts/editcontact/{id}', 'AgentController@showEditContactForm');
    Route::patch('/contacts/editcontact/{id}', 'AgentController@saveEditedContact');
    Route::get('/contacts/addaproperty/{id}', 'AgentController@showAddAPropertyForm');
    Route::post('/contacts/addaproperty/{id}', 'AgentController@saveNewProperty');

    Route::get('/contacts/viewprofile/addatask/{id}', 'AgentController@showAddATaskFormVP');
    Route::post('/contacts/viewprofile/addatask/{id}', 'AgentController@saveNewTaskVP');


    // opportunities page

    // tasks page
    Route::get('/tasks/pending', 'AgentController@showPendingTasks');
    Route::delete('/contacts/deletetask/{id}', 'AgentController@deleteTask');
    Route::get('/tasks/addatask', 'AgentController@showAddATaskForm');
    Route::post('/tasks/addatask', 'AgentController@saveAddedTask');
});  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
