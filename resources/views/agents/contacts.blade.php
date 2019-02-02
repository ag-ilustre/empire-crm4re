@extends('template')
@section('pagetitle', 'Dashboard')

@section('body')
	
	<div class="container">
		<div class="row">
			<div class="col-3 card">
				<div class="card-body">
					<h3 class="card-title">Books</h3>
					<h4 class="card-text">200</h4>
				</div>
			</div>

			<div class="col-3 card">
				<div class="card-body">
					<h3 class="card-title">Reviews</h3>
					<h4 class="card-text">2,000</h4>
				</div>
			</div>

			<div class="col-3 card">
				<div class="card-body">
					<h3 class="card-title">Users</h3>
					<h4 class="card-text">300</h4>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-6">
				{{-- validation errors --}}
				@if($errors->any())
					<ul class="list-unstyled">
						@foreach($errors->all() as $error)
						<li>
							<div class="alert alert-danger">{{ $error }}</div>
						</li>
						@endforeach
					</ul>
				@endif
				<h2>Add Book</h2>
				<form method="POST" action="/addbook" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" id="title" class="form-control">
					</div>
					<div class="form-group">
						<label>Summary</label>
						<textarea name="summary" id="summary" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image_cover" class="form-control">
					</div>
					<div class="form-group">
						<label>Category</label>
						<select name="category">
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name }}</option>
							@endforeach
						</select>						
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection