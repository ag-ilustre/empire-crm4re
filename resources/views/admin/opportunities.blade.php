opportunities.blade.php@extends('layouts.app')

@section('pagetitle', 'Contacts')

@section('content')
	
	<div class="container">
		<div class="row">
			{{-- SEARCH BAR HERE --}}
		</div>
		<div class="row">
			<div class="col mx-auto">
			<table class="table table-hover m-2">
			    <thead class="thead-dark">
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