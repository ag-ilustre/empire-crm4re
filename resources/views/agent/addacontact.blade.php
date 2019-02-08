@extends('layouts.app')

@section('pagetitle', 'Add a Contact')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 my-4">
				<h4 class="current-page text-center"><span class="text-underline"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> Add a Contact</span></h4>
			</div>
		</div>
		<div class="row">	
			<form>			
	          	<div class="form-group">
	            	<label for="contactFirstName" class="col-form-label">First Name:</label>
		            <input type="text" class="form-control" name="contactFirstName" id="contactFirstName">
		        </div>
		        <div class="form-group">
	            	<label for="contactLastName" class="col-form-label">Last Name:</label>
		            <input type="text" class="form-control" name="contactLastName" id="contactLastName">
		        </div>
		        <div class="form-group">
	            	<label for="contactContactNumber" class="col-form-label">Contact Number:</label>
		            <input type="text" class="form-control" name="contactContactNumber" id="contactContactNumber">
		        </div>
		        <div class="form-group">
	            	<label for="contactEmail" class="col-form-label">Email:</label>
		            <input type="text" class="form-control" name="contactEmail" id="contactEmail">
		        </div>
		        <div class="form-group">
	            	<label for="contactOccupation" class="col-form-label">Occupation:</label>
		            <input type="text" class="form-control" name="contactOccupation" id="contactOccupation">
		        </div>
		        <div class="form-group">
	            	<label for="contactCompany" class="col-form-label">Company:</label>
		            <input type="text" class="form-control" name="contactCompany" id="contactCompany">
		        </div>
		        <div class="form-group">
	            	<label for="contactAddress" class="col-form-label">Address:</label>
		            <input type="text" class="form-control" name="contactAddress" id="contactAddress">
		        </div>
		        <div class="form-group">
		        	<label>Opportunity Stage:</label>    	    	        	
	    			<span class="p-1">
	    				<input type="radio" id="leadRadio" name="contactStage" value="1">
	    				<label for="leadRadio" checked> Lead </label>
	    			</span>
	    			<span class="p-1">
	    				<input type="radio" id="prospectRadio" name="contactStage" value="2">
	    				<label for="prospectRadio"> Prospect </label>
	    			</span>
	    			<span class="p-1">
	    				<input type="radio" id="customerRadio" name="contactStage" value="3">
	        		 	<label for="customerRadio"> Customer </label>
	    			</span>
	    			<span class="p-1">
	    				<input type="radio" id="lostRadio" name="contactStage" value="4">
	    				<label for="lostRadio"> Lost </label>
	    			</span>	    	        			
		        </div>    	    	        		        
	    	    <div>
	       			<button type="button" onclick="saveAddedContact()" class="btn btn-primary" data-dismiss="modal">SAVE</button>
	       			<button type="reset" class="btn btn-secondary" data-dismiss="modal">RESET</button>
	       			<button type="button" class="btn btn-dark" data-dismiss="modal">CANCEL</button>
		      	</div>
      		</form>
		</div>
	</div>

	

@endsection