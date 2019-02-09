@extends('layouts.app')

@section('pagetitle', 'View Profile')

@section('content')
	
	<div class="container">
		
		
			<div class="card p-4">
				<div class="row">
					{{-- Basic Contact Info --}}
					<div class="col-lg-5 col-md-5 col-sm-12 p-3 h-100">
						<div class="card view-profile-card p-1">
							<div class="view-profile-avatar p-1 mx-auto">
								<img class="card-img-top p-3" src="/{{ $contact->image_path }}" alt="Image of {{ $contact->first_name}} {{ $contact->last_name}}">								
							</div>
						  	<div class="card-body mx-auto p-1">
						    	<h3 class="text-center">{{ $contact->first_name}} {{ $contact->last_name}}</h3>
						    	
						    	<p class="card-text my-0"><i class="fas fa-phone px-2"></i>{{ $contact->contact_number }}</p>
						    	<p class="card-text my-0"><i class="fas fa-envelope px-2"></i>{{ $contact->email }}</p>
						    	<p class="card-text my-0"><i class="fas fa-map-marker-alt px-2"></i>{{ $contact->address }}</p>
						    	<p class="card-text my-0"><i class="fas fa-briefcase px-2"></i>{{ $contact->occupation }} at {{ $contact->company }}</p>
						    	<div class="text-center">
							    	<a href="#" class="btn btn-primary my-2 px-3 text-center">Edit Profile</a>
						    	</div>
						  	</div>
						</div>				
					</div>
					{{-- end of Basic Contact Info --}}

					{{-- Tasks and Properties --}}
					<div class="col-lg-7 col-md-7 col-sm-12 p-3 h-100">
						<div class="row">
							<div class="col-12">
								{{-- TASKS cards --}}
								<div class="card p-2">							
									
									<div class="tabs w-80 p-1 my-2 mx-auto">
									    <input type="radio" name="tab" id="tab1" checked="checked">
									    <label for="tab1" class="">Tasks</label>
									    <input type="radio" name="tab" id="tab2">
									    <label for="tab2" class="">Properties</label>

									    <div class="tab-content-wrapper">
									    	{{-- Pending --}}
									     	<div id="tab-content-1" class="tab-content p-2 scroll">
									     		<h3>Pending Tasks</h3>
									        		<ul>
									        	  	@foreach($tasks as $task)
									        	  	@if($task->task_status_id == 1)	
									        	  	<li>{{ $task->name }} - {{ $task->deadline }}</li>
									        	    @endif				
									        	    @endforeach
									        		</ul>
									        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
									        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								        		 
									    		<h3>Completed Tasks</h3> 	
								        			<ul>
								        		  	@foreach($tasks as $task)
								        		  	@if($task->task_status_id == 2)	
								        		  	<li>{{ $task->name }} - {{ $task->deadline }}</li>
								        		    @endif				
								        		    @endforeach
								        			</ul>
								        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
									      	</div>
										    {{-- Completed --}}
										    <div id="tab-content-2" class="tab-content p-2 scroll h-100">
										    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										    </div>
									   	</div>
									</div>
								</div>
								{{-- end of TASKS card --}}

							</div>
						</div>

						<div class="row">
							<div class="col-12">
								
							</div>
						</div>
					</div>	
						
				</div>
				{{-- end of row --}}
			</div>
			{{-- end of card --}}
		
	</div>
@endsection