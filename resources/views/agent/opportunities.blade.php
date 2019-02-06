@extends('layouts.app')

@section('pagetitle', 'Opportunities')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 my-4">
				<h4 class="current-page text-center"><span class="text-underline"><i class="far fa-handshake"></i> Opportunities</span></h4>
			</div>
		</div>			
	
		<div class="row m-2">			
			{{-- 1 - LEADS --}}
			<div class="col-lg-3 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseLeads">
				    Leads
				  </button>
				</div>
				<div class="collapse" id="collapseLeads">
				  <div class="card card-body mx-auto scroll">
				  	{{-- opportunities card --}}
				  	@foreach($contacts as $contact)
					  	@if($contact->user_id == $user->id AND $contact->stage_id == 1)					  	
					    <div class="card border-purple my-1 opportunities-card">
					      <div class="row">
					      	{{-- avatar --}}
					      	<div class="col-4 py-auto">
					      		<div class="card-body text-center">
						      		<img class="opportunities-avatar" src="../../public/{{ $contact->image_path }}" alt="{{ $contact->name }} avatar">
						      	</div>
					      	</div>
					      	{{-- name, occupation, company --}}
					      	<div class="col-8">
						      <div class="card-body py-auto">
						        <h5 class="card-title m-2 my-auto opportunities-card-name">{{ $contact->first_name }} {{ $contact->last_name }}</h5>		
						        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->occupation }}</p>			
						        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->company }}</p>		        
						      </div>				      		
					      	</div>
					      </div>  {{-- end of row --}}
					      {{-- contact_number, email, tasks --}}
					      <div class="row my-1">
					      	<div class="col-10 mx-auto m-2 opportunities-card-text">
					      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> {{ $contact->contact_number }}</p>
					      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
					      		<ul class="pl-2 my-2">
					      			<li>tasks go here!</li>
					      		</ul>				      					      		
					      	</div>
					      </div>  {{-- end of row --}}	
					    </div>
					    @endif				
				    @endforeach
				    {{-- end of opportunities card --}}
				  </div>
				</div>
			</div>
			{{-- 2 - PROSPECTS --}}
			<div class="col-lg-3 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseProspects" aria-expanded="true" aria-controls="collapseProspects">
				    Prospects
				  </button>
				</div>
				<div class="collapse" id="collapseProspects">
				  <div class="card card-body pl-2 m-0 scroll">
				  	  	{{-- opportunities card --}}
				  	  	@foreach($contacts as $contact)
				  		  	@if($contact->user_id == $user->id AND $contact->stage_id == 2)					  	
				  		    <div class="card border-purple my-1 opportunities-card">
				  		      <div class="row">
				  		      	{{-- avatar --}}
				  		      	<div class="col-4 py-auto">
				  		      		<div class="card-body text-center">
				  			      		<img class="opportunities-avatar" src="../../public/{{ $contact->image_path }}" alt="{{ $contact->name }} avatar">
				  			      	</div>
				  		      	</div>
				  		      	{{-- name, occupation, company --}}
				  		      	<div class="col-8">
				  			      <div class="card-body py-auto">
				  			        <h5 class="card-title m-2 my-auto opportunities-card-name">{{ $contact->first_name }} {{ $contact->last_name }}</h5>		
				  			        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->occupation }}</p>			
				  			        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->company }}</p>		        
				  			      </div>				      		
				  		      	</div>
				  		      </div>  {{-- end of row --}}
				  		      {{-- contact_number, email, tasks --}}
				  		      <div class="row my-1">
				  		      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				  		      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> {{ $contact->contact_number }}</p>
				  		      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
				  		      		<ul class="pl-2 my-2">
				  		      			<li>tasks go here!</li>
				  		      		</ul>				      					      		
				  		      	</div>
				  		      </div>  {{-- end of row --}}	
				  		    </div>
				  		    @endif				
				  	    @endforeach
				  	    {{-- end of opportunities card --}}
				  </div>
				</div>
			</div>
			{{-- 3 - CUSTOMERS --}}
			<div class="col-lg-3 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseCustomers" aria-expanded="true" aria-controls="collapseCustomers">
				    Customers
				  </button>
				</div>
				<div class="collapse" id="collapseCustomers">
				  	<div class="card card-body pl-2 m-0 scroll">	  					    
			  		  	{{-- opportunities card --}}
			  		  	@foreach($contacts as $contact)
			  			  	@if($contact->user_id == $user->id AND $contact->stage_id == 3)					  	
			  			    <div class="card border-purple my-1 opportunities-card">
			  			      <div class="row">
			  			      	{{-- avatar --}}
			  			      	<div class="col-4 py-auto">
			  			      		<div class="card-body text-center">
			  				      		<img class="opportunities-avatar" src="../../public/{{ $contact->image_path }}" alt="{{ $contact->name }} avatar">
			  				      	</div>
			  			      	</div>
			  			      	{{-- name, occupation, company --}}
			  			      	<div class="col-8">
			  				      <div class="card-body py-auto">
			  				        <h5 class="card-title m-2 my-auto opportunities-card-name">{{ $contact->first_name }} {{ $contact->last_name }}</h5>		
			  				        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->occupation }}</p>			
			  				        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->company }}</p>		        
			  				      </div>				      		
			  			      	</div>
			  			      </div>  {{-- end of row --}}
			  			      {{-- contact_number, email, tasks --}}
			  			      <div class="row my-1">
			  			      	<div class="col-10 mx-auto m-2 opportunities-card-text">
			  			      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> {{ $contact->contact_number }}</p>
			  			      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
			  			      		<ul class="pl-2 my-2">
			  			      			<li>tasks go here!</li>
			  			      		</ul>				      					      		
			  			      	</div>
			  			      </div>  {{-- end of row --}}	
			  			    </div>
			  			    @endif				
			  		    @endforeach
			  		    {{-- end of opportunities card --}}
				  	</div>
				</div>
			</div>
			{{-- 4 - LOST --}}
			<div class="col-lg-3 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLost" aria-expanded="true" aria-controls="collapseLost">
				    Lost
				  </button>
				</div>
				<div class="collapse" id="collapseLost">
				  	<div class="card card-body pl-2 m-0 scroll">				  	
				  	  	{{-- opportunities card --}}
				  	  	@foreach($contacts as $contact)
				  		  	@if($contact->user_id == $user->id AND $contact->stage_id == 4)					  	
				  		    <div class="card border-purple my-1 opportunities-card">
				  		      <div class="row">
				  		      	{{-- avatar --}}
				  		      	<div class="col-4 py-auto">
				  		      		<div class="card-body text-center">
				  			      		<img class="opportunities-avatar" src="../../public/{{ $contact->image_path }}" alt="{{ $contact->name }} avatar">
				  			      	</div>
				  		      	</div>
				  		      	{{-- name, occupation, company --}}
				  		      	<div class="col-8">
				  			      <div class="card-body py-auto">
				  			        <h5 class="card-title m-2 my-auto opportunities-card-name">{{ $contact->first_name }} {{ $contact->last_name }}</h5>		
				  			        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->occupation }}</p>			
				  			        <p class="card-title m-2 my-auto opportunities-card-text">{{ $contact->company }}</p>		        
				  			      </div>				      		
				  		      	</div>
				  		      </div>  {{-- end of row --}}
				  		      {{-- contact_number, email, tasks --}}
				  		      <div class="row my-1">
				  		      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				  		      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> {{ $contact->contact_number }}</p>
				  		      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
				  		      		<ul class="pl-2 my-2">
				  		      			<li>tasks go here!</li>
				  		      		</ul>				      					      		
				  		      	</div>
				  		      </div>  {{-- end of row --}}	
				  		    </div>
				  		    @endif				
				  	    @endforeach
				  	    {{-- end of opportunities card --}}
					</div>
				</div>
			</div>
			
		</div>

		
		
	</div>
@endsection