@extends('layouts.app')

@section('pagetitle', 'View Profile')

@section('content')
	
	<div class="container-fluid">
			{{-- BREADCRUMB --}}
			<div class="row">
				<div class="col-lg-12 mt-4 px-4">
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
				  		@if(Auth::user()->role_id === 1)
				  		<li class="breadcrumb-item"><a href="/admin/contacts">Contacts</a></li>
				  		@else
				  		<li class="breadcrumb-item"><a href="/contacts">Contacts</a></li>
					  	@endif
					    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
					  </ol>
					</nav>
				</div>
			</div>	
							
			<div class="row justify-content-center errorBox my-2">
				{{-- ERROR MESSAGE FROM AJAX --}}
				<div class="col-8 mx-auto p-2" id="errorBoxContactProfile">
					<span id="errorMessageContactProfile" class=".ajax-error-message"></span>
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
				<div class="col-lg-5 col-md-5 col-sm-12 h-100">
					<div class="card view-profile-card px-2 py-1">
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
					    		@if(Auth::user()->role_id === 1)
					    		<a href="/admin/contacts/viewprofile/editcontact/{{ $contact->id }}" class="btn btn-greencyan my-2 px-3 text-center">Edit Profile</a>
					    		@else
						    	<a href="/contacts/viewprofile/editcontact/{{ $contact->id }}" class="btn btn-greencyan my-2 px-3 text-center">Edit Profile</a>
						    	@endif
					    	</div>
					  	</div>
					</div>				
				</div>
				{{-- end of Basic Contact Info --}}

				{{-- Tasks and Properties --}}
				<div class="col-lg-7 col-md-7 col-sm-12 h-100">
					{{-- <div class="row"> --}}
						{{-- <div class="col-12"> --}}
							<div class="card px-2 py-1 w-100">
								
								<div class="tabs w-80 p-1 my-1">
								    <input type="radio" name="tab" id="tab1" checked="checked">
								    <label for="tab1" class="">TASKS</label>
								    <input type="radio" name="tab" id="tab2">
								    <label for="tab2" class="">PROPERTIES</label>

								    <div class="tab-content-wrapper w-100">
								    	{{-- Tasks --}}
								     	<div id="tab-content-1" class="tab-content p-2 scroll w-100">
								     		<div class="text-right">
								     			@if(Auth::user()->role_id === 1)
									     		<a href="/admin/contacts/viewprofile/addatask/{{ $contact->id }}" class="btn btn-link btn-icon no-underline my-2 px-3 text-center" title="Add a Task"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>
									     		@else
									     		<a href="/contacts/viewprofile/addatask/{{ $contact->id }}" class="btn btn-link btn-icon no-underline my-2 px-3 text-center" title="Add a Task"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>
									     		@endif
									     	</div>

							        		<ul>
							        	  	@foreach($tasks as $task)
							        	  	@if($task->task_status_id == 1)	
							        	  		<li><button class="btn btn-flat p-0 m-2" onclick="completeTask({{ $task->id }})"><i class="fas fa-check fa-lg"></i></button> <a href="#">{{ $task->name }} - {{ $task->deadline }}</a></li>
							        	    @endif				
							        	    @endforeach
							        		</ul>
								        		
							        		 
								    		{{-- <h3>Completed Tasks</h3> 	
							        			<ul>
							        		  	@foreach($tasks as $task)
							        		  	@if($task->task_status_id == 2)	
							        		  	<li>{{ $task->name }} | {{ $task->deadline }}</li>
							        		    @endif				
							        		    @endforeach
							        			</ul> --}}
							        			
								      </div>
								      {{-- end of Tasks --}}


									   {{-- Properties --}}
									   <div id="tab-content-2" class="tab-content p-2 scroll w-100">
									    	<div class="text-right">
									    		@if(Auth::user()->role_id === 1)
									    		<a href="/admin/contacts/viewprofile/addaproperty/{{ $contact->id}}" class="btn btn-link btn-icon my-2 px-3 text-center no-underline" title="Add a Property"><i class="far fa-building mx-1"></i> Add a Property</a>
										    	@else
										    	<a href="/contacts/viewprofile/addaproperty/{{ $contact->id}}" class="btn btn-link btn-icon my-2 px-3 text-center no-underline" title="Add a Property"><i class="far fa-building mx-1"></i> Add a Property</a>
										    	@endif
									    	</div>

								    		@foreach($properties as $property)
										   	<div class="card m-2 p-1">
												   	@foreach($projects as $project)
											   		@if($project->id == $property->pivot->project_id)
									    			<div>
									    				<h3 class="m-2">{{ $project->name }} </h3> 
									    				<div class="m-2 div-inline">
									    					{{-- property_id, contact_id, project_id, property desc --}}
									    					<button type="button" id="btnOpenEditPropertyModal" class="btn btn-link btn-icon px-3" data-toggle="modal" onclick="openEditModal({{ $property->id}})"><i class="fas fa-user-edit"></i></button>
									    					<button type="button" class="btn btn-link btn-icon px-3" onclick="openDeletePropertyModal({{ $property->id}})" data-toggle="modal" data-target="#deletePropertyModal"><i class="fas fa-trash"></i></button>
									    				</div>
									    			</div>
								    				@endif
								    				@endforeach
								    			
								    			<table class="m-2 p-3 table-striped">
								    			  <tr>
								    			    <th class="px-2" width="50%">Property Description:</th>
								    			    <td class="px-2" width="30%">{{ $property->pivot->property_description }}</td>
								    			  </tr>
								    			  <tr>
								    			    <th class="px-2" width="60%">Property Status:</th>
								    			    @foreach($property_statuses as $property_status)
								    				@if($property->pivot->property_status_id == $property_status->id)
								    				<td class="px-2" width="40%">{{ $property_status->name }}</td>
								    				@endif
								    				@endforeach
								    			  </tr>
								    			  <tr>
								    			    <th class="px-2" width="60%">Total Contract Price:</th>
								    			    <td class="px-2" width="40%">Php {{ number_format($property->pivot->total_contract_price, 2) }}</td>
								    			  </tr>
								    			  <tr>
								    			  	<th class="px-2" width="60%">Estimated Commission:</th>
								    			  	<td class="px-2" width="40%">Php {{ number_format($property->pivot->estimated_commission, 2) }}</td>
								    			  </tr>
								    			</table>							    				
										   	</div>
							    			@endforeach											   		

									    	
									    </div>
									    {{-- end of Properties --}}
								   	</div>
								   	{{-- end of tab-content-wrapper --}}
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

	<!-- DELETE A PROPERTY -->
		<div class="modal fade" id="deletePropertyModal" tabindex="-1" role="dialog" aria-labelledby="deletePropertyModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="deletePropertyModalModalLabel">Delete Contact</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
		    		<p id="propertyDeleteMessage" class="text-center">Do you want to delete this property?</p>
			        <input type="hidden" id="propertyIdToDelete" name="propertyIdToDelete" value="">
			        <div class="text-center">
			        	<button type="button" id="yesDeleteProperty" onclick="deleteProperty()" class="btn btn-wide btn-danger m-1" data-dismiss="modal">Yes</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">No</button>
			        </div>
	    	    </div>
		    </div>
		  </div>
		</div>
	

@endsection

@section('javascript')

<script>
	
	// for session successmessage
	function closeErrorBox() {
		$('.errorBox').fadeOut(3000);
	}

	function openDeletePropertyModal(id) {

	}

	function deleteProperty() {
		
	}

</script>

@endsection
