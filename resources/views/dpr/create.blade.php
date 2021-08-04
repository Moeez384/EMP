@include('includes.header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Daily Progress Report</h4>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <form class="form pt-3" method="post" action="{{ route('dpr.store') }}">
                    @csrf
                    <div class="form-group col-lg-6">
                        <label for='Username'> Project Name</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <x-input readonly id="name" type="text" name="name" placeholder="Name" value="{{ $project->name }}" required autofocus class="form-control" aria-describedby="basic-addon11" />
                        </div>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message}}
                        </div>
                        @enderror

                    </div>
                    <x-input readonly id="name" type="hidden" name="project_id" placeholder="Name" value="{{ $project->id }}" required autofocus class="form-control" aria-describedby="basic-addon11" />
                    <div class="form-group col-lg-6">
                        <label for='Username'>Supervisor Name</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <x-input id="name" type="text" name="Sname" placeholder="Supervisor name" :value="old('Sname')" required autofocus class="form-control" aria-describedby="basic-addon11" />
                        </div>
                        @error('Sname')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message}}
                        </div>
                        @enderror

                    </div>


                    <x-input id="check1" name="id" type="hidden" value="" class="form-control" placeholder="Description" aria-label="CNIC" aria-describedby="basic-addon22" />
                    <div class="col-lg-6">
                        <label>Module Name</label>
                        <div class="input-group hdtuto control-group lst increment">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <select class="browser-default custom-select" name="module_id">
                                <option value="" selected>Module Name</option>
                                @foreach($projects as $project)
                                 @foreach($project->modules as $s)
                                <option value="{{ $s->id }}">{{ $s->name }}</option>
                                 @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div style="margin-top: 15px;" class="form-group col-lg-6">
                        <label for='Username'> Detail</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <x-input  id="name" type="text" name="detail" placeholder="Detail" :value="old('detail')" required autofocus class="form-control" aria-describedby="basic-addon11" />
                        </div>
                        @error('detail')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message}}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-lg-6">
                        <label for='Username'>Work Completed in percentage</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <x-input id="name" type="number" name="workCompleted" placeholder="Work Completed In percentage" :value="old('workCompleted')" required autofocus class="form-control" aria-describedby="basic-addon11" />
                        </div>
                        @error('workCompleted')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message}}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group col-lg-6">
                        <label for='Username'>Date</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                            </div>
                            <x-input  id="name" type="date" name="date" placeholder="Name" :value="old('date')" required autofocus class="form-control" aria-describedby="basic-addon11" />
                        </div>
                        @error('date')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message}}
                        </div>
                        @enderror

                    </div>

                    <div class="form-group" style="margin-top: 25px; margin-left:15px;">
                        <button id="submit" type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')