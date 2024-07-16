@extends('dashboard.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctor Specialisation</h5>
                    <span>list of all specialisation</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/admin/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/admin/specialty">Specialisation</a>
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
                <h3>Doctor Specialisation</h3>

            </div>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th class="nosort">Action</th>
                            <th class="nosort">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($specialties) > 0)
                            @foreach($specialties as $key => $specialty)
                                <tr>
                                    <td> {{$key + 1}}</td>
                                    <td>{{$specialty->name}}</td>
                                    <td>
                                        <div class="table-actions">
                                            <form action="{{ route('specialty.destroy', [$specialty->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('specialty.edit', [$specialty->id]) }}">
                                                    <i class="ik ik-edit-2"></i>
                                                </a>&nbsp;&nbsp;
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this specialization?');">
                                                    <i class="ik ik-trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>x</td>
                                </tr>
                            @endforeach

                        @else 

                            <td>No specialisation to display</td>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection