@extends('layouts.app')

@section('pagetitle', 'Agents')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6"></div>
			<div class="col-lg-3 col-md-3 my-2">
				<input type="" name="searchAgentPage" class="form-control" placeholder="Search">
			</div>
			<div class="col-lg-3 col-md-3">
				<button class="btn btn-block btn-add my-2">ADD AGENT</button>
			</div>
		</div>
		<div class="row">
			<table class="table table-hover m-2">
			    <thead class="purple-border">
			        <tr>
			            <th>Name</th>
			            <th>Username</th>
			            <th>Email</th>
			            <th>Role</th>
			            <th>Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($users as $user)
			        <tr>
			            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
			            <td>{{ $user->username }}</td>
			            <td>{{ $user->email }}</td>
			            @foreach($roles as $role)
			                @if($user->role_id == $role->id)
			                    <td>{{ $role->name }}</td>
			                @endif
			            @endforeach			            
			            <td>			   
			            	<button type="button" class="btn btn-link" onclick="openEditModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')"><i class="fas fa-user-edit"></i></button>
			            	<button type="button" class="btn btn-link" onclick="openDeleteModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal"><i class="fas fa-trash"></i></button>
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
		      <div class="modal-body mx-3 mb-2">
	       	    <p>Name: <span id="editAgentRole" name="editAgentRole"></span></p>
		       	<form id="editRoleForm" method="POST">
		       		{{ csrf_field() }}
		       		{{ method_field('PUT') }}
		       	  <div class="form-group">
		       	    <label>Role:</label>
			       	    {{-- <div class="custom-control custom-radio">
			       	      <input type="radio" id="customRadio1" name="editedRole" value="2" class="custom-control-input">
			       	      <label class="custom-control-label" for="customRadio1" default>agent</label>
			       	    </div>
			       	    <div class="custom-control custom-radio">
			       	      <input type="radio" id="customRadio2" name="editedRole" value="3" class="custom-control-input">
			       	      <label class="custom-control-label" for="customRadio2">none</label>
			       	    </div> --}}
		       	    <select type="number" name="editedRole">
		       	        @foreach($roles as $role)
		       	            @if($user->role_id == $role->id)
		       	                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
		       	            @else
		       	                <option value="{{ $role->id }}">{{ $role->name }}</option>
		       	            @endif
		       	        @endforeach
		       	    </select>
		       	    <div class="text-center mt-2">
				        <button type="submit" class="btn btn-wide btn-primary m-1">Save</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">Close</button>
				    </div>
		       	  </div>
		       	</form>
		      </div>		      
		    </div>
		  </div>
		</div>

@endsection

<script type="text/javascript">
	function openDeleteModal(id, name) {
		$("#deleteAgent").attr("action","/admin/agentdelete/"+id);
		$('#agentDeleteMessage').html('Do you want to delete <strong>'+name+'</strong>?');
		$("#deleteModal").modal("show");
	}

	function openEditModal(id, name) {
		$("#editRoleForm").attr("action","/admin/agentroleedit/"+id);
		$("#editAgentRole").text(name);
		$("#editModal").modal("show");
	}
</script>