@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Attendance Report</h4>
				<div class="table-responsive m-t-40">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
				<form method="post" action="{{ route ('att_search.action') }}">
					@csrf
					<input type="date" required name="search"   style="margin-bottom:9px; margin-right:3px;">
					<button type="submit" style="border-radius:5px;" class="btn btn-primary" >Search</button>
					</form>
					<thead>
							<tr>
                                <th style="text-align:center">S.No</th>
								<th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Emp Id</th>								
								<th style="text-align:center;">Position</th>
                                <th style="text-align:center;">Date</th>
								<th style="text-align:center">Attendance</th>
							</tr>
						</thead>
						<tbody>
                        @php
                        $i=1;
                        @endphp
						@foreach($attendance as $att)
                            @if($att->status!=3)
								<tr>
                                <td style="text-align:center;">{{ $i++ }}</td>
								<td style="text-align:center;">{{ $att->name }}</td>
                                <td style="text-align:center;">{{ $att->empid }}</td>
                                <td style="text-align:center;">{{ $att->position }}</td>
                                <td style="text-align:center;">{{ $att->date }}</td>
                                @if($att->status==0):
                                <td style="text-align: center;"><a href="" class="btn btn-danger">Absent</a></td>
                                @endif
                                @if($att->status==1):
                                <td style="text-align: center;"><a href="" class="btn btn-success">Present</a></td>
                                @endif
                                @if($att->status==2):
                                <td style="text-align: center;"><a href="" class="btn btn-primary">Leave</a></td>
                                @endif
								</tr>
                            @endif		
						@endforeach	
                        			
						</tbody>
					</table>
                    <span>
					{{ $attendance->links("pagination::bootstrap-4") }}
					</span>
				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.footer')
