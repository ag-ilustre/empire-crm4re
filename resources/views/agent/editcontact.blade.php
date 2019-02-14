@extends('layouts.app')

@section('pagetitle', 'Edit Contact')

@section('content')

	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				  	@if(Auth::user()->role_id === 1)
				  	<li class="breadcrumb-item"><a href="/admin/contacts">Contacts</a></li>
				  	<li class="breadcrumb-item "><a href="/admin/contacts/viewprofile/{{ $contact->id }}">View Profile</a></li>
				  	@else
				  	<li class="breadcrumb-item"><a href="/contacts">Contacts</a></li>
				  	<li class="breadcrumb-item "><a href="/contacts/viewprofile/{{ $contact->id }}">View Profile</a></li>
				  	@endif
				    <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
				  </ol>
				</nav>
			</div>
		</div>	

		<div class="row">
			<div class="col-lg-12 my-2">
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
		    <div class="col-md-8 my-2">
		        <div class="card">
					<div class="card-header card-title">Edit Contact</div>

		            <div class="card-body">
		            	@if(Auth::user()->role_id === 1)
		                <form id="formEditContact" action="/admin/contacts/viewprofile/editcontact/{{ $contact->id }}" method="POST">
		                @else
		                <form id="formEditContact" action="/contacts/viewprofile/editcontact/{{ $contact->id }}" method="POST">
		                @endif
		                    @csrf
		                    {{ method_field('PATCH') }}

 
		                    <div class="form-group row">
		                        <label for="editContactFirstName" class="col-md-4 col-form-label text-md-right">First Name:</label>

		                        <div class="col-md-6">
		                        	<input id="editContactFirstName" type="text" class="form-control" name="editContactFirstName" required autofocus value="{{ $contact->first_name }}">	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="editContactLastName" class="col-md-4 col-form-label text-md-right">Last Name:</label>

		                        <div class="col-md-6">
		                        	<input id="editContactLastName" type="text" class="form-control" name="editContactLastName" required value="{{ $contact->last_name }}">	                           
		                        </div>
		                    </div>	                    

		                    <div class="form-group row">
		                        <label for="editContactContactNumber" class="col-md-4 col-form-label text-md-right">Contact Number:</label>

		                        <div class="col-md-6">
		                        	<input id="editContactContactNumber" type="text" class="form-control" name="editContactContactNumber" required value="{{ $contact->contact_number }}">	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="editContactEmail" class="col-md-4 col-form-label text-md-right">Contact Email:</label>

		                        <div class="col-md-6">
		                        	<input id="editContactEmail" type="text" class="form-control" name="editContactEmail" required value="{{ $contact->email }}">	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="editContactOccupation" class="col-md-4 col-form-label text-md-right">Occupation:</label>

		                        <div class="col-md-6">
		                        	<input id="editContactOccupation" type="text" class="form-control" name="editContactOccupation" required value="{{ $contact->occupation }}">	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="editContactCompany" class="col-md-4 col-form-label text-md-right">Company:</label>

		                        <div class="col-md-6">
		                        	<input id="editContactCompany" type="text" class="form-control" name="editContactCompany" required value="{{ $contact->company }}">	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="editContactAddress" class="col-md-4 col-form-label text-md-right">Address:</label>

		                        <div class="col-md-6">
		                        	<textarea id="editContactAddress" type="text" class="form-control" name="editContactAddress" required>{{ $contact->address }}</textarea>
		                        	{{-- <input id="contactAddress" type="text" class="form-control" name="contactAddress" required value="{{ $contact->address }}">	                            --}}
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                    	<label class="col-md-4 col-form-label text-md-right">Opportunity Stage:</label>  

		                        <div class="col-md-6 my-auto pt-1">
		                        	@foreach($stages as $stage)
		                        	    @if($contact->stage_id == $stage->id)
		                        	    	<span class="">
		                        	    		<input type="radio" id="{{ $stage->name }}Radio" name="editContactStage" value="{{ $stage->id }}" checked>
		                        	    		<label for="{{ $stage->name }}Radio" checked> {{ $stage->name }} </label>
		                        	    	</span>
		                        	    @else
		                        	    	<span class="">
		                        	    		<input type="radio" id="{{ $stage->name }}Radio" name="editContactStage" value="{{ $stage->id }}">
		                        	    		<label for="{{ $stage->name }}Radio" checked> {{ $stage->name }} </label>
		                        	    	</span>
		                        	    @endif
		                        	@endforeach
		                        </div>
		                    </div>		       
					        
					      	<div class="form-group row mb-0">
					      	    <div class="col-md-6 offset-md-4">
    								<button type="submit" class="btn btn-primary px-3">Save</button>
    				       			@if(Auth::user()->role_id === 1)
    				       			<a href="/admin/contacts/viewprofile/{{ $contact->id }}" class="btn btn-dark px-3">Cancel</a>
    				       			@else
    				       			<a href="/contacts/viewprofile/{{ $contact->id }}" class="btn btn-dark px-3">Cancel</a>
    				       			@endif
					      	    </div>
					      	</div>
			      		</form>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	

@endsection