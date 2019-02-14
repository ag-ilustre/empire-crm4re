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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/login', function () {
    return view('auth.login');
});
 
//admin

Route::middleware(['admin'])->group(function(){
    Route::get('/home', function () {
        return view('home');
    });
    // agents page
    Route::get('/admin/agents', 'AdminController@showAgents');
    // Route::get('/admin/menu/searchagentspage', 'AdminController@searchAgentsPage');
    Route::get('/admin/menu/addagent', 'AgentController@addAgent');
    Route::delete('/admin/agentdelete/{id}', 'AdminController@deleteAgent');
    Route::put('/admin/agentroleedit/{id}', 'AdminController@editAgentRole');   

    // contacts page
    Route::get('/admin/contacts', 'AdminController@showContacts');
    Route::get('/admin/contacts/viewprofile/{id}', 'AdminController@viewProfileContact');
    Route::delete('/admin/contacts/delete/{id}', 'AdminController@deleteContact');
    Route::post('/admin/contacts/addatask/{id}', 'AdminController@saveNewTask');
    Route::get('/admin/contacts/addacontact', 'AdminController@showAddAContactForm');
    Route::post('/admin/contacts/addacontact', 'AdminController@saveNewContact');

    // contacts - view profile page 
    Route::get('/admin/contacts/viewprofile/{id}', 'AdminController@viewProfileContact');
    // view profile - edit contact
    Route::get('/admin/contacts/viewprofile/editcontact/{id}', 'AdminController@showEditContactForm');
    Route::patch('/admin/contacts/viewprofile/editcontact/{id}', 'AdminController@saveEditedContact');
    // view profile - add a property
    Route::get('/admin/contacts/viewprofile/addaproperty/{id}', 'AdminController@showAddAPropertyForm');
    Route::post('/admin/contacts/viewprofile/addaproperty/{id}', 'AdminController@saveNewProperty');
    // view profile - add a task
    Route::get('/admin/contacts/viewprofile/addatask/{id}', 'AdminController@showAddATaskFormVP');
    Route::post('/admin/contacts/viewprofile/addatask/{id}', 'AdminController@saveNewTaskVP');

    // tasks page
    Route::get('/admin/tasks/pending', 'AdminController@showPendingTasks'); //ok
    Route::delete('/admin/contacts/deletetask/{id}', 'AdminController@deleteTask'); //ok
    Route::get('/admin/tasks/addatask', 'AdminController@showAddATaskForm');
    Route::post('/admin/tasks/addatask', 'AdminController@saveAddedTask');
    Route::get('/admin/tasks/completed', 'AdminController@showCompletedTasks');

});


//agent
Route::middleware(['agent'])->group(function(){
    Route::get('/home', function () {
        return view('home');
    });

    // contacts page
    Route::get('/contacts', 'AgentController@showAgentContacts');
    Route::get('/contacts/addacontact', function () {
        return view('agent.addacontact');
        });
    Route::post('/contacts/addacontact', 'AgentController@saveNewContact');
    
    Route::delete('/contacts/delete/{id}', 'AgentController@deleteContact');
    Route::post('/contacts/addatask/{id}', 'AgentController@saveNewTask');
    
    // view profile
    Route::get('/contacts/viewprofile/{id}', 'AgentController@viewProfileContact');
    // view profile - edit contact
    Route::get('/contacts/viewprofile/editcontact/{id}', 'AgentController@showEditContactForm');
    Route::patch('/contacts/viewprofile/editcontact/{id}', 'AgentController@saveEditedContact');
    // view profile - add a property
    Route::get('/contacts/viewprofile/addaproperty/{id}', 'AgentController@showAddAPropertyForm');
    Route::post('/contacts/viewprofile/addaproperty/{id}', 'AgentController@saveNewProperty');
    // view profile - add a task
    Route::get('/contacts/viewprofile/addatask/{id}', 'AgentController@showAddATaskFormVP');
    Route::post('/contacts/viewprofile/addatask/{id}', 'AgentController@saveNewTaskVP');


    // tasks page
    Route::get('/tasks/pending', 'AgentController@showPendingTasks');
    Route::delete('/contacts/deletetask/{id}', 'AgentController@deleteTask');
    Route::get('/tasks/addatask', 'AgentController@showAddATaskForm');
    Route::post('/tasks/addatask', 'AgentController@saveAddedTask');
    Route::get('/tasks/completed', 'AgentController@showCompletedTasks');

    // properties page
    Route::get('/properties', 'AgentController@showProperties');
    
});  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
