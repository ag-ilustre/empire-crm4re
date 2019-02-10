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
    // agents page
    Route::get('/admin/agents', 'AdminController@showAgents');
    Route::get('/admin/menu/searchagentspage', 'AdminController@searchAgentsPage');
    Route::get('/admin/menu/addagent', 'AgentController@addAgent');
    Route::delete('/admin/agentdelete/{id}', 'AdminController@deleteAgent');
    Route::put('/admin/agentroleedit/{id}', 'AdminController@editAgentRole');	

    // contacts page
    Route::get('/admin/contacts', 'AdminController@showContacts');

});
// });

//agent
Route::middleware(['agent'])->group(function(){
	// contacts page
    Route::get('/agent/contacts', 'AgentController@showAgentContacts');
   	Route::get('/agent/contacts/addacontact', function () {
       	return view('agent.addacontact');
       	});
    Route::delete('/agent/contactdelete/{id}', 'AgentController@deleteContact');
    Route::get('/agent/contacts/viewprofile/{id}', 'AgentController@viewProfileContact');
    Route::post('/agent/contacts/addacontact', 'AgentController@saveNewContact');

    // opportunities page
	Route::get('/agent/opportunities', 'AgentController@showOpportunities');

    // tasks page
	Route::get('/agent/tasks', function () {
    	return view('agent.tasks');
    	});
});  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
