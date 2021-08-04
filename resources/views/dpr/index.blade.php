@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Assigned  Projects</h4>
				<div class="table-responsive m-t-40">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
					<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="text-align:center;">Project Id</th>
								<th style="text-align:center;">Name</th>
								<th style="text-align:center;">Description</th>
                                <th style="text-align:center">ADD DPR</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($projects as $project)
                            
                            
								<tr>
								<td style="text-align:center;">{{ $project->id }}</td>
								<td style="text-align:center;">{{ $project->name }}</td>
								<td style="text-align:center;">{{ $project->description }}</td>
								<td style="text-align:center;"><a class="btn btn-success" href="{{ route('dpr.add',$project->id) }}">ADD DPR</a></td>
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