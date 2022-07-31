@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <div class="position-absolute top-0 end-0">
                        <a class="btn btn-primary" href="{{ route('employees.index') }}">
                            <i class="fa fa-eye" aria-hidden="true">ViewList</i>
                        </a>
                        <a class="btn btn-info " href="{{ route('employees.create') }}">
                        <i class="fa fa-plus" aria-hidden="true">Create</i>
                        </a>
                    </div>

                </div>

                <div class="card-body">
                @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
