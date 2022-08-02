@extends('layouts.app')
@section('content')
    <div
        class="container-fluid
                         bg-info
                         p-3
                         position-relative">
        <h3 class="text-center">
            Add Employee Details</h3>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form4 top">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-2">
                    <div class="form-bg">
                        <form class="form" action="{{ route('employees.store') }}" method="post">
                            @csrf
                            <div class="form-group mt-2">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required="min:5|max:15"
                                    placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="example-date-input">Date of Joining</label>
                                <input class="form-control" type="date" required name="date_of_joining">
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" required="true" name="bio" placeholder="Write message"></textarea>
                            </div>
                            <div class="mt-2 ">
                                <button type="submit" class="btn btn-primary text-center btn-blue">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
    @endsection
