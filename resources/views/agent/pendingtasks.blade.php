@extends('layouts.app')

@section('pagetitle', 'Pending Tasks') 

@section('content')

	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Pending Tasks</li>
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
					@if(Auth::user()->role_id === 1)
					<a class="btn btn-greencyan px-3" href="/admin/tasks/addatask" title="Add a Contact"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>		
					@else
					<a class="btn btn-greencyan px-3" href="/tasks/addatask" title="Add a Contact"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>		
					@endif
				</div>
				{{-- PENDING TASKS TABLE --}}
				<div class="table-responsive m-0 p-0">	
					<table class="table table-hover m-0 p-0">
					    <thead class="border-purple">
					        <tr class="my-3">	
					        	<th width="9%" class="p-3 text-center">#</th>
					        	<th width="17%" class="p-3">Deadline</th>
					        	<th width="17%" class="p-3">Task</th>
					        	<th width="15%" class="p-3">Contact</th>
					        	<th width="12%" class="p-3">Stage</th>
					        	<th width="30%" class="p-3 text-center">Actions</th>
					        </tr>
					    </thead>
				  		<tbody>	   
				  			<tbody>
				  			    @foreach($tasks as $task)
				  			    <tr id="taskRow{{ $task->id }}" class="mr-2 p-2">
				  			    	{{-- # --}}
				  			    	<td class="px-3 text-center">{{ $loop->iteration }}</td>
									{{-- deadline --}}
				  			        <td class="px-3">{{ $task->deadline }}</td>
				  			        {{-- task --}}
				  			        <td class="px-3">{{ $task->name }}</td>
				  			        
				  			        {{-- contact --}}
				  			        @foreach($contacts as $contact)
				  			        @if($contact->id == $task->contact_id)
					  			        <td class="px-3">
					  			        	@if(Auth::user()->role_id === 1)
					  			        	<input type="hidden" id="loggedtoPendingTasks" value="1">
					  			        	<a href="/admin/contacts/viewprofile/{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</a>
					  			        	@else
					  			        	<a href="/contacts/viewprofile/{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</a>
					  			        	@endif
					  			        </td>
	  			                    	@foreach($stages as $stage)
	  			        	                @if($stage->id == $contact->stage_id )
	  			        	        {{-- stage --}}
	  			        	                    <td class="px-3">{{ $stage->name }}</td>
	  			        	                @endif
	  			        	            @endforeach
					  			    @endif
					  			    @endforeach
					  			    {{-- actions --}}
				  			        <td class="px-2 text-center">
				  			        	{{-- MARK COMPLETED --}}
				  			        	<button class="btn btn-link btn-icon" onclick="openCompleteTaskModal({{ $task->id }})" data-toggle="modal" data-target="#completeTask" title="Complete Task"><i class="fas fa-check mx-1"></i></button>
				  			        	
				  			        	{{-- EDIT TASK --}}
				  			        	<a class="btn btn-link btn-icon" onclick="openEditTaskModal({{ $task->id }}, '{{ $task->name }}','{{ $contact->last_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#editTask" title="Edit Task"><i class="fas fa-calendar-alt mx-1"></i></a>
				  			        	
				  			        	{{-- DELETE TASK --}}
				  			        	@foreach($contacts as $contact)
				  			        	@if($contact->id == $task->contact_id)
				  			        	<button class="btn btn-link btn-icon" onclick="openDeleteTaskModal({{ $task->id }}, '{{ $task->name }}','{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#deleteTask" title="Delete Task"><i class="fas fa-trash mx-1"></i></button>
				  			        	@endif
					  			    	@endforeach
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
		var loggedtoPendingTasks = $('#loggedtoPendingTasks').val();

		if(loggedtoPendingTasks == 1) {
			var url = '/admin/contacts/deletetask/'+taskIdToDelete;
		}else {
			var url = '/contacts/deletetask/'+taskIdToDelete;
		}
		console.log(url);

		console.log(taskIdToDelete);
		$.ajax({
			url: url,
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