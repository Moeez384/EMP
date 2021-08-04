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
				<h4 class="card-title">Please Enter here Project Modules</h4>
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
				<form class="form pt-3" method="post" action="{{ route('module.store') }}">
					@csrf
					<div class="form-group col-lg-6">
						<label for='Username'> Project Name</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input readonly id="name" type="text" name="name" placeholder="Name" value="{{ $project->name }}" required autofocus class="form-control" aria-describedby="basic-addon11" />
						</div>
						@error('name')
						<div class="alert alert-danger mt-1 mb-1">
							{{ $message}}
						</div>
						@enderror

					</div>


					<x-input id="check1" name="id" type="hidden" value="{{ $project->id }}" class="form-control" placeholder="Description" aria-label="CNIC" aria-describedby="basic-addon22" />
					<div class="col-lg-6">
						<label>Module Name</label>
						<div class="input-group hdtuto control-group lst increment">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="check1" name="module[]" type="text" class="form-control" placeholder="Module Name" aria-label="CNIC" aria-describedby="basic-addon22" />
							<div class="input-group-btn">
								<button class="btn btn-success" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
							</div>

						</div>

						<div class="clone hide">

							<div class="hdtuto control-group lst input-group" style="margin-top:10px">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
								</div>
								<x-input id="check1" name="module[]" type="text" class="form-control" placeholder="Module Name" aria-label="CNIC" aria-describedby="basic-addon22" />



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


<script type="text/javascript">
	$(document).ready(function() {

		$(".btn-success").click(function() {

			var lsthmtl = $(".clone").html();

			$(".increment").after(lsthmtl);

		});

		$("body").on("click", ".btn-danger", function() {

			$(this).parents(".hdtuto").remove();

		});

	});
</script>


@include('includes.footer')