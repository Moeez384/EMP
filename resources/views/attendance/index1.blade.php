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
								<tr>
                                @if($att->status==3)
                                <td style="text-align:center;">{{ $i }}</td>
								<td style="text-align:center;">{{ $att->name }}</td>
                                <td style="text-align:center;">{{ $att->empid }}</td>
                                <td style="text-align:center;">{{ $att->position }}</td>
                                <td style="text-align:center;">{{ $att->date }}</td>
                                <td style="text-align:center;"><a href="{{ route('attendance.mark',[$att->id,1]) }}" class="btn btn-success">P</a>
                                <a href="{{ route('attendance.mark',[$att->id,0]) }}" class="btn btn-danger">A</a>
                                <a href="{{ route('attendance.mark',[$att->id,2]) }}" class="btn btn-primary">L</a></td>
                                
                                </tr>
                                @endif
                                @php
                                $i++;
                                @endphp				
						@endforeach					
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.footer')
