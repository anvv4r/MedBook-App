@extends('dashboard.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Practitioner</h5>
                    <span>Update</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/admin/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="/admin/doctor">Practitioner</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="row ">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Practitioner Profile</div>
                <div class="card-body">
                    <p>Full Name : {{$user->name}}</p>
                    <p>Email : {{$user->email}}</p>
                    <p>Address : {{$user->address}}</p>
                    <p>Phone : {{$user->phone_number}}</p>
                    <p>Gender : {{$user->gender}}</p>
                    <p>Date of Birth : {{$user->dob}}</p>
                    <p>Education : {{$user->education}}</p>
                    <p>Specialisation : {{$user->specialty}}</p>
                    <p>Bio:</p>
                    <p>{{$user->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                    <form action="{{route('doctor.update',[$user->id])}}" method="post">@csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{$user->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{$user->email}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror" value="{{$user->address}}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                value="{{$user->phone_number}}">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">select gender</option>
                                <option value="Male" @if($user->gender==='Male')selected @endif >Male</option>
                                <option value="Female" @if($user->gender==='Female')selected @endif>Female</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                value="{{$user->dob}}">
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Education</label>
                            <input type="text" name="education"
                                class="form-control @error('education') is-invalid @enderror"
                                value="{{$user->education}}">
                            @error('education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Specialisation</label>
                            <select name="specialty" class="form-control @error('specialty') is-invalid @enderror">
                                @foreach(App\Models\Specialty::all() as $d)
                                <option value="{{$d->name}}" @if($user->specialty==$d->name)selected @endif>{{$d->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('specialty')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Professional Statement</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="5">{{$user->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{route('doctor.index')}}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Update Image
                </div>
                <form action="{{route('doctor.pic',[$user->id])}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <img src="{{asset('images')}}/{{$user->image}}" width="120"
                            style="border: 2px solid #eee; border-radius: 10px;">
                        <br>
                        <br>
                        <input type="file" name="file" class="form-control" required="">
                        <br>
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection