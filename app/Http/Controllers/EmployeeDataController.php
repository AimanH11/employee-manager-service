<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Services\EmployeeService;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $employeeService;

    public function __construct(

        EmployeeService $employeeService
    ) {
        $this->employeeService = $employeeService;
    }
    public function index()
    {


        $data =  $this->employeeService->getEmployees();

        return view('employees.index')->with('employeeArray', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->employeeService->createEmployee($request);

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $data =  $this->employeeService->getEmployee($id);
        return view('employees.edit')->with('employeeArray',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $id)
    {

        $data = $this->employeeService->updateEmployee( $request, $id);
        $request->session()->flash('msg', 'Employee updated sucessfully');
        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $this->employeeService->deleteEmployee($id);
        $request->session()->flash('msg', 'Employee updated sucessfully');
        return view('home');

    }
}
