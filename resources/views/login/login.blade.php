@extends('layouts.masterhome')

@section('content')

{!!Form::open(['route'=>['login.postlogin']])!!}
<!-- <form role="form" id="quickForm"> -->

<div  class="contact">
		<div class="container">
		@if ( Session::has('fail'))
      <div class="alert alert-success">
        <p>{{ Session::get('fail') }}</p>
      </div><br />
     @endif
	 @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
			<div class="contact-top">
				<h2>LOGIN</h2>
			</div>
			<div class="contact-bottom">
				 <div class="contact-text">
					<div class="col-md-3 contact-right">
						<div class="address">
						<img src="{{ asset('images/shelter.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
            <img src="{{ asset('images/paw.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
							
						</div>
					</div>
					<div class="col-md-18 contact-left">
						<form>
						@csrf
						{!! Form::label('animal_type', 'Email: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('email',null,array('placeholder'=>'Enter email','autofocus required','size'=>'40')) !!}
						<br>
						@if($errors->has('email'))
              <small style="color:red;" >{{$errors->first('email')}}</small>
              @endif
			  <br>
						{!! Form::label('animal_type', 'Password: ', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}	
						<br>
						{!! Form::text('password',null,array('placeholder'=>'Enter password','autofocus required','size'=>'40')) !!}
						<br>
						@if($errors->has('password'))
              <small style="color:red;" >{{$errors->first('password')}}</small>
              @endif
						<div class="submit-btn">								
									<input type="submit" value="LOGIN">							
							</div> <br>
							<p class="mb-0">Don't have an account?
               			 <a href="{{ Route('signup.form') }}" class="text-center">Sign up here</a>
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