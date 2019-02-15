@extends('layouts.app')

@section('pagetitle', 'Upload Photo')

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
				    <li class="breadcrumb-item active" aria-current="page">Upload Photo</li>
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
					<div class="card-header card-title">Upload Photo for {{ $contact->first_name }} {{ $contact->last_name }}</div>

		            <div class="card-body">
		            	@if(Auth::user()->role_id === 1)
		                <form id="formEditContact" action="/admin/contacts/viewprofile/uploadphoto/{{ $contact->id }}" method="POST" enctype="multipart/form-data">
		                @else
		                <form id="formEditContact" action="/contacts/viewprofile/uploadphoto/{{ $contact->id }}" method="POST" enctype="multipart/form-data">
		                @endif
		                    @csrf
 
		                    <div class="form-group row">
		                        <label for="image_path" class="col-md-4 col-form-label text-md-right">Image:</label>

		                        <div class="col-md-6">
		                        	<input type="file" name="image_path" class="form-control" id="image_path">
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