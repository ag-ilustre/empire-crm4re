@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 my-4">
				<h4 class="current-page text-center"><span class="text-underline"><i class="fas fa-users"></i> Contacts</span></h4>
			</div>
		</div>		
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">				
				<div class="row justify-content-center errorBox">
					<div class="col-12">
						<span class="errorMessage"></span>
					</div>
					@if(Session::has("successmessage"))					
					<div class="row"> 
						<div class="col-12">
							<div class="alert alert-success text-center">
								{{ Success::get('successmessage') }} 
							    <button class="btn btn-link" onclick="closeErrorBox()"><i class="fas fa-window-close"></i></button>
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row mr-auto">
			<div class="col-lg-6 col-md-6 col-sm-6"></div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="row">
					<div class="col-2"></div>
					<div class="col-5 my-auto div-inline">
						<input type="text" name="searchAgentPage" class="form-control" placeholder="Search">		
					</div>					
					<div class="col-5 my-auto div-inline">

						<a class="btn btn-greencyan my-2 px-3" href="/agent/contacts/addacontact" title="Add a Contact"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> Add a Contact</a>									

					</div>
				</div>
			</div>			
		</div>	
		<div class="row">						
			<div class="col-lg-12 table-responsive p-4">
				<div class="table-responsive px-5">				
					<table class="table table-hover my-3 table-purple">
					    <thead class="border-purple">
					        <tr class="my-3">	
					        	<th width="10%" class="p-3 text-center">#</th>
					        	<th width="18%" class="p-3">Contact</th>
					        	<th width="18%" class="p-3">Stage</th>
					        	<th width="18%" class="p-3">Added on</th>
					        	<th width="18%" class="p-3">Last Activity on</th>
					        	<th width="18%" class="p-3">Actions</th>
					        </tr>
					    </thead>
				  		<tbody>	   

				  			<tbody>
				  			    @foreach($contacts as $contact)
				  			    <tr id="row{{ $contact->id }}" class="mr-2 p-3">
				  			    	<td class="px-3 text-center">{{ $loop->iteration }}</td>
				  			        <td class="px-3">{{ $contact->first_name }} {{ $contact->last_name }}</td>
  			                    	@foreach($stages as $stage)
  			        	                @if($contact->stage_id == $stage->id)
  			        	                    <td class="px-3">{{ $stage->name }}</td>
  			        	                @endif
  			        	            @endforeach

				  			        <td class="px-3">{{ $contact->created_at->diffForHumans() }}</td>
				  			        <td class="px-3">{{ $contact->updated_at->diffForHumans() }}</td>
				  			        <td class="px-3">
				  			        	{{-- VIEW PROFILE --}}
				  			        	<a class="btn btn-link btn-icon" href="/agent/contacts/viewprofile/{{ $contact->id }}" title="View Profile"><i class="fas fa-search mx-1"></i></a>
				  			        	{{-- DELETE CONTACT --}}
				  			        	<button class="btn btn-link btn-icon" onclick="openDeleteContactModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target=".agentcontactsDeleteContact" title="Delete Contact"><i class="fas fa-trash mx-1"></i></button>
				  			        	
				  			        	 <span class="nav-item dropdown">
				  			        	 	<button class="btn btn-link btn-icon" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h mx-1"></i>
						            		</button>
						            		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  			        	{{-- ADD A NOTE --}}
						  			        	<a class="dropdown-item btn-link" onclick="openAddANoteModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target=".agentcontactsAddANote" title="Add a Note"><i class="far fa-sticky-note mx-1"></i> Add a Note</a>
						  			        	{{-- ADD A TASK --}}
						  			        	<a class="dropdown-item btn-link" onclick="openAddATaskModal({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target=".agentcontactsAddATask" title="Add a Task"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>
						  			        	{{-- ADD A TASK --}}
						  			        	<a class="dropdown-item btn-link" onclick="openAddAPropertyModala({{ $contact->id }}, '{{ $contact->first_name }} {{ $contact->last_name }}')" data-toggle="modal" data-target=".agentcontactsAddATask" title="Add a Task"><i class="far fa-building mx-1"></i> Add a Property</a>
						  			        </div>
						  			    </span>
				  			        </td>		  			        
				  			    </tr>
				  			    @endforeach
				  			</tbody>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

		<!-- VIEW PROFILE -->
		<div class="modal fade agentcontactsViewProfile" tabindex="-1" role="dialog" aria-labelledby="agentcontactsViewProfileModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg modal-dialog-centered">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsViewProfileModalLabel">View Porfile</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
		    		<div class="form-group row">
		    		    <label for="contactFirstName" class="col-md-4 col-form-label text-md-right">First Name:</label>

		    		    <div class="col-md-6">
		    		    	<input id="contactFirstName" type="text" class="form-control" name="contactFirstName" required autofocus>	                           
		    		    </div>
		    		</div>

	    	        <form>
	    	          	<div class="form-group">
	    	            	<label for="recipient-name" class="col-form-label">Recipient:</label>
		    	            <input type="text" class="form-control" id="recipient-name">
		    	        </div>
		    	        <div class="form-group">
	    	            	<label for="message-text" class="col-form-label">Message:</label>
		    	            <textarea class="form-control" id="message-text"></textarea>
	    	          	</div>
	    	        </form>    	        
	    	    </div>
	    	    <div class="modal-footer">
	       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Send message</button>
		      	</div>
		    </div>
		  </div>
		</div>

		<!-- DELETE CONTACT -->
		<div class="modal fade agentcontactsDeleteContact" tabindex="-1" role="dialog" aria-labelledby="agentcontactsDeleteContactModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsDeleteContactModalLabel">View Porfile</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
	    	        <form>
	    	          	<div class="form-group">
	    	            	<label for="recipient-name" class="col-form-label">Recipient:</label>
		    	            <input type="text" class="form-control" id="recipient-name">
		    	        </div>
		    	        <div class="form-group">
	    	            	<label for="message-text" class="col-form-label">Message:</label>
		    	            <textarea class="form-control" id="message-text"></textarea>
	    	          	</div>
	    	        </form>    	        
	    	    </div>
	    	    <div class="modal-footer">
	       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Send message</button>
		      	</div>
		    </div>
		  </div>
		</div>

		<!-- ADD A NOTE -->
		<div class="modal fade agentcontactsAddANote" tabindex="-1" role="dialog" aria-labelledby="agentcontactsAddANoteModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsAddANoteModalLabel">View Porfile</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
	    	        <form>
	    	          	<div class="form-group">
	    	            	<label for="recipient-name" class="col-form-label">Recipient:</label>
		    	            <input type="text" class="form-control" id="recipient-name">
		    	        </div>
		    	        <div class="form-group">
	    	            	<label for="message-text" class="col-form-label">Message:</label>
		    	            <textarea class="form-control" id="message-text"></textarea>
	    	          	</div>
	    	        </form>    	        
	    	    </div>
	    	    <div class="modal-footer">
	       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Send message</button>
		      	</div>
		    </div>
		  </div>
		</div>

		<!-- ADD A TASK -->
		<div class="modal fade agentcontactsAddATask" tabindex="-1" role="dialog" aria-labelledby="agentcontactsAddATaskModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		    	<div class="modal-header">
		    	    <h5 class="modal-title" id="agentcontactsAddATaskModalLabel">View Porfile</h5>
		    	    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		    	    	<span aria-hidden="true">&times;</span>
		    		</button>
		    	</div>
		    	<div class="modal-body">
	    	        <form>
	    	          	<div class="form-group">
	    	            	<label for="recipient-name" class="col-form-label">Recipient:</label>
		    	            <input type="text" class="form-control" id="recipient-name">
		    	        </div>
		    	        <div class="form-group">
	    	            	<label for="message-text" class="col-form-label">Message:</label>
		    	            <textarea class="form-control" id="message-text"></textarea>
	    	          	</div>
	    	        </form>    	        
	    	    </div>
	    	    <div class="modal-footer">
	       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Send message</button>
		      	</div>
		    </div>
		  </div>
		</div>

<script type="text/javascript">
	
	// for session successmessage
	function closeErrorBox() {
		// $('.errorBox').fadeIn(3000);
		$('.errorBox').fadeOut(3000);
	}



	
</script>

@endsection