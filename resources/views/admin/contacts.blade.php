@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 my-4">
				<h3 class="current-page text-center"><span class="text-underline"><i class="fas fa-users"></i> Contacts</span></h3>
			</div>
		</div>		
		<div class="row mr-auto">
			<div class="col-lg-6 col-md-6 col-sm-6"></div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="row">
					<div class="col-6"></div>
					<div class="col-6 my-auto div-inline">
						<input type="text" name="searchAdminPage" class="form-control" placeholder="Search">		
					</div>					
				</div>
			</div>			
		</div>
		<div class="row">						
			<div class="col-lg-12 table-responsive p-4">
				<div class="table-responsive">				
				<table class="table table-hover my-3 table-purple">
				    <thead class="border-purple">
			        <tr class="my-3">
			            <th class="p-4">#</th>
			            <th class="p-4">Agent</th>
			            <th class="p-4">Contact</th>
			            <th class="p-4">Stage</th>			            
			            <th class="p-4">Last Activity</th>
			            <th class="p-4">Properties</th>
			            <th class="p-4 text-center">Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($contacts as $contact)
			        <tr>
		                <td class="p-4 text-center">{{ $loop->iteration }}</td>
			        	{{-- agent --}}
			            @foreach($users as $user)
			                @if($contact->user_id == $user->id)
			                    <td class="p-4">{{ $user->first_name }} {{ $user->last_name }}</td>
			                @endif
			            @endforeach
			            {{-- contact --}}
			            <td class="p-4"><a href="">{{ $contact->first_name }} {{ $contact->last_name }}</a></td>
			            {{-- stage --}}
		            	@foreach($stages as $stage)
			                @if($contact->stage_id == $stage->id)
			                    <td class="p-4">{{ $stage->name }}</td>
			                @endif
			            @endforeach
			            {{-- last activity --}}
			            <td class="p-4">insert last note date here</td>            	
			            {{-- properties --}}
			            <td class="p-4">insert number of properties here</td>            	
			            {{-- actions --}}
			            <td class="p-4">
			            	{{-- VIEW PROFILE --}}
			            	<button class="btn btn-link btn-icon" onclick="openViewProfileModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal" data-target=".admincontactsViewProfile" title="View Profile"><i class="fas fa-search mx-1"></i></button>
			            	{{-- DELETE CONTACT --}}
			            	<button class="btn btn-link btn-icon" onclick="openDeleteContactModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal" data-target=".admincontactsDeleteContact" title="Delete Contact"><i class="fas fa-trash mx-1"></i></button>
			            	{{-- ADD A NOTE --}}
			            	<button class="btn btn-link btn-icon" onclick="openAddANoteModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal" data-target=".admincontactsAddANote" title="Add a Note"><i class="far fa-sticky-note mx-1"></i></button>
			            	{{-- ADD A TASK --}}
			            	<button class="btn btn-link btn-icon" onclick="openAddATaskModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal" data-target=".admincontactsAddATask" title="Add a Task"><i class="fas fa-calendar-alt mx-1"></i></button>
			            </td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
			</div>
		</div>
	</div>

	
	<!-- VIEW PROFILE -->
	<div class="modal fade admincontactsViewProfile" tabindex="-1" role="dialog" aria-labelledby="admincontactsViewProfileModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg modal-dialog-centered">
	    <div class="modal-content">
	    	<div class="modal-header">
	    	    <h5 class="modal-title" id="admincontactsViewProfileModalLabel">View Porfile</h5>
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

	<!-- DELETE CONTACT -->
	<div class="modal fade admincontactsDeleteContact" tabindex="-1" role="dialog" aria-labelledby="admincontactsDeleteContactModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	    	<div class="modal-header">
	    	    <h5 class="modal-title" id="admincontactsDeleteContactModalLabel">View Porfile</h5>
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
	<div class="modal fade admincontactsAddANote" tabindex="-1" role="dialog" aria-labelledby="admincontactsAddANoteModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	    	<div class="modal-header">
	    	    <h5 class="modal-title" id="admincontactsAddANoteModalLabel">View Porfile</h5>
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
	<div class="modal fade admincontactsAddATask" tabindex="-1" role="dialog" aria-labelledby="admincontactsAddATaskModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	    	<div class="modal-header">
	    	    <h5 class="modal-title" id="admincontactsAddATaskModalLabel">View Porfile</h5>
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

<script>
	
	function AddAcontact() {
		$(".admincontactsAddAcontact").modal("show");
	}


</script>

@endsection