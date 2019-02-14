@extends('layouts.app')

@section('pagetitle', 'Agents')

@section('content')
	
	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Agents</li>
				  </ol>
				</nav>
			</div>
		</div>
		{{-- ERROR MESSAGE FROM AJAX --}}
		<div class="row justify-content-center errorBox">
			<div class="col-8 mx-auto p-2 w-100" id="errorBoxAgents">
				<span id="errorMessageAgents"></span>
			</div>
		</div>
		
		{{-- <div class="row">
			<div class="col-lg-8 col-md-8"></div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<input type="text" id="searchAgentPage" name="searchAgentPage" class="form-control p-1" onkeyup="searchAdminAgents()" placeholder="Search">
			</div>	
			<div class="col-lg-1 col-md-1"></div>
		</div> --}}
		<div class="row">	
			<div class="col-lg-12 px-4 py-2">
				<div class="card p-4">

					<div class="table-responsive table-hover m-0 p-0">	
						<table class="table table-hover m-0 p-0">
						    <thead class="border-purple">
						        <tr class="mr-2 p-3">
						            <th width="10%" class="p-3 text-center">#</th>
						            <th width="20%" class="p-3">Name</th>
						            <th width="15%" class="p-3">Username</th>
						            <th width="25%" class="p-3">Email</th>
						            <th width="15%" class="p-3">Role</th>
						            <th width="25%" class="p-3">Actions</th>
						        </tr>
						    </thead>
						    <tbody>
						        @foreach($users as $user)
						        <tr id="userRow{{ $user->id }}" class="mr-2 p-3">
						        	<td class="px-3 text-center">{{ $loop->iteration }}</td>
						            <td class="px-3">{{ $user->first_name }} {{ $user->last_name }}</td>
						            <td class="px-3">{{ $user->username }}</td>
						            <td class="px-3">{{ $user->email }}</td>
						            @foreach($roles as $role)
						                @if($user->role_id == $role->id)
						                    <td class="px-3" id="newAgentRole{{ $user->id }}">{{ $role->name }}</td>
						                    <input type="hidden" id="userRole{{ $role->id }}" value="{{ $role->id }}">
						                @endif
						            @endforeach			            
						            <td class="px-3">			   
						            	<button type="button" id="btnOpenEditModal{{ $user->id }}" class="btn btn-link btn-icon" data-toggle="modal" onclick="openEditModal('{{ $user->id }}', '{{ $user->first_name }} {{ $user->last_name }}', '{{ $user->role_id }}')"><i class="fas fa-user-edit"></i></button>
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
	</div>

	

	{{-- Delete modal form --}}
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="deleteModalLabel">Delete Agent</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	{{-- <form id="deleteAgent" action="" method="POST">
		      		{{ csrf_field() }}
		      		{{ method_field('DELETE') }} --}}
		      		
			        <p id="agentDeleteMessage" class="text-center">Do you want to delete this agent?</p>
			        <input type="hidden" id="agentIdToDelete" name="agentIdToDelete" value="">
			        <div class="text-center">
			        	<button type="button" id="yesDeleteAgent" onclick="deleteAgent()" class="btn btn-wide btn-danger m-1" data-dismiss="modal">Yes</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">No</button>
			        </div>
		      	{{-- </form> --}}
		      </div>
		    </div>
		  </div>
		</div>

		{{-- Edit modal form --}}
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="editModalLabel">Edit Role</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body mx-3 mb-2">
	       	    <label>Name: </label>
	       	    <input id="agentName" name="editAgentRole" value="" disabled>	       	    
		       	{{-- <form id="editRoleForm" method="POST">
		       		{{ csrf_field() }}
		       		{{ method_field('PUT') }} --}}
		       	  <div class="form-group">
		       	  	<input type="hidden" id="agentId" name="agentId" value="">
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
				        <button type="button" id="saveEditedRole" class="btn btn-wide btn-primary m-1" onclick="saveUpdatedRole()" data-dismiss="modal">SAVE</button>
				        <button type="button" class="btn btn-wide btn-secondary m-1" data-dismiss="modal">CLOSE</button>
				    </div>
		       	  </div>
		       	{{-- </form> --}}
		      </div>		      
		    </div>
		  </div>
		</div>
@endsection

@section('javascript')

<script>	

	function updateValuesInEditModal (id, agentName, roleId) {
		// console.log("updated "+id+" "+agentName+" "+roleId);
		$("#agentName").attr("value", agentName); 
		$("#agentId").attr("value", id); 

		// alert(roleId);
		// $("#adminRadio").prop("checked", false);
		// $("#agentRadio").prop("checked", false);
		// $("#noneRadio").prop("checked", false);

		if (roleId == 1) { //Line_46 button onclick
			$("#adminRadio").prop("checked", true);
			$("#agentRadio").prop("checked", false);
			$("#noneRadio").prop("checked", false);
			console.log("checked admin");
		} else if (roleId == 2) {			
			$("#agentRadio").prop("checked", true);			
			$("#adminRadio").prop("checked", false);
			$("#noneRadio").prop("checked", false);
			console.log("checked agent");
		} else {			
			$("#noneRadio").prop("checked", true);
			$("#agentRadio").prop("checked", false);
			$("#adminRadio").prop("checked", false);
			console.log("checked none");
		}		

	}

	function openEditModal(id, name, roleId) { 
		$("#editModal").modal("show"); 

		updateValuesInEditModal(id, name, roleId);		
	} 

	function saveUpdatedRole() { 
		var id = $('input[name="agentId"]').val(); 
		var editedRoleId = $('input[name="editedRole"]:checked').val(); 
		// console.log(editedRole);
		$.ajax({
			url: '/admin/agentroleedit/'+id,
			type: 'POST',
			dataType: 'JSON',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'_method':'PUT',
				'editedRoleId': editedRoleId,
			},
			success: function(data) {
				// console.log("data "+id + " " + data.agent_name + " " + data.role_id + " " +data.role_name);
				$('#newAgentRole'+id).html(data.role_name);	
				$("#userRoleId"+id).attr("value", data.role_id); 
				
				updateValuesInEditModal(id, data.agent_name, data.role_id);
			
				$('#btnOpenEditModal'+id).attr("onclick","openEditModal('"+id+"', '"+data.agent_name+"', '"+data.role_id+"')");

				$('#errorBoxAgents').fadeIn(1000); 
				$('#errorBoxAgents').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
				$('#errorBoxAgents').attr("class", "alert alert-success text-center");
				$('#errorMessageAgents').html(data.message);
				$('#errorBoxAgents').fadeOut(3000); 
			}
		});
	}

	function openDeleteModal(id, name) { 
		$("#deleteModal").modal("show"); 
		// $("#deleteAgent").attr("action","/admin/agentdelete/"+id); 
		$('#agentDeleteMessage').html('Do you want to delete <strong>'+name+'</strong>?'); 
		$('#agentIdToDelete').attr('value', id);
	}

	function deleteAgent() {
		var agentIdToDelete = $('#agentIdToDelete').val();
		// console.log(agentIdToDelete);
		$.ajax({
			url: '/admin/agentdelete/'+agentIdToDelete,
			type: 'POST',
			dataType: 'JSON',
			data: {
				'_token': $('meta[name="csrf-token"]').attr('content'),
				'_method':'DELETE',
			},
			success: function(data) {
				// console.log(data.agentdelete_id);
				if(data.status == 'deleted') {
					$('#userRow'+data.agentdelete_id).remove();
					// error message
					$('#errorBoxAgents').fadeIn(1000);
					$('#errorBoxAgents').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
					$('#errorBoxAgents').attr("class", "alert alert-success text-center");
					$('#errorMessageAgents').html(data.message);
					$('#errorBoxAgents').fadeOut(3000);

				} else {
					// error message
					$('#errorBoxAgents').fadeIn(1000);
					$('#errorBoxAgents').css({"position" : "fixed", "z-index": "1000", "top": "50%"});
					$('#errorBoxAgents').attr("class", "alert alert-danger text-center");
					$('#errorMessageAgents').html(data.message);
					$('#errorBoxAgents').fadeOut(3000);
				}
				
			}
		});
	}


</script>

@endsection