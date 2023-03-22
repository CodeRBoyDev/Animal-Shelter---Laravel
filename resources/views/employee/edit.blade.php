@extends('layouts.master')

@section('content')

{!! Form::model($employee,['method'=>'PATCH','route' => ['employee.update',$employee->id]]) !!}
<!-- <form role="form" id="quickForm"> -->

<form role="form" id="quickForm">
                <div class="card-body">
                    <div  class="row">
                        <div  class="col-12">
                              <div class="card-header">
                                       
                                            <div class="modal-dialog" style="width:450px !important;">
                                              <form action="">
                                              <div style="background-color: #ece0d1" class="modal-content">
                                                <div class="modal-header">
                                                  <h4 class="modal-title" style="margin-left:30%"><i class="fa fa-plus"> Add employee</i></h4>
                                                  <button onClick="window.location='{{ Route('employee.index') }}';" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                  </button>
                                                </div>
                                                <div class="card card-primary">
                                                   <div class="card-body">
                                                        <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('employee', 'Name: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
	                                                          {!! Form::text('employee_name',null,array('class'=>'form-control','placeholder'=>'Enter Name','autofocus required','size'=>'40')) !!}

                                                                @if($errors->has('employee_name'))
                                                                <small style="color:red;" >{{$errors->first('employee_name')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('employee', 'Age: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
					                                      	{!! Form::text('employee_age',null,array('class'=>'form-control','placeholder'=>'Enter Age','autofocus required','size'=>'40')) !!}
                                                                @if($errors->has('employee_age'))
                                                                <small style="color:red;" >{{$errors->first('employee_age')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('employee', 'Gender: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
                                                                  {!! Form::radio('employee_gender','Male') !!} Male {!! Form::radio('employee_gender','Female') !!} Female
                                                                @if($errors->has('employee_phone'))
                                                                <small style="color:red;" >{{$errors->first('employee_phone')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('employee', 'Phone: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
                                                          {!! Form::text('employee_phone',null,array('class'=>'form-control','placeholder'=>'Enter Phone','autofocus required','size'=>'40')) !!}
                                                          @if($errors->has('employee_phone'))
                                                            <small style="color:red;" >{{$errors->first('employee_phone')}}</small>
                                                            @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('employee', 'Address: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
                                                            
                                                            {!! Form::text('employee_address',null,array('class'=>'form-control','placeholder'=>'Enter Address','autofocus required','size'=>'40')) !!}
                                                            
                                                            @if($errors->has('employee_address'))
                                                              <small style="color:red;" >{{$errors->first('employee_address')}}</small>
                                                              @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('employee', 'Email: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
                                                                      
                                                                        {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>'Enter Email','autofocus required','size'=>'40')) !!}
                                                                     
                                                                        @if($errors->has('email'))
                                                                          <small style="color:red;" >{{$errors->first('email')}}</small>
                                                                          @endif
                                                                    
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('password', 'Password: ', ['class' => 'awesome']); !!}{!! Form::label('animal', ' *', ['style' => 'color:red;']); !!}	
                                                              
                                                                {{ Form::password('password', array('placeholder'=>'Enter Password', 'class'=>'form-control' ) ) }}
                                                                @if($errors->has('password'))
                                                                  <small style="color:red;" >{{$errors->first('password')}}</small>
                                                                  @endif
                                                            </div>
                                                          </div>

                                                      </div>
                                                    </div>
                                                      </div>
                                                      <div class="form-group" style="margin-left:5%">
                                                    {!! Form::button('<i class="fa fa-check"> Submit</i>', array('type'=>'submit','class' => 'btn btn-primary')) !!}
                                                     </div>
                                                      </div>
                                                      
                                                      </form>

                                                   
                                                      {{ csrf_field() }}
                                                      {{ csrf_field() }}
                                                      <!-- </form> -->
                                                      {!!Form::close()!!}
                                                      
@endsection