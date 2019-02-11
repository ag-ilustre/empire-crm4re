@extends('layouts.app')
{{-- AGENT/CONTACTS --}}
@section('pagetitle', 'Contacts') 

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 my-4">
				<h4 class="current-page text-center"><span class="text-underline"><i class="fas fa-users"></i> Contacts</span></h4>
			</div>
		</div>		
						
		<div class="row justify-content-center errorBox">
			{{-- ERROR MESSAGE FROM AJAX --}}
			<div class="col-8 mx-auto p-2 w-100" id="errorBoxAgentContacts">
				<p id="errorMessageAgentContacts" class="ajax-error-message"></p>
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
		
		<div class="row mr-auto">
			<div class="col-lg-6 col-md-6 col-sm-6"></div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-5 my-auto div-inline">
						<input type="text" name="searchAgentPage" class="form-control" placeholder="Search">		
					</div>					
					<div class="col-5 my-auto div-inline">

						<a class="btn btn-greencyan my-2 px-3" href="/agent/contacts/addacontact" title="Add a Contact"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> Add a Contact</a>									

					</div>
				</div>
			</div>			
		</div>	
		<div class="row">						
			<div class="col-lg-12 table-responsive p-4">
				<div class="table-responsive px-5">				
					<table class="table table-hover my-3 table-purple">
					    <thead class="border-purple">
					        <tr class="my-3">	
					        	<th width="10%" class="p-3 text-center">#</th>
					        	<th width="18%" class="p-3">Contact</th>
					        	<th width="18%" class="p-3">Stage</th>
					        	<th width="18%" class="p-3">Added on</th>
					        	<th width="18%" class="p-3">Last Activity on</th>
					        	<th width="18%" class="p-3">Actions</th>
					        </tr>
					    </thead>
				  		<tbody>	   

				  			<tbody>
				  			    @foreach($contacts as $contact)
				  			    <tr id="contactRow{{ $contact->id }}" class="mr-2 p-3">
				  			    	<td class="px-3 text-center">{{ $loop->iteration }}</td>
				  			        <td class="px-3"><a href="/agent/contacts/viewprofile/{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</a></td>
  			                    	@foreach($stages as $stage)
  			        	                @if($contact->stage_id == $stage->id)
  			        	                    <td class="px-3">{{ $stage->name }}</td>
  			        	                @endif
  			        	            @endforeach

				  			        <td class="px-3">{{ $contact->created_at->diffForHumans() }}</td>
				  			        <td class="px-3">{{ $contact->updated_at->diffForHumans() }}</td>
				  			        <td class="px-3">
				  			        	{{-- VIEW PROFILE --}}
				  			        	<a class="btn btn-link btn-icon" href="/agent/contacts/viewprofile/{{ $contact->id }}" title="View Profile"><i class="fas fa-search mx-1"></i></a>
				  			        	{{-- DELETE CONTACT --}}
				  			        	<button class="btn btn-link btn-icon" onclick="openDeleteContactModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#agentcontactsDeleteContact" title="Delete Contact"><i class="fas fa-trash mx-1"></i></button>
				  			        	{{-- ADD A TASK --}}
				  			        	<a class="btn btn-link btn-icon" onclick="openAddATaskModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#agentcontactsAddATask" title="Add a Task"><i class="fas fa-calendar-alt mx-1"></i></a>

				  			        	{{-- for stretch goal features --}}
				  			        	{{-- <span class="nav-item dropdown">
				  			        	 	<button class="btn btn-link btn-icon" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h mx-1"></i>
						            		</button>
						            		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  			        	
						  			        	<a class="dropdown-item btn-link" onclick="openAddANoteModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target=".agentcontactsAddANote" title="Add a Note"><i class="far fa-sticky-note mx-1"></i> Add a Note</a>
						  			        	
						  			        	<a class="dropdown-item btn-link" onclick="openAddAPropertyModala({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target=".agentcontactsAddATask" title="Add a Task"><i class="far fa-building mx-1"></i> Add a Property</a>
						  			        </div>
						  			    </span> --}}
				  			        </td>		  			        
				  			    </tr>
				  			    @endforeach
				  			</tbody>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

		<!-- DELETE CONTACT -->
		<div class="modal fade" id="agentcontactsDeleteContact" tabindex="-1" role="dialog" aria-labelledby="agentcontactsDeleteContactModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsDeleteContactModalLabel">Delete Contact</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
		    		<p id="contactDeleteMessage" class="text-center">Do you want to delete this contact?</p>
			        <input type="hidden" id="contactIdToDelete" name="contactIdToDelete" value="">
			        <div class="text-center">
			        	<button type="button" id="yesDeleteContact" onclick="deleteContact()" class="btn btn-wide btn-danger m-1" data-dismiss="modal">Yes</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">No</button>
			        </div>
	    	    </div>
		    </div>
		  </div>
		</div>

		<!-- ADD A NOTE -->
		<div class="modal fade agentcontactsAddANote" tabindex="-1" role="dialog" aria-labelledby="agentcontactsAddANoteModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsAddANoteModalLabel">View Porfile</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
	    	        <form>
	    	          	<div class="form-group">
	    	            	<label for="recipient-name" class="col-form-label">Recipient:</label>
		    	            <input type="text" class="form-control" id="recipient-name">
		    	        </div>
		    	        <div class="form-group">
	    	            	<label for="message-text" class="col-form-label">Message:</label>
		    	            <textarea class="form-control" id="message-text"></textarea>
	    	          	</div>
	    	        </form>    	        
	    	    </div>
	    	    <div class="modal-footer">
	       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Send message</button>
		      	</div>
		    </div>
		  </div>
		</div>

		<!-- ADD A TASK -->
		<div class="modal fade" id="agentcontactsAddATask" tabindex="-1" role="dialog" aria-labelledby="agentcontactsAddATaskModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsAddATaskModalLabel">Add a Task</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
    	          	<div class="form-group my-0 py-0">
	    	            <input type="hidden" id="contactIdForNewTask" name="contactIdForNewTask" value="">
    	            	<h5 class="py-0 my-0 text-center" id="contactNameTask"></h5>
	    	        </div>
	    	        <form id="addTaskForm">
		    	        <div class="form-group">
	    	            	<label for="newTask" class="col-form-label">Task:</label>
		    	            <textarea class="form-control" id="newTask" name="newTask" required autofocus></textarea>
		    	            <p id="newTaskErrorMessage"></p>
	    	          	</div>
	    	          	<div class="form-group">
	    	            	<label for="taskDeadline" class="col-form-label">Set a Deadline:</label>
		    	            <input type="datetime-local" class="form-control" id="taskDeadline" name="taskDeadline" required>
		    	            <p id="taskDeadlineErrorMessage"></p>
		    	        </div>
	                <div class="text-center m-1 modal-footer">
	                	<button type="button" id="saveNewTask" onclick="saveNewTask()" class="btn btn-wide btn-primary m-1">SAVE</button>
	        	        <button type="reset" class="btn btn-wide btn-reset m-1">RESET</button>
	        	        <button type="button" class="btn btn-wide btn-dark m-1" data-dismiss="modal">CANCEL</button>
	                </div>
		    	    </form>
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


	function openDeleteContactModal(id, name) { 
		$('#contactDeleteMessage').html('Do you want to delete <strong>'+name+'</strong>?'); 
		$('#contactIdToDelete').attr('value', id);
	}
	
	function deleteContact() {
		var contactIdToDelete = $('#contactIdToDelete').val();
		console.log(contactIdToDelete);
		$.ajax({
			url: '/agent/contacts/delete/'+contactIdToDelete,
			type: 'POST',
			dataType: 'JSON',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'_method':'DELETE',
			},
			success: function(data) {
				console.log(data.count);
				if(data.status == 'deleted') {
					$('#contactRow'+data.contactdelete_id).remove();

					// error message
					$('#errorBoxAgentContacts').fadeIn(1000);
					$('#errorBoxAgentContacts').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
					$('#errorBoxAgentContacts').attr("class", "alert alert-success text-center");
					$('#errorMessageAgentContacts').html("<i class='fas fa-check fa-lg'></i> "+data.message);
					$('#errorBoxAgentContacts').fadeOut(3000);

				} else {
					// error message
					$('#errorBoxAgentContacts').fadeIn(1000);
					$('#errorBoxAgentContacts').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
					$('#errorBoxAgentContacts').attr("class", "alert alert-danger text-center");
					$('#errorMessageAgentContacts').html("<i class='fas fa-exclamation-triangle fa-lg'></i>  "+data.message);
					$('#errorBoxAgentContacts').fadeOut(3000);
				}
				
			}
		});
	}

	function openAddATaskModal(id, name) {
		$('#contactNameTask').html(name);
		$('#contactIdForNewTask').attr("value", id);

		//ensure button has no data-dimiss modal
		$("#saveNewTask").removeAttr("data-dismiss", "modal"); 
		//pass the id to the save button
		$("#saveNewTask").attr("id", "saveNewTask"+id); 

		$('#newTaskErrorMessage').html("");
		$('#taskDeadlineErrorMessage').html("");
		// $('#agentcontactsAddATask').on('hidden.bs.modal', function () {
		//     	$(this).find('form').trigger('reset');
		// 	});	

		//empty fields
		// $('#addTaskForm').reset();
		
	}

	function saveNewTask() {
		var contactIdForNewTask = $('#contactIdForNewTask').val();
		var newTask = $('#newTask').val();
		var taskDeadline = $('#taskDeadline').val();
		console.log(contactIdForNewTask+","+newTask+","+taskDeadline);

		$('#newTaskErrorMessage').html("");
		$('#taskDeadlineErrorMessage').html("");

		if (contactIdForNewTask != "" && newTask != "") {
			//hide modal if fields are not empty
			$("#saveNewTask"+contactIdForNewTask).attr("data-dismiss", "modal"); 
			
			$.ajax({
				url: '/agent/contacts/addatask/'+contactIdForNewTask,
				type: 'POST',
				dataType: 'JSON',
				data: {
					'_token': $('meta[name="csrf-token"]').attr('content'),
					'contactIdForNewTask': contactIdForNewTask,
					'newTask': newTask,
					'taskDeadline': taskDeadline
				},
				success: function(data) {
					console.log(data);
					if(data.status == 'saved') {
						
						// error message
						$('#errorBoxAgentContacts').fadeIn(1000);
						$('#errorBoxAgentContacts').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
						$('#errorBoxAgentContacts').attr("class", "alert alert-success text-center");
						$('#errorMessageAgentContacts').html("<i class='fas fa-check fa-lg'></i> "+data.message);
						$('#errorBoxAgentContacts').fadeOut(3000);

						$('#newTask').attr("value", "");
						$('#taskDeadline').attr("value", "");
						$('#agentcontactsAddATask').modal('hide');

					} 
					
				}

			});
				//return to old id
				$("#saveNewTask"+contactIdForNewTask).attr("id", "saveNewTask"); 

		} 

		if (newTask == "") {
			$('#newTaskErrorMessage').css("color", "red");
			$('#newTaskErrorMessage').html("Required field");

		}

		if (taskDeadline == "") {
			$('#taskDeadlineErrorMessage').css("color", "red");
			$('#taskDeadlineErrorMessage').html("Required field");
		}	

		
	}

	

</script>

@endsection