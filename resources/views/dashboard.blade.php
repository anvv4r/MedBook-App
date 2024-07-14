@extends('dashboard.layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    You are logged in as
                    @if(Auth::check())
                        <strong>{{ Auth()->user()->name }}</strong>
                    @else
                        Guest
                    @endif  


              </div>

            </div>
        </div>
    </div>
</div>

@endsection