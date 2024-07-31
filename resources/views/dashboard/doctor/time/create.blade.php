@extends('dashboard.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Time Slot</h5>
                    <span>Create</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/doctor/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="/doctor/time">Time Slot</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

    <form action="{{route('time.store')}}" method="post">
        @csrf

        <div class="card">
            <div class="card-header">
                <h3>Choose date</h3>
            </div>
            <div class="card-body">
                <input type="text" class="form-control datetimepicker-input" id="datepicker"
                    data-toggle="datetimepicker" data-target="#datepicker" name="date" style="cursor:pointer;"
                    placeholder="Please choose a date">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Select time slot</h3>
                <span style="margin-left: 700px">Select All&nbsp;
                    <input type="checkbox"
                        onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                </span>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="checkbox" name="time[]" value="08.00"> 08.00</td>
                            <td><input type="checkbox" name="time[]" value="08.30"> 08.30</td>
                            <td><input type="checkbox" name="time[]" value="09.00"> 09.00</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><input type="checkbox" name="time[]" value="09.30"> 09.30</td>
                            <td><input type="checkbox" name="time[]" value="10.00"> 10.00</td>
                            <td><input type="checkbox" name="time[]" value="10.30"> 10.30</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="checkbox" name="time[]" value="11.00"> 11.00</td>
                            <td><input type="checkbox" name="time[]" value="11.30"> 11.30</td>
                            <td><input type="checkbox" name="time[]" value="13.00"> 13.00</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td><input type="checkbox" name="time[]" value="13.30"> 13.30</td>
                            <td><input type="checkbox" name="time[]" value="14.00"> 14.00</td>
                            <td><input type="checkbox" name="time[]" value="14.30"> 14.30</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td><input type="checkbox" name="time[]" value="15.00"> 15.00</td>
                            <td><input type="checkbox" name="time[]" value="15.30"> 15.30</td>
                            <td><input type="checkbox" name="time[]" value="16.00"> 16.00</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td><input type="checkbox" name="time[]" value="16.30"> 16.30</td>
                            <td><input type="checkbox" name="time[]" value="18.00"> 18.00</td>
                            <td><input type="checkbox" name="time[]" value="18.30"> 18.30</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td><input type="checkbox" name="time[]" value="19.00"> 19.00</td>
                            <td><input type="checkbox" name="time[]" value="19.30"> 19.30</td>
                            <td><input type="checkbox" name="time[]" value="20.00"> 20.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</div>
</form>

<style type="text/css">
    input[type="checkbox"] {
        zoom: 1.5;
    }

    body {
        font-size: 18px;
    }
</style>

@endsection