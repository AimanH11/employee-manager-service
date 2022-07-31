<?php
namespace App\Services;

use App\Models\Employees;
use Illuminate\Http\Request;

/**
 * Class EmployeeService.
 */
class EmployeeService
{
    private $employeeModel;
    public function __construct(Employees $employeeModel){
        $this->employeeModel= $employeeModel;
    }
        public  function getEmployees(){
             $result = $this->employeeModel->all();

              return $result;
            }
       public function createEmployee(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
        ];

        $result = $this->employeeModel->create($data);

        return $result;
       }
       public function getEmployee($id){
        $result = $this->employeeModel->find($id);

        return $result;
       }
       public function updateEmployee(Request $request, $id)
    {
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

        $data =$this->employeeModel->where('id', $id)->delete();

        return $data;

    }


}
