@extends('layouts.app')

@section('pagetitle', 'Opportunities')

@section('content')
	
	<div class="container">
		<div class="row">
			<h4 class="current-page"><i class="far fa-handshake"></i> Opportunities</h4>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row mt-4">
			<div class="col-lg-1 m-0 p-0"></div>
			{{-- 1 - LEADS --}}
			<div class="col-lg-2 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseLeads">
				    Leads
				  </button>
				</div>
				<div class="collapse" id="collapseLeads">
				  <div class="card card-body pl-2 m-0 scroll">

				  	{{-- opportunities card --}}
				    <div class="card border-purple my-1 opportunities-card">
				      <div class="row">
				      	<div class="col-2 m-0 text-center">
				      		<img class="rounded-circle opportunities-avatar m-2" src="{{ asset('/images/avatar.png') }}" alt="CN">
				      	</div>
				      	<div class="col-10">
					      <div class="card-body text-primary py-auto">
					        <p class="card-title m-2 my-auto opportunities-card-name">April Austin</p>					        
					      </div>				      		
				      	</div>
				      </div>  {{-- end of row --}}	
				      <div class="row my-1">
				      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> 09171234567</p>
				      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> april.austin@mail.com</p>
				      		<ul class="pl-2 my-2">
				      			<li>tasks go here!</li>
				      		</ul>
				      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      		consequat. </p>			      		
				      	</div>
				      </div>  {{-- end of row --}}	
				    </div>
				    {{-- end of opportunities card --}}					    

				  </div>
				</div>
			</div>
			{{-- 2 - PROSPECTS --}}
			<div class="col-lg-2 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseLeads">
				    Leads
				  </button>
				</div>
				<div class="collapse" id="collapseLeads">
				  <div class="card card-body pl-2 m-0 scroll">

				  	{{-- opportunities card --}}
				    <div class="card border-purple my-1 opportunities-card">
				      <div class="row">
				      	<div class="col-2 m-0 text-center">
				      		<img class="rounded-circle opportunities-avatar m-2" src="{{ asset('/images/avatar.png') }}" alt="CN">
				      	</div>
				      	<div class="col-10">
					      <div class="card-body text-primary py-auto">
					        <p class="card-title m-2 my-auto opportunities-card-name">April Austin</p>					        
					      </div>				      		
				      	</div>
				      </div>  {{-- end of row --}}	
				      <div class="row my-1">
				      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> 09171234567</p>
				      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> april.austin@mail.com</p>
				      		<ul class="pl-2 my-2">
				      			<li>tasks go here!</li>
				      		</ul>
				      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      		consequat. </p>			      		
				      	</div>
				      </div>  {{-- end of row --}}	
				    </div>
				    {{-- end of opportunities card --}}					    

				  </div>
				</div>
			</div>
			{{-- 3 - ACTIVE --}}
			<div class="col-lg-2 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseLeads">
				    Leads
				  </button>
				</div>
				<div class="collapse" id="collapseLeads">
				  <div class="card card-body pl-2 m-0 scroll">

				  	{{-- opportunities card --}}
				    <div class="card border-purple my-1 opportunities-card">
				      <div class="row">
				      	<div class="col-2 m-0 text-center">
				      		<img class="rounded-circle opportunities-avatar m-2" src="{{ asset('/images/avatar.png') }}" alt="CN">
				      	</div>
				      	<div class="col-10">
					      <div class="card-body text-primary py-auto">
					        <p class="card-title m-2 my-auto opportunities-card-name">April Austin</p>					        
					      </div>				      		
				      	</div>
				      </div>  {{-- end of row --}}	
				      <div class="row my-1">
				      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> 09171234567</p>
				      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> april.austin@mail.com</p>
				      		<ul class="pl-2 my-2">
				      			<li>tasks go here!</li>
				      		</ul>
				      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      		consequat. </p>			      		
				      	</div>
				      </div>  {{-- end of row --}}	
				    </div>
				    {{-- end of opportunities card --}}					    

				  </div>
				</div>
			</div>
			{{-- 4 - CONDITIONAL --}}
			<div class="col-lg-2 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseLeads">
				    Leads
				  </button>
				</div>
				<div class="collapse" id="collapseLeads">
				  <div class="card card-body pl-2 m-0 scroll">

				  	{{-- opportunities card --}}
				    <div class="card border-purple my-1 opportunities-card">
				      <div class="row">
				      	<div class="col-2 m-0 text-center">
				      		<img class="rounded-circle opportunities-avatar m-2" src="{{ asset('/images/avatar.png') }}" alt="CN">
				      	</div>
				      	<div class="col-10">
					      <div class="card-body text-primary py-auto">
					        <p class="card-title m-2 my-auto opportunities-card-name">April Austin</p>					        
					      </div>				      		
				      	</div>
				      </div>  {{-- end of row --}}	
				      <div class="row my-1">
				      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> 09171234567</p>
				      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> april.austin@mail.com</p>
				      		<ul class="pl-2 my-2">
				      			<li>tasks go here!</li>
				      		</ul>
				      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      		consequat. </p>			      		
				      	</div>
				      </div>  {{-- end of row --}}	
				    </div>
				    {{-- end of opportunities card --}}					    

				  </div>
				</div>
			</div>
			{{-- 5 - CUSTOMERS --}}
			<div class="col-lg-2 m-0 px-1 py-2">
				<div class="text-center">
				  <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseLeads" aria-expanded="true" aria-controls="collapseLeads">
				    Leads
				  </button>
				</div>
				<div class="collapse" id="collapseLeads">
				  <div class="card card-body pl-2 m-0 scroll">

				  	{{-- opportunities card --}}
				    <div class="card border-purple my-1 opportunities-card">
				      <div class="row">
				      	<div class="col-2 m-0 text-center">
				      		<img class="rounded-circle opportunities-avatar m-2" src="{{ asset('/images/avatar.png') }}" alt="CN">
				      	</div>
				      	<div class="col-10">
					      <div class="card-body text-primary py-auto">
					        <p class="card-title m-2 my-auto opportunities-card-name">April Austin</p>					        
					      </div>				      		
				      	</div>
				      </div>  {{-- end of row --}}	
				      <div class="row my-1">
				      	<div class="col-10 mx-auto m-2 opportunities-card-text">
				      		<p class="card-text m-0 p-0"><i class="fas fa-phone"></i> 09171234567</p>
				      		<p class="card-text m-0 p-0"><i class="fas fa-envelope"></i> april.austin@mail.com</p>
				      		<ul class="pl-2 my-2">
				      			<li>tasks go here!</li>
				      		</ul>
				      		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				      		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				      		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				      		consequat. </p>			      		
				      	</div>
				      </div>  {{-- end of row --}}	
				    </div>
				    {{-- end of opportunities card --}}					    

				  </div>
				</div>
			</div>
			<div class="col-lg-1 m-0 p-0"></div>
		</div>

		
		
	</div>
@endsection