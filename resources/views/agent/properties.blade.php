@extends('layouts.app')

@section('pagetitle', 'Properties')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<h4 class="current-page"><i class="fas fa-users"></i> Tasks</h4>
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
						<button class="btn btn-block btn-greencyan my-2"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> ADD A PROPERTY</button>					
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col p-5">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Tasks</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed Tasks</a>
				  </li>				  
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pending-tab">...</div>
				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="completed-tab">...</div>
				</div>				  		
			</div>						
		</div>
	</div>
@endsection