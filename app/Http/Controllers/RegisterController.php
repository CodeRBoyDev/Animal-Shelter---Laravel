<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Validator;
use Hash;
use Redirect;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function signup()
    {
        return view('login.signup');
    }

    public function create(Request $request)
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
           return Redirect::to('signin')->with('success','You have been successfully registered!');
        }
        return redirect()->back()->withInput()->withErrors($validator);
    }
    }
