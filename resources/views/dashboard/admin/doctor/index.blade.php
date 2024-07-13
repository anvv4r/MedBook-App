@extends('dashboard.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>list of all doctors</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/doctor">Doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Data Table</h3>

            </div>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="nosort">Avatar</th>
                            <th class="wrap-text">Email</th>
                            <th class="wrap-text">Address</th>
                            <th class="wrap-text">Phone number</th>
                            <th class="wrap-text">Specialization</th>
                            <th>Gender</th>
                            <th class="nosort">Action</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>
                                    <td class="wrap-text">{{$user->email}}</td>
                                    <td class="wrap-text">{{$user->address}}</td>
                                    <td class="wrap-text">{{$user->phone_number}}</td>
                                    <td class="wrap-text">{{$user->specialty}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                            <i class="ik ik-eye"></i>
                                        </a>
                                        <a href="{{route('doctor.edit', [$user->id])}}"><i class="ik ik-edit-2"></i></a>

                                        <a href="{{route('doctor.delete', [$user->id])}}"><i class="ik ik-trash-2"></i></a>
                                    </td>
                                    <td>&nbsp;</td>

                                </tr>

                                @include('dashboard.admin.doctor.modal')

                            @endforeach

                        @else 
                            <td>No Doctor to display</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection