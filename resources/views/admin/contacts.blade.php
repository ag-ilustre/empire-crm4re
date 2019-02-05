@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')
	
	<div class="container">
		<div class="row">
			<h4 class="current-page"><i class="far fa-address-card"></i> Contacts</h4>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6"></div>
			<div class="col-lg-3 col-md-3 my-2">
				<input type="" name="searchAgentPage" class="form-control" placeholder="Search">
			</div>
			<div class="col-lg-3 col-md-3">
				<button class="btn btn-block btn-greencyan my-2"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> ADD CONTACT</button>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 table-responsive">	
			<table class="table table-hover my-3 mx-auto table-purple">
			    <thead class="border-purple">
			        <tr class="my-3">
			            <th class="p-4">Agent</th>
			            <th class="p-4">Contact</th>
			            <th class="p-4">Stage</th>			            
			            <th class="p-4">Last Activity</th>
			            <th class="p-4">Properties</th>
			            <th class="p-4">Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($contacts as $contact)
			        <tr>
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
			            <td class="p-4"><span class="nav-item dropdown">
			            	  <button type="button" class="btn btn-link btn-icon" onclick="openEditModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')"><i class="fas fa-search mx-1"></i></i></button>
			            	  <button type="button" class="btn btn-link btn-icon" onclick="openDeleteModal({{ $user->id }}, '{{ $user->first_name }} {{ $user->last_name }}')" data-toggle="modal"><i class="fas fa-trash"></i></button>
			            	  <a class="btn-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			            	    <i class="fas fa-ellipsis-h mx-1"></i>
			            	  </a>
			            	  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			            	    <a class="dropdown-item btn-link" href="#"><i class="fas fa-search mx-1"></i> View Profile</a>
			            	    <a class="dropdown-item btn-link" href="#"><i class="fas fa-trash mx-1"></i> Delete Contact</a>
			            	    <a class="dropdown-item btn-link" href="#"><i class="far fa-sticky-note mx-1"></i> Add a Note</a>
			            	    <a class="dropdown-item btn-link" href="#"><i class="fas fa-calendar-alt mx-1"></i> Add a Task</a>
			            	  </div>
			            	</span>
			            </td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
		</div>
	</div>
@endsection