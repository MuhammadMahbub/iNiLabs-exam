<?php

namespace App\Http\Controllers;

use App\Mail\EmployeeMail;
use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');
        $sortOrder = $request->input('sort', 'asc');

        if($search) {
            $employees = Employee::when($search, function ($query, $search) {
                return $query->where('employeeName', 'LIKE', "%{$search}%")
                            ->orWhere('employeeEmail', 'LIKE', "%{$search}%");
            })
            ->paginate(3);
        }
        elseif($sortOrder){
            $employees = Employee::orderBy('employeeSalary', $sortOrder)->paginate(3);
        }
        else {
            $employees = Employee::paginate(3);
        }

        return view("index", compact('employees', 'sortOrder'));
    }

    // create employee
    public function create(){

        return view("create");
    }

    // Show employee single data
    public function show($id) {
        $employee = Employee::findOrFail($id);
        return view('show', compact('employee'));
    }

    // employee information added
    public function store(Request $request)
    {
        $request->validate([
            'employeeName' => 'required|string|max:255',
            'employeeEmail' => 'required|string|email|max:255|unique:employees',
            'employeeImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'employeeSalary' => 'required|numeric',
        ]);

        $imagePath = null;
        if ($request->hasFile('employeeImage')) {
            $image = $request->file('employeeImage');
            $img_ext = strtolower($image->getClientOriginalExtension());
            $hex_name = hexdec(uniqid());
            $img_name = $hex_name . '.' . $img_ext;
            $location = 'assets/images/employee/';
            $imagePath = $location. $img_name;
            $image->move($location, $img_name);
        }


        Employee::create([
            'employeeName' => $request->employeeName,
            'employeeEmail' => $request->employeeEmail,
            'employeeImage' => $imagePath,
            'employeeSalary' => $request->employeeSalary,
        ]);

        return redirect()->route('index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {   $employee = Employee::findOrFail($id);
        return view('edit', compact('employee'));
    }

    public function update(Request $request,  $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'employeeName' => 'required|string|max:255',
            'employeeEmail' => 'required|string|email|max:255|unique:employees,employeeEmail,' . $employee->id,
            'employeeImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'employeeSalary' => 'required|numeric',
        ]);

        $image = $request->file('employeeImage');


        if($image != ""){
            // Old image delete
            if(file_exists($employee->employeeImage)){
                unlink($employee->employeeImage);
            }

            // insert new image
            $img_ext = strtolower($image->getClientOriginalExtension());
            $hex_name = hexdec(uniqid());
            $img_name = $hex_name . '.' . $img_ext;
            $location = 'assets/images/employee/';
            $imagePath = $location. $img_name;
            $image->move($location, $img_name);
            $employee->employeeImage = $imagePath;
            $employee->save();

        }

        // Update data
        $employee->update([
            'employeeName' => $request->employeeName,
            'employeeEmail' => $request->employeeEmail,
            'employeeSalary' => $request->employeeSalary,
        ]);

        return redirect()->route('index')->with('success', 'Employee updated successfully.');
    }

    # Delete single employee
    public function delete($id)
    {

        $employee = Employee::findOrFail($id);
        if($employee->employeeImage){
            if(file_exists($employee->employeeImage)){
                unlink($employee->employeeImage);
            }
        }
        $employee->delete();

        return response()->json();
    }

    # Delete multiple employee data
    public function multipleDelete(Request $request){
        $id = $request->input('all_employee_id');

        $employees = Employee::whereIn('id', $id)->get();

        foreach ($employees as $employee) {
            $img = Employee::findOrFail($employee->id);
            if(file_exists($img->employeeImage)){
                unlink($img->employeeImage);
            }
            $img->delete();
        }

        // Delete the items from the database
        Employee::whereIn('id', $id)->delete();

        return response()->json(['success' => true]);

    }


    // send mail for every user
    public function send_mail(Request $request){

        $id = $request->input('all_employee_id');

        $employees = Employee::whereIn('id', $id)->get();

        foreach($employees as $employee) {
            Mail::to($employee->employeeEmail)->send(new EmployeeMail($employee->employeeEmail));
        }
        return response()->json(['success' => true]);
    }



}
