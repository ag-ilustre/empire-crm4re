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
						        	<th width="10%" class="p-3 text-center">#</th>
						        	<th width="20%" class="p-3">Deadline</th>
						        	<th width="35%" class="p-3">Task</th>
						        	<th width="20%" class="p-3">Contact</th>
						        	<th width="15%" class="p-3">Completed on</th>
						        </tr>
						    </thead>
					  		<tbody>	   
					  			@foreach($tasks as $task)
					  			    <tr id="ctaskRow{{ $task->id }}" class="mr-2 p-2">
					  			    	{{-- # --}}
					  			    	<td class="px-3 text-center">{{ $loop->iteration }}</td>
										{{-- deadline --}}
					  			        <td class="px-3">{{ $task->deadline }}</td>
					  			        {{-- task --}}
					  			        <td class="px-3">{{ $task->name }}</td>
					  			        
					  			        {{-- contact --}}
					  			        <td class="px-3">
					  			       	@foreach($contacts as $contact)
					  			        	@if($task->contact_id == $contact->id)
						  			        	@if(Auth::user()->role_id === 1)
						  			        	<a href="/admin/contacts/viewprofile/{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</a>
						  			        	@else
						  			        	<a href="/contacts/viewprofile/{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</a>
						  			        	@endif
						  			    	@endif
						  			   	@endforeach
				  			        	</td>
				  			        	<td class="px-3">{{ $task->updated_at }}</td>
					  			    </tr>
					  			@endforeach
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