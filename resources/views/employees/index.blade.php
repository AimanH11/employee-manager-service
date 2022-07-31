@extends('layouts.app')

@section('content')
<div class="container-fluid bg-info p-3 position-relative">
    <h3 class="text-center">Employee Details</h3>
    <div class="position-absolute top-0 end-0">
        <a class="btn btn-success " href="{{ route('employees.create') }}">
            <i class="fa fa-plus" aria-hidden="true">ADD</i>
        </a>
    </div>
</div>
<div class="mt-0">
    <table class="table table-primary table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date of Joining</th>
                <th scope="col">Bio</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        @foreach($employeeArray as $employee)
        <tr>
            <td> {{$employee->id}} </td>
            <td> {{$employee->name}} </td>
            <td> {{$employee->email}} </td>
            <td>{{$employee->date_of_joining}}</td>
            <td> {{$employee->bio}} </td>

            <td>

            <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                 <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-info"> <i class="fa fa-edit  fa-md"></i>Edit</a>
                @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash fa-md"></i>Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>

    @endsection
