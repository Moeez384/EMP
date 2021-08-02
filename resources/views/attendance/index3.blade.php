@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Mark Attendance</h4>
				<div class="table-responsive m-t-40">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
                                <th style="text-align:center">S.No</th>
								<th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Emp Id</th>								
								<th style="text-align:center">No.of Days Present</th>
                                <th style="text-align:center">No.of Days Absent</th>
                                <th style="text-align:center">On Leave</th>
							</tr>
						</thead>
						<tbody>
				
								<tr>
                                <td style="text-align:center;">{{ 1 }}</td>
								<td style="text-align:center;">{{ $user->name }}</td>
                                <td style="text-align:center;">{{ $user->empid }}</td>                               
                                <td style="text-align:center;"><a href="" class="btn btn-success" style="border-radius: 12px;">{{ $record }}</a></td>
                                <td style="text-align:center;"><a href="" class="btn btn-danger" style="border-radius: 12px;">{{ $record1 }}</a></td>
                                <td style="text-align:center;"><a href="" class="btn btn-primary" style="border-radius: 12px;">{{ $record2 }}</a></td> 
                                </tr>
                                				
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.footer')
