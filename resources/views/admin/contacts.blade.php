@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')
	
	<div class="container">
		<div class="row">
			<h1 class="currentPage"><i class="fas fa-address-card"></i> Contacts</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-6"></div>
			<div class="col-lg-3 col-md-3 my-2">
				<input type="" name="searchAgentPage" class="form-control" placeholder="Search">
			</div>
			<div class="col-lg-3 col-md-3">
				<button class="btn btn-block btn-add my-2">ADD AGENT</button>
			</div>
		</div>
		<div class="row">
			<div class="col mx-auto">
			<table class="table table-hover my-3 table-purple">
			    <thead class="purple-border">
			        <tr>
			            <th>Agent</th>
			            <th>Contact</th>
			            <th>Stage</th>
			            {{-- <th>Last Activity</th> --}}
			            <th>Contact Number</th>
			            <th>Email</th>
			            <th>Occupation</th>
			            <th>Company</th>
			            <th>Address</th>
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
			            @endforeach
			            {{-- <td>{{ $stage->username }}</td> --}}
			            <td>{{ $contact->contact_number }}</td>            	
			            <td>{{ $contact->email }}</td>            	
			            <td>{{ $contact->occupation }}</td>            	
			            <td>{{ $contact->company }}</td>            	
			            <td>{{ $contact->address }}</td>            	
			            <td>Actions</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
		</div>
		</div>
	</div>
@endsection