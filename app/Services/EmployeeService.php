<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
use Illuminate\Http\Request;

/**
 * Class EmployeeService.
 */
class EmployeeService
{
    private $employeeModel;
    public function __construct(Employees $employeeModel)
    {

        $this->employeeModel = $employeeModel;
    }
    public  function getEmployees()
    {
        $user_id= Auth::User()->id;
        $result = $this->employeeModel->where('user_id', $user_id)->get();


        return $result;
    }
    public function createEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:15',
            'email' => 'required|email',
            'date_of_joining' => 'required',
            'bio' =>  'required|min:5|max:255'
        ]);
        $data = [

            'name' => $request->name,
            'email' => $request->email,
            'date_of_joining' =>  $request->date_of_joining,
            'bio' => $request->bio,
            'user_id' => auth()->user()->id

        ];

        $result = $this->employeeModel->create($data);

        return $result;
    }
    public function getEmployee($id)
    {
        $result = $this->employeeModel->find($id);

        return $result;
    }
    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:15',
            'email' => 'required',
            'date_of_joining' => 'required',
            'bio' =>  'required|min:5|max:255'
        ]);
        $result = $this->employeeModel->find($id);
        $result->name = $request->input('name');
        $result->email = $request->input('email');
        $result->date_of_joining = $request->input('date_of_joining');
        $result->bio = $request->input('bio');
        $result->user_id = auth()->user()->id;
        $result->save();

        return $result;
    }
    public function deleteEmployee($id)
    {

        $data = $this->employeeModel->where('id', $id)->delete();

        return $data;
    }
}
