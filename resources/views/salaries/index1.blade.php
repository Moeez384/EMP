@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Salary Record</h4>
				<div class="table-responsive m-t-40">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<form method="post" action="{{ route ('live_search.action') }}">
					@csrf
					<input type="date" required name="search"   style="margin-bottom:9px; margin-right:3px;">
					<button type="submit" style="border-radius:5px;" class="btn btn-primary" >Search</button>
					</form>
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
                            @if($salary->status==1):
								<tr>
								<td style="text-align:center;">{{ $salary->empid }}</td>
								<td style="text-align:center;">{{ $salary->name }}</td>
								<td style="text-align:center;">{{ $salary->fname }}</td>
                                <td style="text-align:center;">{{ $salary->position }}</td>
                                <td style="text-align:center;">{{ $salary->salary }}</td>
								<td style="text-align:center;"><a href="" class="btn btn-success">Recieved</a></td>
								</tr>
                                @endif
						@endforeach						
						</tbody>
					</table>
                    <span>
					{{ $salaries->links("pagination::bootstrap-4") }}
					</span>
				</div>
			</div>
		</div>
	</div>
</div>



@include('includes.footer')
