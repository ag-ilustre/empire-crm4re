@extends('layouts.app')

@section('pagetitle', 'Add a Property')

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
                    <li class="breadcrumb-item active" aria-current="page">Add a Property</li>
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
					<div class="card-header card-title">Add a Property for {{ $contact->first_name }} {{ $contact->last_name }}</div>

		            <div class="card-body">
		                <form id="formAddAProperty" action="" method="POST">
		                    @csrf
            	        	{{-- Project Name --}}
            	          	<div class="form-group row">
            	            	<label class="col-md-4 col-form-label text-md-right">Select a Project:</label>

            	            	<div class="col-md-6 my-auto pt-1">
        	    	          		<select class="custom-select" name="newPropertyProject" id="newPropertyProject" required>
        	    	          			<option selected>---</option>
        	    	          			@foreach($projects as $project)
        	    	          			<option value="{{ $project->id }}">{{ $project->name }}</option>
        		    	          		@endforeach
        	    	          		</select>
        		    	            {{-- <p id="newprojectErrorMessage"></p> --}}
            	            	</div>
        	    	        </div>
        	    	        {{-- Property Description --}}
        	    	        <div class="form-group row">
            	            	<label for="newPropertyDescription" class="col-md-4 col-form-label text-md-right">Property Description:</label>

            	            	<div class="col-md-6 my-auto pt-1">
        		    	            <textarea class="form-control" id="newPropertyDescription" name="newPropertyDescription" placeholder="Indicate the unit, floor, and tower number..." required autofocus></textarea>
        		    	            {{-- <p id="newPropertyDescriptionErrorMessage"></p> --}}
        		    	        </div>
            	          	</div>
            	          	{{-- Property Status ID --}}
                            <div class="form-group row">
                            	<label for="newPropertyStatus" class="col-md-4 col-form-label text-md-right">Property Status:</label>  

                                <div class="col-md-6 my-auto pt-1">
        	    	          		<select class="custom-select" name="newPropertyStatus" id="newPropertnewPropertyStatusyProject">
        	    	          			<option selected>---</option>
        	    	          			@foreach($property_statuses as $property_status)
        	    	          			<option value="{{ $property_status->id }}">{{ $property_status->name }}</option>
        		    	          		@endforeach
        	    	          		</select>
        		    	            {{-- <p id="newPropertyStatusErrorMessage"></p> --}}
                                </div>
                            </div>	
                            {{-- Total Contract Price --}}
                           <div class="form-group row">
                           	<label class="col-md-4 col-form-label text-md-right">Total Contract Price:</label>  

                               <div class="col-md-6 my-auto pt-1">
        	    	          		<input type="number" name="newPropertyTotalContractPrice" class="form-control" id="newPropertyTotalContractPrice" step="0.01" min=0>
        		    	            {{-- <p id="newPropertyPriceErrorMessage"></p> --}}
                               </div>
                           </div>	
					        
					      	<div class="form-group row mb-0">
					      	    <div class="col-md-6 offset-md-4">
    								<button type="submit" class="btn btn-primary px-3">Save</button>
    				       			<button type="reset" class="btn btn-secondary px-3">Reset</button>
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