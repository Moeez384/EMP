@include('includes.header')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Users Detail</h4>
				<h6 class="card-subtitle">Click edit icon against any User to update his information</h6>
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
								<th style="text-align:center;">Father Name</th>
								<th style="text-align:center;">Email</th>
								<th style="text-align: center;">Role</th>
								<th style="text-align: center;">Details</th>
								<th style="text-align:center;">Edit</th>
							</tr>
						</thead>
						<tbody>
                        @php 
                        $i = 1
                        @endphp
						@foreach($users as $user)
								<tr>
								<td style="text-align:center;">{{ $i++ }}</td>
								<td style="text-align:center;">{{ $user->name }}</td>
								<td style="text-align:center;">{{ $user->fname }}</td>
								<td style="text-align:center;">{{ $user->email }}</td>
								@if($user->role == 1)
								<td style="text-align:center;">Admin</td>
								@endif
								@if($user->role == 2)
								<td style="text-align: center;">Employee</td>
								@endif
								@if($user->role=='')
								<td style="text-align: center;">Null</td>
								@endif
								<td style="text-align:center"><a href="{{ route('users.show',$user->id) }}" class="btn btn-primary">Detail</a></td>
								<td style="text-align:center"><a href="{{ route('users.edit',$user->id) }}"><i class="ti-pencil-alt" style="cursor: pointer; color: #01C0C8"></i></a></td>
								</tr>
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