@extends('dashboard.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Time Slot</h5>
                    <span>List</span>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="/time">Time Slot</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white" role="alert">
            {{Session::get('errmessage')}}
        </div>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}

        </div>

    @endforeach

    <div class="card">
        <div class="card-header">
            <h3>Your appointment time list</h3>
        </div>

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($uniqueDates) == 0)
                        <tr>
                            <td colspan="4" class="text-center">No time slot available</td>
                        </tr>

                    @else
                        @foreach($uniqueDates as $key => $date)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$doctor->name}}</td>
                                <td>{{$date['date']}}</td>
                                <td>
                                    <form action="{{ route('time.show', ['date' => $date['date']]) }}" method="get">@csrf
                                        <input type="hidden" name="date" value="{{$date['date']}}">
                                        <button type="submit" class="btn btn-primary">Show/Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>



<style type="text/css">
    input[type="checkbox"] {
        zoom: 1.5;

    }

    body {
        font-size: 18px;
    }
</style>

@endsection