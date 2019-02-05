@extends('layouts.app')

@section('pagetitle', 'Agents')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<h4 class="current-page"><i class="fas fa-users"></i> Agents</h4>
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
						<button class="btn btn-block btn-greencyan my-2"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> ADD AGENT</button>					
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
				            <th class="p-4">Name</th>
				            <th class="p-4">Username</th>
				            <th class="p-4">Email</th>
				            <th class="p-4">Role</th>
				            <th class="p-4">Actions</th>
				        </tr>
				    </thead>
				    <tbody>
				        @foreach($users as $user)
				        <tr>
				            <td class="p-3">{{ $user->first_name }} {{ $user->last_name }}</td>
				            <td class="p-3">{{ $user->username }}</td>
				            <td class="p-3">{{ $user->email }}</td>
				            @foreach($roles as $role)
				                @if($user->role_id == $role->id)
				                    <td class="p-3">{{ $role->name }}</td>
				                    <input type="hidden" id="userRole" value="{{ $role->id }}">
				                @endif
				            @endforeach			            
				            <td class="p-3">			   
				            	<button type="button" class="btn btn-link btn-icon" onclick="openEditModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}', '{{ $user->role_id }}')"><i class="fas fa-user-edit"></i></button>
				            	<button type="button" class="btn btn-link btn-icon" onclick="openDeleteModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal"><i class="fas fa-trash"></i></button>
				            </td>
				        </tr>
				        @endforeach
				    </tbody>
				</table>
				</div>
			</div>			
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
		       	        <div>
		       	        	<input type="radio" id="adminRadio" name="editedRole" value="1">
		       	        	<label for="adminRadio"> admin</label>
		       	        	<input type="radio" id="agentRadio" name="editedRole" value="2">
		       	        	<label for="agentRadio"> agent</label>		       	        	
		       	        	<input type="radio" id="noneRadio" name="editedRole" value="3"> 
		       	        	<label for="noneRadio"> none</label>
		       	        </div>

		       	    
		       	    <div class="text-center mt-2">
				        <button type="submit" class="btn btn-wide btn-primary m-1">SAVE</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">CLOSE</button>
				    </div>
		       	  </div>
		       	</form>
		      </div>		      
		    </div>
		  </div>
		</div>

@endsection

<script type="text/javascript">
	function openEditModal(id, name, roleId) {
		$("#editRoleForm").attr("action","/admin/agentroleedit/"+id);
		$("#editAgentRole").text(name);
		$("#editModal").modal("show");

		// alert(roleId);
		// $("#adminRadio").prop("checked", false);
		// $("#agentRadio").prop("checked", false);
		// $("#noneRadio").prop("checked", false);

		if (roleId == 1) {
			$("#adminRadio").prop("checked", true);
			$("#agentRadio").prop("checked", false);
			$("#noneRadio").prop("checked", false);
		} else if (roleId == 2) {			
			$("#agentRadio").prop("checked", true);			
			$("#adminRadio").prop("checked", false);
			$("#noneRadio").prop("checked", false);
		} else {			
			$("#noneRadio").prop("checked", true);
			$("#agentRadio").prop("checked", false);
			$("#adminRadio").prop("checked", false);
		}
	}

	function openDeleteModal(id, name) {
		$("#deleteAgent").attr("action","/admin/agentdelete/"+id);
		$('#agentDeleteMessage').html('Do you want to delete <strong>'+name+'</strong>?');
		$("#deleteModal").modal("show");
	}

</script>