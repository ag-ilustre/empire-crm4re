@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')
	
	<div class="container">
		<div class="row m-2">
			{{-- SEARCH BAR HERE --}}
			<button class="btn btn-primary">Add a Contact</button>
		</div>
		<div class="row">
			<div class="col mx-auto">
			<table class="table table-hover m-2">
			    <thead class="thead-dark">
			        <tr>
			            <th>Contact</th>
			            <th>Stage</th>
			            <th>Last Activity</th>
			            <th>Units Purchased</th>
			            <th>Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($contacts as $contact)
			        <tr>	                
			            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
		            	@foreach($stages as $stage)
			                @if($contact->stage_id == $stage->id)
			                    <td>{{ $stage->name }}</td>
			                @endif
			            @endforeach
			            {{-- <td>{{ $stage->username }}</td> --}}
			            <td>"Last Activity Note"</td>            	
			            <td>"1 property"</td>            	
			            <td><span class="nav-item dropdown">
			            	  <a href=""><i class="fas fa-search mx-1"></i></a>
			            	  <a href=""><i class="fas fa-trash mx-1"></i></a>
			            	  <a class="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			            	    <i class="fas fa-ellipsis-h mx-1"></i>
			            	  </a>
			            	  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			            	    <a class="dropdown-item" href="#">View Contact's Profile</a>
			            	    <a class="dropdown-item" href="#">Delete Contact</a>
			            	    <a class="dropdown-item" href="#">Add a Note</a>
			            	    <a class="dropdown-item" href="#">Add a Task</a>
			            	  </div>
			            	</span>
			            </td>
			            {{-- dropdown menu for view, delete, add note, add task --}}
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
		</div>
	</div>
@endsection