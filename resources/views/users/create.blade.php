@include('includes.header')
<div class="row">
<h4 class="card-title">Please Enter User Information</h4>

<br>
</div>
<script type="text/javascript">
 
 Swal.fire("Congrats!", ",User Added Successfully");
  
 
</script>
@if ($message = Session::get('success'))
<script type="text/javascript">
 
 swal("Congrats!", ",User Added Successfully");
  
 
</script>
@endif
<div class="row">
	<div class="col-lg-4">
		<div class="card" style="min-height:700px;">
			<div class="card-body">
				<form class="form pt-3" method="post" enctype="multipart/form-data" action="{{ route('users.store') }}">
					@csrf
					<div class="form-group col-lg-12">
						<label for='Username'>Name</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus class="@error('name') is-invalid @enderror form-control" class="form-control" aria-describedby="basic-addon11" />
						
						</div>
						
							
						@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<input type="hidden" name="checkDate" value="<?php echo date("m-y"); ?>">
					<div class="form-group col-lg-12">
						<label for='Username'>Father Name</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" type="text" name="fname" :value="old('fname')" class="@error('fname') is-invalid @enderror form-control" placeholder="Father Name" required autofocus class="form-control" aria-describedby="basic-addon11" />
					
						</div>
						@error('fname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Email</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="email" type="email" :value="old('email')" class="@error('email') is-invalid @enderror form-control" class="form-control" placeholder="Email" aria-label="CNIC" aria-describedby="basic-addon22" />
		
						</div>
						@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Emp Id</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="empid" type="number" :value="old('empid')" class="@error('empid') is-invalid @enderror form-control" class="form-control" placeholder="Emp Id" aria-label="CNIC" aria-describedby="basic-addon22" />
							
						</div>
						@error('empid')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group col-lg-12">
						<label for='Username'>Cnic</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" type="text" maxlength="13" name="cnic" :value="old('cnic')" placeholder="Cnic" class="@error('cnic') is-invalid @enderror form-control" required autofocus class="form-control" aria-describedby="basic-addon11" />
					
						</div>
						@error('cnic')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group col-lg-12">
						<label for='Username'>Contact</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" type="text" maxlength="11" name="contact" :value="old('contact')" placeholder="Contact" class="@error('contact') is-invalid @enderror form-control" required autofocus class="form-control" aria-describedby="basic-addon11" />
			
						</div>
						@error('contact')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					
					
					</div>
		</div>
	</div>	
					<div class="col-lg-4">
					<div class="card" style="min-height:700px;">
					<div class="card-body">
					<div class="form-group  col-lg-12">
						<label for="cnic">Joining Date</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="joining" type="date" :value="old('joining')" class="@error('joining') is-invalid @enderror form-control" class="form-control" placeholder="Joining Date" aria-label="CNIC" aria-describedby="basic-addon22" />
				
						</div>
						@error('joining')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Date of Birth</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="dob" type="date" :value="old('dob')" class="form-control" placeholder="Date of Birth" aria-label="CNIC" aria-describedby="basic-addon22" />
			
						</div>
						@error('dob')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Qualification</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="qualification" type="text" :value="old('qualification')" class="@error('qualification') is-invalid @enderror form-control" class="form-control" placeholder="qualification" aria-label="CNIC" aria-describedby="basic-addon22" />
				
						</div>
						@error('qualification')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Basic Salary</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="salary" type="number" :value="old('salary')" class="@error('salary') is-invalid @enderror form-control" class="form-control" placeholder="Basic Salary" aria-label="CNIC" aria-describedby="basic-addon22" />
			
						</div>
						@error('salary')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Position</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="position" type="text" :value="old('position')" class="@error('position') is-invalid @enderror form-control" class="form-control" placeholder="Position" aria-label="CNIC" aria-describedby="basic-addon22" />
			
						</div>
						@error('position')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group col-lg-12">
						<label for='Username'>Address</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" type="text" name="address" :value="old('address')" class="@error('address') is-invalid @enderror form-control" placeholder="Address" required autofocus class="form-control" aria-describedby="basic-addon11" />
				
						</div>
						@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
				</div>
		</div>
					</div>
					<div class="col-lg-4">
					<div class="card" style="min-height:700px;">
					<div class="card-body">
					
					<div class="col-lg-12">
						<div class="form-group">
							<label for="date">Role</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="ti-calendar"></i></span>
								</div>
								<select  name="role" class="form-control custom-select">
									<option value="">Role</option>
									<option value="1" {{ '1'== old('type','') ? 'selected' : '' }}>Admin</option>
									<option value="2" {{ '2'== old('type','') ? 'selected' : '' }}>Employes</option>
								</select>
		
							</div>
							@error('role')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
						</div>
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Image</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input required name="image" type="file" :value="old('image')" class="@error('image') is-invalid @enderror form-control" class="form-control" placeholder="File" aria-label="CNIC" aria-describedby="basic-addon22" />
		
						</div>
						@error('image')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Password</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="far fa-eye" id="togglePassword"></i></span>
							</div>
							<x-input id="password" type="password" :value="old('password')" class="@error('password') is-invalid @enderror form-control" name="password" required autocomplete="new-password" class="form-control" placeholder="Password" />
						</div>
						@error('password')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
					</div>
					<div class="form-group  col-lg-12">
						<label for="cnic">Confirm Password</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="far fa-eye" id="togglePassword"></i></span>
							</div>
							<x-input id="password_confirmation" type="password" :value="old('password_confirmation')" class="@error('password_confirmation') is-invalid @enderror form-control" name="password_confirmation" required class="form-control" placeholder="Confirm Password" />
			
						</div>
		
					</div>
					<div class="form-group">
						<button id="submit" type="submit" class="btn btn-success mr-2">Submit</button>
					</div>
					</div>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')