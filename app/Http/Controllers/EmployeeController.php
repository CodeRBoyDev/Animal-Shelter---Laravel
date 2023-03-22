<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Redirect;
use View;
use Validator;
use DB;
use Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all()->where('employee_type','=',null);
        $admin = Employee::all()->where('employee_type','=','admin');
        return View::make('employee.index',compact('employee','admin'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'employee_name'=>'required|min:4|',
            'employee_age'=>'required|numeric',
            'employee_gender'=>'required|min:3',
            'employee_phone'=>'required|numeric|min:4',
            'employee_address'=>'required|min:4',
            'email'=>'required|email|min:4',
            'password'=>'required|min:5',
            ];
        $messages = [
            'required' => 'Ang :attribute field na ito ay kailangan',
            'min' => 'Masyadong maigsi ang :attribute',
            'numeric' => 'Mga numero lang ang kailangan',
            'alpha' => 'Mga letra lamang ang kailangan',
        ];
            $validator = Validator::make($request->all(),$rules, $messages);

        
        if($validator->passes()){
            $employee = new Employee ([
        'employee_name' => $request->input('employee_name'),
        'employee_age' => $request->input('employee_age'),
        'employee_gender' => $request->input('employee_gender'),
        'employee_phone' => $request->input('employee_phone'),
        'employee_address' => $request->input('employee_address'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
        ]);
        $employee->save();
           return Redirect::to('employee')->with('success','You have been successfully registered!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return View::make('injury.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return View::make('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $rules = [
            'employee_name'=>'required|min:4|',
            'employee_age'=>'required|numeric',
            'employee_gender'=>'required|min:3',
            'employee_phone'=>'required|numeric|min:4',
            'employee_address'=>'required|min:4',
            'email'=>'required|email|min:4',
            'password'=>'required|min:5',
            ];
        $messages = [
            'required' => 'Ang :attribute field na ito ay kailangan',
            'min' => 'Masyadong maigsi ang :attribute',
            'numeric' => 'Mga numero lang ang kailangan',
            'alpha' => 'Mga letra lamang ang kailangan',
        ];
            $validator = Validator::make($request->all(),$rules, $messages);

        
        if($validator->passes()){

        $employee->employee_name = $request->employee_name;
        $employee->employee_age = $request->employee_age;
        $employee->employee_gender = $request->employee_gender;
        $employee->employee_phone  = $request->employee_phone;
        $employee->employee_address  = $request->employee_address;
        $employee->email  = $request->email;
        $employee->password  = Hash::make($request->password);
        $employee->save();


        $employee->update();
        return Redirect::route('employee.index')->with('success','employee updated!');
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return Redirect::to('employee')->with('success','employee Deleted!');
    }
}
