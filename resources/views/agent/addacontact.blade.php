@extends('layouts.app')

@section('pagetitle', 'Add a Contact')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-12 my-4">
				<h4 class="current-page text-center"><span class="text-underline"><i class="fas fa-users"></i> Contacts</span></h4>
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
    								<button type="submit" class="btn btn-primary px-3">SAVE</button>
    				       			<button type="reset" class="btn btn-secondary px-3">RESET</button>
    				       			<a href="/agent/contacts" class="btn btn-dark px-3">CANCEL</a>
					      	    </div>
					      	</div>
			      		</form>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	

@endsection