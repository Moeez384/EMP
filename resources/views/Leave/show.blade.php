@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Leave Details</h4>
				<div class="table-responsive m-t-40">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="text-align:center;">SNo.</th>
								<th style="text-align:center;">Name</th>
								<th style="text-align:center;">Emp Id</th>
								<th style="text-align:center;">Reason</th>
								<th style="text-align: center;">No of Days</th>
                                <th style="text-align:center;">Status</th>
							</tr>
						</thead>
						<tbody>
                        @php 
                        $i = 1
                        @endphp
						@foreach($leaves as $leave)
								<tr>
								<td style="text-align:center;">{{ $i++ }}</td>
								<td style="text-align:center;">{{ $leave->name }}</td>
								<td style="text-align:center;">{{ $leave->empid }}</td>
								<td style="text-align:center;">{{ $leave->reason }}</td>
                                <td style="text-align:center;">{{ $leave->days }}</td>
                                @if($leave->satus==0)
                                <td style="text-align:center;"><Button class="btn btn-primary">Pending</Button></td>
                                @endif
                                @if($leave->satus==2)
                                <td style="text-align:center;"><Button class="btn btn-danger">Not Approved</Button></td>
                                @endif
                                @if($leave->satus==1)
                                <td style="text-align:center;"><Button class="btn btn-success">Approved</Button></td>
                                @endif
								</tr>
						@endforeach							
						</tbody>
					</table>
					<span>
					</span>	
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.footer')