@extends('layouts.app')

@section('pagetitle', 'Add a Task')

@section('content')

	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				  	<li class="breadcrumb-item"><a href="/contacts">Tasks</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Add a Task</li>
				  </ol>
				</nav>
			</div>
		</div>		
		
		<div class="row">
			<div class="col-lg-12 my-4">
				{{-- validation errors --}}
				@if ($errors->any())
				<div class="alert alert-danger">
				    <ul class="list-unstyled">
				        @foreach ($errors->all() as $error) {{-- will print the error/s if any--}}
				        <li>{{ $error }}</li>
				        @endforeach
				    </ul>
				</div>
				@endif
			</div>
		</div>	

		<div class="row justify-content-center">
		    <div class="col-md-8">
		        <div class="card">
					<div class="card-header card-title">Add a Task</div>

		            <div class="card-body">
		                <form id="formAddATask" action="" method="POST">
		                    @csrf

            	        	{{-- Contact Name --}}
            	          	<div class="form-group row">
            	            	<label class="col-md-4 col-form-label text-md-right">Contact Name:</label>

            	            	<div class="col-md-6 my-auto pt-1">
        	    	          		<select class="custom-select" name="newTaskContactId" id="newTaskContactId">
        	    	          			<option selected>---</option>
        	    	          			@foreach($contacts as $contact)
        	    	          			<option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
        		    	          		@endforeach
        	    	          		</select>
            	            	</div>
        	    	        </div>

        	    	        {{-- Task Name --}}
		                    <div class="form-group row">
		                        <label for="newTaskName" class="col-md-4 col-form-label text-md-right">Task Name:</label>

		                        <div class="col-md-6">
		                        	<textarea id="newTaskName" type="text" class="form-control" name="newTaskName" required></textarea>	                           
		                        </div>
		                    </div>

		                    {{-- Task Deadline --}}
		                    <div class="form-group row">
		                        <label for="newTaskDeadline" class="col-md-4 col-form-label text-md-right">Deadline:</label>

		                        <div class="col-md-6">
		                        	<input id="newTaskDeadline" type="datetime-local" class="form-control" name="newTaskDeadline" required>	                           
		                        </div>
		                    </div>	                    

					      	<div class="form-group row mb-0">
					      	    <div class="col-md-6 offset-md-4">
    								<button type="submit" class="btn btn-primary px-3">Save</button>
    				       			<button type="reset" class="btn btn-secondary px-3">Reset</button>
    				       			<a href="/contacts" class="btn btn-dark px-3">Cancel</a>
					      	    </div>
					      	</div>
			      		</form>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	

@endsection