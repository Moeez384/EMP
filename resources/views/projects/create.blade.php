@include('includes.header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
	<div class="col-lg-12">
		<div class="card">

			<div class="card-body">
				<h4 class="card-title">Please Enter here Project Details</h4>
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
				<form class="form pt-3" method="post" action="{{ route('project.store') }}">
					@csrf
					<div class="form-group col-lg-6">
						<label for='Username'>Name</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" type="text" name="name" placeholder="Name" :value="old('name')" required autofocus class="form-control" aria-describedby="basic-addon11" />
						</div>
						@error('name')
						<div class="alert alert-danger mt-1 mb-1">
							{{ $message}}
						</div>
						@enderror

					</div>

					<div class="form-group  col-lg-6">
						<label for="cnic">Description</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input id="check1" name="description" type="text" :value="old('description')" class="form-control" placeholder="Description" aria-label="CNIC" aria-describedby="basic-addon22" />

						</div>
						<span id="test" style="color: red;"></span>
						@error('description')
						<div class="alert alert-danger mt-1 mb-1">
							{{ $message }}
						</div>
						@enderror
					</div>


					<div class="col-lg-6">
						<label>Module</label>
						<div id="increment2" class="input-group hdtuto control-group lst increment">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="check1" name="module[]" type="text"  class="form-control" placeholder="Module" aria-label="CNIC" aria-describedby="basic-addon22" />
							<div class="input-group-btn">
								<button id="btn2" class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
							</div>

						</div>

						<div id="clone2" class="clone hide">

							<div class="hdtuto control-group lst input-group" style="margin-top:10px">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon12"><i class="ti-user"></i></span>
								</div>
								<x-input id="check1" name="module[]" type="text"  class="form-control" 
								placeholder="Module" aria-label="CNIC" aria-describedby="basic-addon22" />



								<div class="input-group-btn">

									<button id="btn2" class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

								</div>

							</div>
						</div>
						</div>

					<div style="margin-top:15px;" class="col-lg-6">
						<label>Employee</label>
						<div id="increment1" class="input-group hdtuto control-group lst increment">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<select class="browser-default custom-select" name="emp_name[]">
								@foreach($users as $user)
								<option value="{{ $user->name }}">{{ $user->name }}</option>
								@endforeach
							</select>
							<div class="input-group-btn">
								<button id="btn1" class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
							</div>

						</div>

						<div id="clone1" class="clone hide">

							<div class="hdtuto control-group lst input-group" style="margin-top:10px">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
								</div>
								<select class="browser-default custom-select" name="emp_name[]">
									@foreach($users as $user)
									<option value="{{ $user->name }}">{{ $user->name }}</option>
									@endforeach
								</select>



								<div class="input-group-btn">

									<button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

								</div>

							</div>
						</div>
					
					
					</div>

					<div class="form-group" style="margin-top: 25px; margin-left:15px;">
						<button id="submit" type="submit" class="btn btn-primary mr-2">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>





@include('includes.footer')
<script type="text/javascript">
	$(document).ready(function() {

		$("#btn1").click(function() {

			var lsthmtl = $("#clone1").html();

			$("#increment1").after(lsthmtl);

		});
		$("#btn2").click(function() {

			var lsthmtl = $("#clone2").html();

			$("#increment2").after(lsthmtl);

		});

		$("body").on("click", ".btn-danger", function() {

			$(this).parents(".hdtuto").remove();

		});

	});
</script>