@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')
	
	<div class="container">
		<div class="row">
			{{-- SEARCH BAR HERE --}}
		</div>
		<div class="row">
			<table class="table table-hover m-2">
			    <thead class="thead-dark">
			        <tr>
			            <th>Agent</th>
			            <th>Contact</th>
			            <th>Stage</th>
			            {{-- <th>Last Activity</th> --}}
			            <th>Properties</th>
			            <th>Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($contacts as $contact)
			        <tr>
			            @foreach($users as $user)
			                @if($contact->user_id == $user->id)
			                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
			                @endif
			            @endforeach			            
			            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
			            @foreach($stages as $stage)
			                @if($contact->stage_id == $stage->id)
			                    <td>{{ $stage->name }}</td>
			                @endif
			            {{-- <td>{{ $stage->username }}</td> --}}
			            <td>
			            	<button type="button" class="btn btn-primary" onclick="openEditModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')">Edit Role</button>
			            	<button type="button" class="btn btn-danger" onclick="openDeleteModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}', '{{ $role->name }}')" data-toggle="modal">Delete</button>
			            </td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
	</div>

	{{-- Delete modal form --}}
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="deleteModalLabel">Delete Agent</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="deleteAgent" action="" method="POST">
		      		{{ csrf_field() }}
		      		{{ method_field('DELETE') }}
		      		<!-- or: @method('DELETE') -->
			        <p id="agentDeleteMessage" class="text-center">Do you want to delete this agent?</p>
			        <div class="text-center">
			        	<button type="submit" class="btn btn-wide btn-danger m-1">Yes</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">No</button>
			        </div>
		      	</form>
		      </div>
		    </div>
		  </div>
		</div>

		{{-- Edit modal form --}}
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="editModalLabel">Edit Role</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
	       	    <p>Name: <span id="editAgentRole" name="editAgentRole"></span></p>
		       	<form id="editRoleForm" method="POST">
		       		{{ csrf_field() }}
		       		{{ method_field('PUT') }}
		       	  <div class="form-group">
		       	    <label>Role:</label>
		       	    <select type="number" name="editedRole">
		       	        @foreach($roles as $role)
		       	            @if($user->role_id == $role->id)
		       	                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
		       	            @else
		       	                <option value="{{ $role->id }}">{{ $role->name }}</option>
		       	            @endif
		       	        @endforeach
		       	    </select>
			        <button type="submit" class="btn btn-primary">Save</button>
		       	  </div>
		       	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

@endsection

<script type="text/javascript">
	function openDeleteModal(id, name) {
		$("#deleteAgent").attr("action","/agentdelete/"+id);
		$('#agentDeleteMessage').html('Do you want to delete <strong>'+name+'</strong>?');
		$("#deleteModal").modal("show");
	}

	function openEditModal(id, name, role) {
		$("#editRoleForm").attr("action","/agentroleedit/"+id);
		$("#editAgentRole").text(name);
		$("#editModal").modal("show");
	}
</script>