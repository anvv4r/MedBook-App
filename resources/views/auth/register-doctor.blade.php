@extends('layouts.master')

@section('content')

<div class="container">
    <h3>Register as Practicioner</h3>

    <div class="form-body">

        <form action="{{route('auth.register-doctor')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-input">
                    <label for="">Full name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="doctor name" value="{{old('name')}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="email" value="{{old('email')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-input">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="doctor password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="">Gender</label>
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                        <option value="">select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-row">

                <div class="form-input">
                    <label for="">Education</label>
                    <input type="text" name="education" class="form-control @error('education') is-invalid @enderror"
                        placeholder="doctor highest degree" value="{{old('education')}}">
                    @error('education')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        placeholder="doctor address" value="{{old('address')}}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">

                <div class="form-input">
                    <label for="">Specialization</label>
                    <select name="specialty" class="form-control">
                        <option value="">Please select</option>

                        @foreach(App\Models\Specialty::all() as $d)
                            <option value="{{$d->name}}">{{$d->name}}</option>
                        @endforeach
                    </select>

                    @error('specialty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-input">
                    <label for="">Phone number</label>
                    <input type="text" name="phone_number" placeholder="doctor phone number"
                        class="form-control @error('phone_number') is-invalid @enderror"
                        value="{{old('phone_number')}}">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

            </div>

            <div class="form-row">

                <div class="form-input">
                    <label for="">Date of Birth</label>
                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                        value="{{old('dob')}}">
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="form-input">
                    <label>Image</label>
                    <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"
                        placeholder="Upload Image" name="image">
                    <span class="input-group-append"></span>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="form-col">
                <label>Bio</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4"
                    name="description">{{old('description')}}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>

    </div>

</div>
@endsection