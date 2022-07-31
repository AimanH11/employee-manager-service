@extends('layouts.app')
@section('content')

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
                    <form class="form"
                          action="{{route('employees.update',
                                 [$employeeArray->id])}}"
                           method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   required="true"
                                   placeholder="Your Name"
                                   value='{{$employeeArray->name}}'>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                  class="form-control"
                                  name="email"
                                  required="true"
                                  placeholder="Email Address"
                                  value='{{$employeeArray->email}}'>

                        </div>
                        <div class="form-group col-md-4">
                                <label for="example-date-input">Date of Joining</label>
                                <input data-provide="datepicker"
                                       data-date-format="yyyy-mm-dd "
                                       required
                                       name="date_of_joining"
                                       class="form-control datepicker"
                                        value="{{$employeeArray->date_of_joining}}">
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea class="form-control"
                            required="true"
                             name="bio">
                             {{$employeeArray->bio}}</textarea>
                        </div>
                        <div >
                        <button class="mt-2 btn btn-primary text-center btn-blue"type="submit" class="">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
