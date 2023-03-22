@extends('layouts.masterhome')

@section('content')

{!!Form::open(['route'=>['signup.create']])!!}
<!-- <form role="form" id="quickForm"> -->

<div  class="contact">

		<div class="container">
			<div class="contact-top">
				<h2>Sign up</h2>
			</div>
			<div class="contact-bottom">
				 <div class="contact-text">
					<div class="col-md-3 contact-right">
						<div class="address">
						<img src="{{ asset('images/shelter.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
            <img src="{{ asset('images/paw.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
            <img src="{{ asset('images/paw.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
            <img src="{{ asset('images/paw.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
            
							
						</div>
					</div>
					<div class="col-md-20 contact-left">
						<form>
            {!! Form::label('employee', 'Name: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('employee_name',null,array('placeholder'=>'Enter Name','autofocus required','size'=>'40')) !!}
            <br>
            @if($errors->has('employee_name'))
              <small style="color:red;" >{{$errors->first('employee_name')}}</small>
              @endif
            <br>
            {!! Form::label('employee', 'Age: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('employee_age',null,array('placeholder'=>'Enter Age','autofocus required','size'=>'40')) !!}
            <br>
            @if($errors->has('employee_age'))
              <small style="color:red;" >{{$errors->first('employee_age')}}</small>
              @endif
            <br> <br>
            {!! Form::label('employee', 'Gender: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
            {!! Form::radio('employee_gender','Male') !!} Male {!! Form::radio('employee_gender','Female') !!} Female
            <br>
            @if($errors->has('employee_gender'))
              <small style="color:red;" >{{$errors->first('employee_gender')}}</small>
              @endif
            <br>
            {!! Form::label('employee', 'Phone: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('employee_phone',null,array('placeholder'=>'Enter Phone','autofocus required','size'=>'40')) !!}
            <br>
            @if($errors->has('employee_phone'))
              <small style="color:red;" >{{$errors->first('employee_phone')}}</small>
              @endif
            <br>
            {!! Form::label('employee', 'Address: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('employee_address',null,array('placeholder'=>'Enter Address','autofocus required','size'=>'40')) !!}
            <br>
            @if($errors->has('employee_address'))
              <small style="color:red;" >{{$errors->first('employee_address')}}</small>
              @endif
            <br>
            {!! Form::label('employee', 'Email: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('email',null,array('placeholder'=>'Enter Email','autofocus required','size'=>'40')) !!}
            <br>
            @if($errors->has('email'))
              <small style="color:red;" >{{$errors->first('email')}}</small>
              @endif
            <br>
            {!! Form::label('password', 'Password: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('password',null,array('placeholder'=>'Enter Password','autofocus required','size'=>'40')) !!}
            <br>
            @if($errors->has('password'))
              <small style="color:red;" >{{$errors->first('password')}}</small>
              @endif
            <br>
						<div class="submit-btn">								
									<input type="submit" value="LOGIN">							
							</div> <br>
							<p class="mb-0">Already have an account?
               			 <a href="{{ Route('login.form') }}" class="text-center">Sign in here</a>
             		 </p>
						</form>
					</div>						
					<div class="clearfix"></div>
			 </div>
				
		 </div>
	 </div>
</div>	
                                                   
                                                      {{ csrf_field() }}
                                                    
                                                      {!!Form::close()!!}
                                                      
@endsection