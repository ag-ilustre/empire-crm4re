@extends('layouts.app')

@section('pagetitle', 'Completed Tasks') 

@section('content')

	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Completed Tasks</li>
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
					
				{{-- <div class="text-right mb-3">
					<a class="btn btn-greencyan px-3" href="/tasks/addatask" title="Add a Contact"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>		
				</div> --}}
					{{-- COMPLETED TASKS TABLE --}}
					<div class="table-responsive m-0 p-0">	
						<table class="table table-hover m-0 p-0">
						    <thead class="border-purple">
						        <tr class="my-3">	
						        	<th width="9%" class="p-3 text-center">#</th>
						        	<th width="17%" class="p-3">Deadline</th>
						        	<th width="17%" class="p-3">Task</th>
						        	<th width="15%" class="p-3">Contact</th>
						        	<th width="12%" class="p-3">Stage</th>
						        	{{-- <th width="30%" class="p-3 text-center">Actions</th> --}}
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
						  			        <td class="px-3"><a href="/contacts/viewprofile/{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</a></td>
		  			                    	@foreach($stages as $stage)
		  			        	                @if($stage->id == $contact->stage_id )
		  			        	        {{-- stage --}}
		  			        	                    <td class="px-3">{{ $stage->name }}</td>
		  			        	                @endif
		  			        	            @endforeach
						  			    @endif
						  			    @endforeach
						  			    {{-- actions --}}
					  			        {{-- <td class="px-2 text-center">
					  			        	
					  			        	<button class="btn btn-link btn-icon" onclick="openCompleteTaskModal({{ $task->id }})" data-toggle="modal" data-target="#completeTask" title="Complete Task"><i class="fas fa-check mx-1"></i></button>
					  			        	
					  			        	
					  			        	<a class="btn btn-link btn-icon" onclick="openEditTaskModal({{ $task->id }}, '{{ $task->name }}','{{ $contact->last_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#editTask" title="Edit Task"><i class="fas fa-calendar-alt mx-1"></i></a>
					  			        	
					  			        	
					  			        	@foreach($contacts as $contact)
					  			        	@if($contact->id == $task->contact_id)
					  			        	<button class="btn btn-link btn-icon" onclick="openDeleteTaskModal({{ $task->id }}, '{{ $task->name }}','{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target="#deleteTask" title="Delete Task"><i class="fas fa-trash mx-1"></i></button>
					  			        	@endif
						  			    	@endforeach
					  			        </td> --}}		  			        
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

		
@endsection

@section('javascript')

<script>
	
		
</script>

@endsection