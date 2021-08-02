@include('includes.header')

<section class="content">
	<div class="container-fluid">
		<div class="card card-default">
			 <div class="card-header">
			<h1 style="text-align: center;">User Detail</h1>
          </div>
          <div class="card-body">

          	<div id="patient_data" class="row">
          			<div class="col-lg-4 text-center">
          				<center><img style="width: 300px; height:300px; border-radius: 18px; text-shadow: 2px 2px 5px red;"  class="img-thumnail patient-image" src="{{ asset('/image/'.$users->image) }}"></center>
          			</div>
          			<div class="col-lg-6">
          		<center>
          				<table class="table">
          					<tr>
          						<td style="text-align: center;"><strong>Name</strong></td>
          						<td>{{ $users->name }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Father Name</strong></td>
          						<td>{{ $users->fname }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Cnic</strong></td>
          						<td>{{ $users->cnic }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Emp Id</strong></td>
          						<td>{{ $users->empid }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Email</strong></td>
          						<td>{{ $users->email }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Address</strong></td>
          						<td>{{ $users->address }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Contact</strong></td>
          						<td>{{ $users->contact }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Date of Joining</strong></td>
          						<td>{{ $users->joining }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Position</strong></td>
          						<td>{{ $users->position }}</td>
          					</tr>
          						<tr>
          						<td style="text-align: center;"><strong>Date of Birth</strong></td>
          						<td>{{ $users->dob }}</td>
          					</tr>
          					<tr>
          						<td style="text-align: center;"><strong>Qualification</strong></td>
          						<td>{{ $users->qualification }}</td>
          					</tr>
							  <tr>
          						<td style="text-align: center;"><strong>Role</strong></td>
          						<td>@if($users->role == 1)
							Admin
								@endif
								@if($users->role == 2)
								Employee
								@endif
								@if($users->role=='')
								Null
								@endif</td>
          					</tr>
          				</table>
          				</center>
          			</div>	
          	</div>
          </div>
		</div>
	</div>
</section>





@include('includes.footer')