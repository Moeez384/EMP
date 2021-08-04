@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Daily Progress Report</h4>
				<div class="table-responsive m-t-40">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
				<form method="post" action="{{ route ('dpr.search') }}">
					@csrf
					<input type="date" required name="search"   style="margin-bottom:9px; margin-right:3px;">
					<button type="submit" style="border-radius:5px;" class="btn btn-primary" >Search</button>
					</form>
					<thead>
							<tr>
                                <th style="text-align:center">S.No</th>
								<th style="text-align:center;">Supervisor Name</th>
                                <th style="text-align:center;">Project Name</th>								
								<th style="text-align:center;">Module Name</th>
                                <th style="text-align:center;">Detail</th>
								<th style="text-align:center">Work Completed</th>
                                <th style="text-align:center">Date</th>
							</tr>
						</thead>
						<tbody>
                        @php
                        $i=1;
                        @endphp
						@foreach($dprs as $dpr)
                            
								<tr>
                                <td style="text-align:center;">{{ $i++ }}</td>
								<td style="text-align:center;">{{ $dpr->Sname }}</td>
								<td style="text-align:center;">{{ $dpr->projects->name }}</td>
                               <td style="text-align:center;">{{ $dpr->modules->name }}</td>
                                <td style="text-align:center;">{{ $dpr->details }}</td>
                                <td style="text-align:center;">{{ $dpr->workCompleted }}</td>
                                <td style="text-align:center;">{{ $dpr->date }}</td>
								</tr>	
						@endforeach	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@include('includes.footer')
