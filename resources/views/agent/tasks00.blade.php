@extends('layouts.app')

@section('pagetitle', 'Tasks')

@section('content')
	
	<div class="container-fluid">
		{{-- BREADCRUMB --}}
		<div class="row">
			<div class="col-lg-12 mt-4 px-4">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item active" aria-current="page">Tasks</li>
				  </ol>
				</nav>
			</div>
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
						<button class="btn btn-block btn-greencyan my-2"><i class="fas fa-plus"></i><i class="fas fa-user-alt"></i> ADD A TASK</button>					
					</div>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col p-5">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item">
				    <a class="nav-link active tab-purple" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Tasks</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link tab-purple" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed Tasks</a>
				  </li>				  
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active p-4" id="pending-tab" role="tabpanel" aria-labelledby="pending-tab">
				  	<ul>
				  		<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				  		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				  		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				  		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				  		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				  		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
				  	</ul>
				  </div>
				  <div class="tab-pane fade p-4" id="completed-tab" role="tabpanel" aria-labelledby="completed-tab">
				  	<ul>
				  		<li></li>
				  	</ul>
				  </div>
				</div>				  		
			</div>						
		</div>
	</div>
@endsection

<script type="text/javascript">
	$('#myTab a[href="#pending"]').tab('show');
	$('#myTab a[href="#completed"]').tab('show');
</script>