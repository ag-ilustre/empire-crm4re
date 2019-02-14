@extends('layouts.app')

@section('pagetitle', 'Properties') 

@section('content')

	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Properties</li>
				  </ol>
				</nav>
			</div>
		</div>		
						
		<div class="row justify-content-center errorBox">
			{{-- ERROR MESSAGE FROM AJAX --}}
			<div class="col-8 mx-auto p-2 w-100" id="errorBoxTasks">
				<p id="errorMessageTasks" class="ajax-error-message"></p>
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
		
		<div class="row">						
			<div class="col-lg-12 px-4 py-2">
				<div class="card p-4">
					
				<div class="text-right mb-3">
					<a class="btn btn-greencyan px-3" href="/properties/addaproperty" title="Add a Property"><i class="fas fa-calendar-alt mx-1"></i> Add a Property</a>		
				</div>
				{{-- PENDING TASKS TABLE --}}
				<div class="table-responsive m-0 p-0">	
					<table class="table table-hover m-0 p-0">
					    <thead class="border-purple">
					        <tr class="my-3">	
					        	<th width="5%" class="p-3 text-center">#</th>
					        	<th width="12%" class="p-3">Project</th>
					        	<th width="12%" class="p-3">Contact</th>
					        	<th width="12%" class="p-3">Property Description</th>
					        	<th width="12%" class="p-3">Property Status</th>
					        	<th width="12%" class="p-3">Total Contract Price</th>
					        	<th width="12%" class="p-3">Estimated Commission</th>
					        	<th width="23%" class="p-3 text-center">Actions</th>
					        </tr>
					    </thead>
				  		<tbody>	   
				  			<tbody>
				  			    @foreach($properties as $property)
				  			    <tr id="taskRow{{ $property->id }}" class="mr-2 p-2">
				  			    	{{-- # --}}
				  			    	<td class="px-3 text-center">{{ $loop->iteration }}</td>
									{{-- Project --}}
				  			    	@foreach($projects as $project)
									@if($property->pivot->project_id == $project->id)
				  			        <td class="px-3">{{ $project->name }}</td>
				  			        @endif
				  			        @endforeach
				  			        {{-- Contact --}}
				  			        @foreach($contacts as $contact)
				  			        @if($property->pivot->contact_id == $contact->id)
				  			        <td class="px-3">{{ $contact->first_name }} {{ $contact->last_name}}</td>
				  			        @endif
				  			        @endforeach
				  			        {{-- Property Description --}}
				  			        <td class="px-3">{{ $property->pivot->property_description }}</td>
				  			        {{-- Property Status --}}
				  			        @foreach($property_statuses as $property_status)
				  			        @if($property->pivot->property_status_id == $property_status->id)
					  			    <td class="px-3">{{ $property_status->name }}</td>
  			        	            @endif
  			        	            @endforeach
  			        	            {{-- Total Contract Price --}}
					  			    <td class="px-3">{{ $property->pivot->total_contract_price }}</td>
  			        	            {{-- Estimated Commission --}}
					  			    <td class="px-3">{{ $property->pivot->estimated_commission }}</td>

					  			    {{-- actions --}}
				  			        <td class="px-2 text-center">
				  			        	
				  			        	{{-- EDIT TASK --}}
				  			        	<a class="btn btn-link btn-icon" onclick="openEditTaskModal()" data-toggle="modal" data-target="#editTask" title="Edit Task"><i class="fas fa-calendar-alt mx-1"></i></a>
				  			        	
				  			        	{{-- DELETE TASK --}}
				  			        	<button class="btn btn-link btn-icon" onclick="openDeleteTaskModal()" data-toggle="modal" data-target="#deleteTask" title="Delete Task"><i class="fas fa-trash mx-1"></i></button>
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
	</div>

		<!-- DELETE TASK -->
		<div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="deleteTaskModalLabel">Delete Task</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
		    		<p id="deleteTaskMessage" class="text-center">Do you want to delete this task?</p>
			        <input type="hidden" id="taskIdToDelete" name="taskIdToDelete" value="">
			        <div class="text-center">
			        	<button type="button" id="yesDeleteTask" onclick="deleteTask()" class="btn btn-wide btn-danger m-1" data-dismiss="modal">Yes</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">No</button>
			        </div>
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

	function openDeleteTaskModal(taskId, taskName, contactName) {
		$('#deleteTaskMessage').html('Do you want to delete <strong>'+taskName+'</strong> for <strong>'+contactName+'</strong>?'); 
		$('#taskIdToDelete').attr('value', taskId);
	}

	function deleteTask() {
		var taskIdToDelete = $('#taskIdToDelete').val();
		console.log(taskIdToDelete);
		$.ajax({
			url: '/contacts/deletetask/'+taskIdToDelete,
			type: 'POST',
			dataType: 'JSON',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'_method':'DELETE',
			},
			success: function(data) {
				if(data.status == 'deleted') {
					$('#taskRow'+data.taskdelete_id).remove();

					// error message
					$('#errorBoxTasks').fadeIn(1000);
					$('#errorBoxTasks').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
					$('#errorBoxTasks').attr("class", "alert alert-success text-center");
					$('#errorMessageTasks').html("<i class='fas fa-check fa-lg'></i> "+data.message);
					$('#errorBoxTasks').fadeOut(3000);

				}
			}
		});
	}

	

</script>

@endsection