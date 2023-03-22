@extends('layouts.masterhome')

@section('content')

{!!Form::open(['route'=>['contact.store']])!!}
<!-- <form role="form" id="quickForm"> -->

<div class="contact">
		<div class="container">
		@if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
			<div class="contact-top">
				<h2>Contact</h2>
			</div>
			<div class="contact-bottom">
				 <div class="contact-text">
					<div class="col-md-3 contact-right">
						<div class="address">
							<img src="{{ asset('images/shelter.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
            <img src="{{ asset('images/paw.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:210x; height:200px">
						</div>
						<div class="clearfix"></div>
					</div>
					@if($errors->has('inquiry_name'))
              <small style="color:red;" >{{$errors->first('inquiry_name')}}</small>
              @endif
			  <br>
			  @if($errors->has('inquiry_email'))
              <small style="color:red;" >{{$errors->first('inquiry_email')}}</small>
              @endif
			  <br>
			  @if($errors->has('inquiry_subject'))
              <small style="color:red;" >{{$errors->first('inquiry_subject')}}</small>
              @endif
			  @if($errors->has('inquiry_message'))
              <small style="color:red;" >{{$errors->first('inquiry_message')}}</small>
              @endif
			  <br>
					<div class="col-md-9 contact-left">
						<form>
						{!! Form::text('inquiry_name',null,array('placeholder'=>'Enter Name','autofocus required','size'=>'40')) !!}
						
						{!! Form::text('inquiry_email',null,array('placeholder'=>'Enter Email','autofocus required','size'=>'40')) !!}
						
						{!! Form::text('inquiry_subject',null,array('placeholder'=>'Enter Subject','autofocus required','size'=>'40')) !!}
						
						{!! Form::textarea('inquiry_message', null, ['placeholder'=>'Enter Message','class'=>'form-control']) !!}
						
						<div class="submit-btn">								
									<input type="submit" value="SUBMIT">							
							</div>
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