@include('includes.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
        
			<div class="card-body">
				<h4 class="card-title">Apply Here For Leave Application</h4>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
				<form class="form pt-3" method="post" action="{{ route('leave.store') }}">
				@csrf
					<div class="form-group col-lg-6">
						<label for='Username'>Name</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
							</div>
							<x-input id="name" readonly type="text" name="name" value="{{ auth()->user()->name }}" placeholder="" required autofocus  class="form-control"  aria-describedby="basic-addon11"/>
						</div>
						@error('name')
						<div class="alert alert-danger mt-1 mb-1">
						{{ $message}}
						</div>
						@enderror
						
					</div>
					<div class="form-group  col-lg-6">
						<label for="cnic">Reason</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon22"><i class="ti-id-badge"></i></span>
							</div>
							<x-input id="check1" name="reason" type="text" :value="old('reason')"  class="form-control" placeholder="Reasons" aria-label="CNIC" aria-describedby="basic-addon22"/>
							<input type="hidden" name="empid" value="{{ auth()->user()->empid }}">
						</div>
						<input type="hidden" name="status" value="0">
						<span id="test" style="color: red;"></span>
						@error('reason')
						<div class="alert alert-danger mt-1 mb-1">
						{{ $message }}
						</div>
						@enderror
					</div>
					<div class="form-group  col-lg-6">
						<label for="cnic">No of Days</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text"  id="basic-addon22"><i class="ti-id-badge" aria-hidden="true"></i>
</span>
							</div>
							<x-input 
                                type="number"
                                name="days" id="check2"
                                required autocomplete="new-password" :value="old('days')" class="form-control" placeholder="No of Days" />
						</div>
						<span id="test2" style="color: red;"></span>
						@error('days')
						<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<button  id="submit" type="submit" class="btn btn-success mr-2">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@include('includes.footer')