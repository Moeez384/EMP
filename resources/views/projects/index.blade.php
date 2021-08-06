@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">All projects</h4>
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
								<th style="text-align:center;">Work Complted</th>
								<th style="text-align:center;">Modules</th>
								<th style="text-align:center;">Assigned To</th>
								<th style="text-align:center;">Project Report</th>
								<th style="text-align:center;">Add Module</th>
                                <th style="text-align:center">Delete</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($projects as $project)
								<tr>
								<td style="text-align:center;">{{ $project->id }}</td>
								<td style="text-align:center;">{{ $project->name }}</td>
								<td style="text-align:center;">{{ $project->description }}</td>
                                <td style="text-align:center;">{{ $project->workCompleted }}</td>
								<td style="text-align:center;" style="max-width:25px; min-width:25px;">
								@foreach($project->modules as $u)

								{{ $u->name.' ' }}
								<?php
								echo "/";
								?>
								@endforeach
							</td>
								<td style="text-align:center;">
								@foreach($project->users as $u)

								{{ $u->name.' ' }}
								<?php
								echo "/";
								?>
								@endforeach
							</td>
							<td style="text-align:center;"><a class="btn btn-primary" href="{{ route('project.dprs',$project->id) }}">Project Report</a></td>
								<td style="text-align:center;"><a class="btn btn-success" href="{{ route('module.create',$project->id) }}">Add Module</a></td>
								<form action="{{route( 'project.destroy',$project->id) }}" method="post">
									@csrf
									@method('DELETE')
                                <td style="text-align:center;"> <button class="btn btn-danger">Delete</button>
								</td>
								</form>
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