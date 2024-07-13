@extends('dashboard.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Patient</h5>
                    <span>Update Patient</span>
                </div>
            </div>
        </div>
    <div class="col-lg-4">
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="{{route('patient.patient-list')}}">Patient</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
       
	<div class="card">
	<div class="card-header"><h3>Update Patient</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('patient.update',[$user->id])}}" method="post" enctype="multipart/form-data" >@csrf
            @method('PUT')
			<div class="row">
				<div class="col-lg-6">
					<label for="">Full name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="patient name" value="{{$user->name}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" value="{{$user->email}}">
                     @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="patient password">
                     @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">Gender</label>
					<select class="form-control @error('gender') is-invalid @enderror" name="gender">
                        @foreach(['Male','Female'] as $gender)
                        <option value="{{$gender}}" @if($user->gender==$gender)selected @endif>{{$gender}}</option>
                        @endforeach
					</select>
                     @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Address</label>
						<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="patient address"  value="{{$user->address}}">
                         @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
                    <div class="col-lg-6">
                        <label for="">Phone number</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"value="{{$user->phone_number}}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                        
                        
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                    value="{{$user->dob}}">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                    </div>
            	    <div class="col-lg-6">
                            <label>Image</label>
                            <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                            <span class="input-group-append"></span>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            <div class="form-group">
<br>
<br>
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <a href="{{route('patient.patient-list')}}" class="btn btn-secondary">Cancel</a>

            </div>
                           
        	</form>
	</div>
</div>
</div>
</div>


@endsection