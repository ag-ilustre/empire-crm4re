@extends('layouts.app')

@section('pagetitle', 'Add a Contact')

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
				    <li class="breadcrumb-item active" aria-current="page">Add a Contact</li>
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
					<div class="card-header card-title">Add a Contact</div>

		            <div class="card-body">
		                <form id="formAddAContact" action="" method="POST">
		                    @csrf

		                    @if(Auth::user()->role_id === 1)
            	        	{{-- Users --}}
            	          	<div class="form-group row">
            	            	<label class="col-md-4 col-form-label text-md-right">Select an Agent:</label>

            	            	<div class="col-md-6 my-auto pt-1">
        	    	          		<select class="custom-select" name="contactAgent" id="contactAgent">
        	    	          			<option selected>---</option>
        	    	          			@foreach($users as $user)
        	    	          			<option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
        		    	          		@endforeach
        	    	          		</select>
        		    	            {{-- <p id="newprojectErrorMessage"></p> --}}
            	            	</div>
        	    	        </div>
        	    	        @endif

		                    <div class="form-group row">
		                        <label for="contactFirstName" class="col-md-4 col-form-label text-md-right">First Name:</label>

		                        <div class="col-md-6">
		                        	<input id="contactFirstName" type="text" class="form-control" name="contactFirstName" required autofocus>	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="contactLastName" class="col-md-4 col-form-label text-md-right">Last Name:</label>

		                        <div class="col-md-6">
		                        	<input id="contactLastName" type="text" class="form-control" name="contactLastName" required>	                           
		                        </div>
		                    </div>	                    

		                    <div class="form-group row">
		                        <label for="contactContactNumber" class="col-md-4 col-form-label text-md-right">Contact Number:</label>

		                        <div class="col-md-6">
		                        	<input id="contactContactNumber" type="text" class="form-control" name="contactContactNumber" required>	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="contactEmail" class="col-md-4 col-form-label text-md-right">Contact Email:</label>

		                        <div class="col-md-6">
		                        	<input id="contactEmail" type="text" class="form-control" name="contactEmail" required>	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="contactOccupation" class="col-md-4 col-form-label text-md-right">Occupation:</label>

		                        <div class="col-md-6">
		                        	<input id="contactOccupation" type="text" class="form-control" name="contactOccupation" required>	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="contactCompany" class="col-md-4 col-form-label text-md-right">Company:</label>

		                        <div class="col-md-6">
		                        	<input id="contactCompany" type="text" class="form-control" name="contactCompany" required>	                           
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                        <label for="contactAddress" class="col-md-4 col-form-label text-md-right">Address:</label>

		                        <div class="col-md-6">
		                        	<textarea id="contactAddress" type="text" class="form-control" name="contactAddress" required></textarea>
		                        	{{-- <input id="contactAddress" type="text" class="form-control" name="contactAddress" required>	                            --}}
		                        </div>
		                    </div>

		                    <div class="form-group row">
		                    	<label class="col-md-4 col-form-label text-md-right">Opportunity Stage:</label>  

		                        <div class="col-md-6 my-auto pt-1">
                      				<span class="">
                      					<input type="radio" id="leadRadio" name="contactStage" value="1" checked>
                      					<label for="leadRadio" checked> Lead </label>
                      				</span>
                      				<span class="">
                      					<input type="radio" id="prospectRadio" name="contactStage" value="2">
                      					<label for="prospectRadio"> Prospect </label>
                      				</span>
                      				<span class="">
                      					<input type="radio" id="customerRadio" name="contactStage" value="3">
                      	    		 	<label for="customerRadio"> Customer </label>
                      				</span>
                      				<span class="">
                      					<input type="radio" id="lostRadio" name="contactStage" value="4">
                      					<label for="lostRadio"> Lost </label>
                      				</span>	    	
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