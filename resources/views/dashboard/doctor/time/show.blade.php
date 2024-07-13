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

    <form action="{{ route('time.update', ['date' => $date]) }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header">

                <h3>Your time slot for : {{$date}}</h3>
                <span style="margin-left: 650px">Select All&nbsp;
                    <input type="checkbox"
                        onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                </span>

            </div>

            <div class="card-body">

                <table class="table table-striped">

                    <tbody>
                        <input type="hidden" name="id" value="{{$timeId}}">

                        <tr>
                            <th scope="row">1</th>
                            <td><input type="checkbox" name="time[]" value="08.00"
                                    @if(isset($times)){{$times->contains('time', '08.00') ? 'checked' : ''}}@endif>
                                08.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="08.30"
                                    @if(isset($times)){{$times->contains('time', '08.30') ? 'checked' : ''}}@endif>
                                08.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="09.00"
                                    @if(isset($times)){{$times->contains('time', '09.00') ? 'checked' : ''}}@endif>
                                09.00
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">2</th>
                            <td><input type="checkbox" name="time[]" value="09.30"
                                    @if(isset($times)){{$times->contains('time', '09.30') ? 'checked' : ''}}@endif>
                                09.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="10.00"
                                    @if(isset($times)){{$times->contains('time', '10.00') ? 'checked' : ''}}@endif>
                                10.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="10.30"
                                    @if(isset($times)){{$times->contains('time', '10.30') ? 'checked' : ''}}@endif>
                                10.30
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">3</th>
                            <td><input type="checkbox" name="time[]" value="11.00"
                                    @if(isset($times)){{$times->contains('time', '11.00') ? 'checked' : ''}}@endif>
                                11.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="11.30"
                                    @if(isset($times)){{$times->contains('time', '11.30') ? 'checked' : ''}}@endif>
                                11.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="13.00"
                                    @if(isset($times)){{$times->contains('time', '13.00') ? 'checked' : ''}}@endif>
                                13.00
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">4</th>
                            <td><input type="checkbox" name="time[]" value="13.30"
                                    @if(isset($times)){{$times->contains('time', '13.30') ? 'checked' : ''}}@endif>
                                13.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="14.00"
                                    @if(isset($times)){{$times->contains('time', '14.00') ? 'checked' : ''}}@endif>
                                14.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="14.30"
                                    @if(isset($times)){{$times->contains('time', '14.30') ? 'checked' : ''}}@endif>
                                14.30
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">5</th>
                            <td><input type="checkbox" name="time[]" value="15.00"
                                    @if(isset($times)){{$times->contains('time', '15.00') ? 'checked' : ''}}@endif>
                                15.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="15.30"
                                    @if(isset($times)){{$times->contains('time', '15.30') ? 'checked' : ''}}@endif>
                                15.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="16.00"
                                    @if(isset($times)){{$times->contains('time', '16.00') ? 'checked' : ''}}@endif>
                                16.00
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td><input type="checkbox" name="time[]" value="16.30"
                                    @if(isset($times)){{$times->contains('time', '16.30') ? 'checked' : ''}}@endif>
                                16.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="18.00"
                                    @if(isset($times)){{$times->contains('time', '18.00') ? 'checked' : ''}}@endif>
                                18.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="18.30"
                                    @if(isset($times)){{$times->contains('time', '18.30') ? 'checked' : ''}}@endif>
                                18.30
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td><input type="checkbox" name="time[]" value="19.00"
                                    @if(isset($times)){{$times->contains('time', '19.00') ? 'checked' : ''}}@endif>
                                19.00
                            </td>
                            <td><input type="checkbox" name="time[]" value="19.30"
                                    @if(isset($times)){{$times->contains('time', '19.30') ? 'checked' : ''}}@endif>
                                19.30
                            </td>
                            <td><input type="checkbox" name="time[]" value="20.00"
                                    @if(isset($times)){{$times->contains('time', '20.00') ? 'checked' : ''}}@endif>
                                20.00
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

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