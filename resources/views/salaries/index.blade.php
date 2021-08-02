@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Salary Report</h4>
				<div class="table-responsive m-t-40">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="text-align:center;">Emp Id</th>
								<th style="text-align:center;">Name</th>
								<th style="text-align:center;">Father Name</th>
								<th style="text-align:center;">Position</th>
                                <th style="text-align:center">Basic Salary</th>
								<th style="text-align:center">Status</th>
							</tr>
						</thead>
						<tbody>
						@foreach($salaries as $salary)
						@if($salary->status==0)
								<tr>
								<td style="text-align:center;">{{ $salary->empid }}</td>
								<td style="text-align:center;">{{ $salary->name }}</td>
								<td style="text-align:center;">{{ $salary->fname }}</td>
                                <td style="text-align:center;">{{ $salary->position }}</td>
                                <td style="text-align:center;">{{ $salary->salary }}</td>
								<td style="text-align:center;"> <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $salary->id }}">Recieve</button>
								</td>
									
								</tr>

						
						
<div class="modal modal-danger fade" id="delete{{ $salary->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title text-center" id="myModalLabel">Salary Confirmation</h4>
      </div>
      <form action="{{ route('salary.recieved') }}" method="post">
      		@csrf
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to Perform this Action?
				</p>
	      		<input type="hidden" name="id" id="cat_id" value="{{ $salary->id }}">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-warning">Submit</button>
	      </div>
      </form>
    </div>
  </div>
</div>
						@endif
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@include('includes.footer')
