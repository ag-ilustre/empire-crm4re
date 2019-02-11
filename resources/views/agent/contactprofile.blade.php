@extends('layouts.app')

@section('pagetitle', 'View Profile')

@section('content')
	
	<div class="container">
			<div class="row">
				<div class="col-lg-12 my-4">
					<h4 class="current-page text-center"><span class="text-underline"><i class="fas fa-user-alt"></i> Contact Profile</span></h4>
				</div>
			</div>		
							
			<div class="row justify-content-center errorBox">
				{{-- ERROR MESSAGE FROM AJAX --}}
				<div class="col-8 mx-auto p-2" id="errorBoxContactProfile">
					<span id="errorMessageContactProfile" class=".ajax-error-messag"></span>
				</div>
				@if(Session::has("successmessage"))					
				<div class="col-8 mx-auto p-2">
					<div class="alert alert-success text-center">
						<span class=".ajax-error-messag">{{ Session::get('successmessage') }} </span>
					    <button class="btn btn-link" onclick="closeErrorBox()"><i class="fas fa-window-close"></i></button>
					</div>
				</div>
				@endif
			</div>
		
			{{-- <div class="px-1" id="profile-card"> --}}
				<div class="row" id="profile-card">
					{{-- Basic Contact Info --}}
					<div class="col-lg-5 col-md-5 col-sm-12 h-100 mb-1">
						<div class="card view-profile-card p-2">
							<div class="view-profile-avatar p-1 mx-auto">
								<img class="card-img-top p-3" src="/{{ $contact->image_path }}" alt="Image of {{ $contact->first_name}} {{ $contact->last_name}}">								
							</div>
						  	<div class="card-body mx-auto p-1">
						    	<h3 class="text-center mb-2">{{ $contact->first_name }} {{ $contact->last_name }}</h3>
				  			@foreach($stages as $stage)							
							@if($stage->id == $contact->stage_id)
								<p class="card-text my-1"><strong>Contact Stage: </strong><span class="capitalize-text">{{ $stage->name }}</span></p>
							@endif
							@endforeach
						    	<p class="card-text my-1"><strong>Basic Information:</strong></p>
						    	<p class="card-text my-0"><i class="fas fa-phone px-2"></i>{{ $contact->contact_number }}</p>
						    	<p class="card-text my-0"><i class="fas fa-envelope px-2"></i>{{ $contact->email }}</p>
						    	<p class="card-text my-0"><i class="fas fa-map-marker-alt px-2"></i>{{ $contact->address }}</p>
						    	<p class="card-text my-0"><i class="fas fa-briefcase px-2"></i>{{ $contact->occupation }} at {{ $contact->company }}</p>
						    	<div class="text-center p-2">
							    	<a href="/agent/contacts/editcontact/{{ $contact->id }}" class="btn btn-greencyan my-2 px-3 text-center">Edit Profile</a>
						    	</div>
						  	</div>
						</div>				
					</div>
					{{-- end of Basic Contact Info --}}

					{{-- Tasks and Properties --}}
					<div class="col-lg-7 col-md-7 col-sm-12 h-100">
						{{-- <div class="row"> --}}
							{{-- <div class="col-12"> --}}
								<div class="card p-2 w-100">
									
									<div class="tabs w-80 p-1 my-1">
									    <input type="radio" name="tab" id="tab1" checked="checked">
									    <label for="tab1" class="">TASKS</label>
									    <input type="radio" name="tab" id="tab2">
									    <label for="tab2" class="">PROPERTIES</label>

									    <div class="tab-content-wrapper w-100">
									    	{{-- Tasks --}}
									     	<div id="tab-content-1" class="tab-content p-2 scroll w-100">
									     		<div class="text-right">
										     		<a href="#" class="btn btn-greencyan my-2 px-3 text-center"onclick="openAddATaskModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#agentcontactsAddATask" title="Add a Task"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>
										     	</div>

								        		<ul>
								        	  	@foreach($tasks as $task)
								        	  	@if($task->task_status_id == 1)	
								        	  		<li><button class="btn btn-flat p-0 m-2" onclick="completeTask({{ $task->id }})"><i class="fas fa-check fa-lg"></i></button> <a href="#">{{ $task->name }} - {{ $task->deadline }}</a></li>
								        	    @endif				
								        	    @endforeach
								        		</ul>
									        		
								        		 
									    		<h3>Completed Tasks</h3> 	
								        			<ul>
								        		  	@foreach($tasks as $task)
								        		  	@if($task->task_status_id == 2)	
								        		  	<li>{{ $task->name }} | {{ $task->deadline }}</li>
								        		    @endif				
								        		    @endforeach
								        			</ul>
								        			
									      	</div>
										    {{-- Properties --}}
										    <div id="tab-content-2" class="tab-content p-2 scroll w-100">
										    	<div class="text-right">
											    	<a href="/agent/contacts/addaproperty/{{ $contact->id}}" class="btn btn-greencyan my-2 px-3 text-center" title="Add a Property"><i class="far fa-building mx-1"></i> Add a Property</a>
										    	</div>

											   	<div>
									    			@foreach($contact->projects as $contact_project)
									    			<ul>									    				
									    				@foreach($projects as $project)
									    				@if($contact_project->project_id == $project->id)
										    			<li>{{ $project->name }}</li>										   		
									    				@endif
									    				@endforeach
									    				
									    				<li>{{ $contact_project->pivot->property_description }}</li>
									    				
									    				@foreach($property_statuses as $property_status)
									    				@if($contact_project->pivot->property_status_id == $property_status->id)
									    				<li>{{ $property_status->name }}</li>
									    				@endif
									    				@endforeach

									    				<li>{{ number_format($contact_project->pivot->total_contract_price, 2) }}</li>
									    				<li>{{ number_format($contact_project->pivot->estimated_commission, 2) }}</li>
									    			</ul>								    				
									    			@endforeach											   		
											   	</div>

										    	
										    </div>
									   	</div>
									</div>
								</div>
								{{-- end of TASKS card --}}

							{{-- </div> --}}
						{{-- </div> --}}

						{{-- <div class="row">
							<div class="col-12">
								
							</div>
						</div> --}}
					</div>	
						
				</div>
				{{-- end of row --}}
			{{-- </div> --}}
			{{-- end of card --}}
		
	</div>

	

@endsection

@section('javascript')

<script>
	
	// for session successmessage
	function closeErrorBox() {
		$('.errorBox').fadeOut(3000);
	}

</script>

@endsection
