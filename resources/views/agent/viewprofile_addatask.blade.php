@extends('layouts.app')

@section('pagetitle', 'Add a Task')

@section('content')

	<div class="container-fluid">
        {{-- BREADCRUMB --}}
        <div class="row">
            <div class="col-lg-12 mt-4 px-4">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/contacts">Contacts</a></li>
                    <li class="breadcrumb-item "><a href="/contacts/viewprofile/{{ $contact->id }}">View Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add a Task</li>
                  </ol>
                </nav>
            </div>
        </div>  
		<div class="row">
			<div class="col-lg-12">
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
		    <div class="col-md-8 mt-4">
		        <div class="card">
					<div class="card-header card-title">Add a Task for {{ $contact->first_name }} {{ $contact->last_name }}</div>

		            <div class="card-body">
		                <form id="formAddAProperty" action="" method="POST">
		                    @csrf
            	        	 {{-- Task Name --}}
                            <div class="form-group row">
                                <label for="newTaskNameVP" class="col-md-4 col-form-label text-md-right">Task Name:</label>

                                <div class="col-md-6">
                                    <textarea id="newTaskNameVP" type="text" class="form-control" name="newTaskNameVP" required></textarea>                            
                                </div>
                            </div>

                            {{-- Task Deadline --}}
                            <div class="form-group row">
                                <label for="newTaskDeadlineVP" class="col-md-4 col-form-label text-md-right">Deadline:</label>

                                <div class="col-md-6">
                                    <input id="newTaskDeadlineVP" type="datetime-local" class="form-control" name="newTaskDeadlineVP" required>                            
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