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
                                <th style="text-align:center;">Father Name</th>
                                <th style="text-align:center;">Emp Id</th>								
								<th style="text-align:center">Monthly Record</th>
							</tr>
						</thead>
						<tbody>
                        @php
                        $i=1;
                        @endphp
						@foreach($users as $user)
								<tr>
                                <td style="text-align:center;">{{ $i }}</td>
								<td style="text-align:center;">{{ $user->name }}</td>
                                <td style="text-align:center;">{{ $user->fname }}</td>
                                <td style="text-align:center;">{{ $user->empid }}</td>                               
                                <td style="text-align:center;"><a href="{{ route('Attendance.individualRecord',$user->empid) }}" class="btn btn-success" style="border-radius: 12px;">Attendance Record</a></td> 
                                </tr>
                                @php
                                $i++;
                                @endphp				
						@endforeach					
						</tbody>
					</table>
                    <span>
                    {{ $users->links("pagination::bootstrap-4") }}
                    </span>
				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.footer')
