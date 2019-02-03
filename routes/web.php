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
Route::middleware("auth")->group(function() {
	//admin
	Route::get('/admin/agents', 'AdminController@showAgents');
	Route::delete('/admin/agentdelete/{id}', 'AdminController@deleteAgent');
	Route::put('/admin/agentroleedit/{id}', 'AdminController@editAgentRole');	
	Route::get('/admin/contacts', 'AdminController@showContacts');

	//agent
	Route::get('/agent/contacts', 'AgentController@showAgentContacts');
});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
