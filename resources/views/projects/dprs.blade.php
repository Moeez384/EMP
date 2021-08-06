@include('includes.header')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $project->name }}</h4>
                <div class="table-responsive m-t-40">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Modules Name</th>
                                <th style="text-align:center;">Supervisor Name</th>
                                <th style="text-align:center;">Module Detail</th>
                                <th style="text-align:center;">Work Completed In %age</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($modules as $m)
                            @foreach($m->dprs as $d)
                            <tr>
                               
                                <td style="text-align:center;">{{ $m->name }}</td>
                                <td style="text-align:center;">{{ $d->Sname }}</td>
                                <td style="text-align:center;">{{ $d->details }}</td>
                                <td style="text-align:center;">{{ $d->workCompleted }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')