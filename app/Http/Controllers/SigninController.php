<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Session;
use Validator;

class SigninController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function postlogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:5|max:20'
            ];
        $messages = [
            'required' => 'Ang :attribute field na ito ay kailangan',
            'min' => 'Masyadong maigsi ang :attribute',
            'max' => 'Masyadong haba ang :attribute',
            'email' => 'email lamang ang kailangan',
        ];
            $validator = Validator::make($request->all(),$rules, $messages);

            
if($validator->passes()){
        $employee = Employee::where('email','=',$request->email)->first();
    
        if($employee){
        if(Hash::check($request->password, $employee->password)){

            $request->session()->put('LoggedUser',$employee->id);
            return Redirect::to('/profile');
            
        }else{
            return back()->withInput()->with('fail','Invalid Password');
        }
        
    }else{
            
            return back()->withInput()->with('fail','No account found for this email');

        }
    }
    return redirect()->back()->withInput()->withErrors($validator);

    }

    public function profile()
    {
        
        if(session()->has('LoggedUser')){
            $employee = Employee::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$employee
            ];
        }
            return view('employee.profile',$data,compact('employee'));
        }
        
    public function logout(){
        if(session()->has('LoggedUser')){

            session()->pull('LoggedUser');
            return redirect('signin');
        }
    }
}

   
        


    

    
