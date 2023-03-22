@extends('layouts.master')

@section('content')

{!! Form::model($rescuer,['method'=>'PATCH','route' => ['rescuer.update',$rescuer->id]]) !!}
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
                                                  <h4 class="modal-title" style="margin-left:30%"><i class="fa fa-plus"> Edit Rescuer</i></h4>
                                                  <button onClick="window.location='{{ Route('rescuer.index') }}';" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                  </button>
                                                </div>
                                                <div class="card card-primary">
                                                   <div class="card-body">
                                                        <div class="row">
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="rescuer_name">Name <span style="color:red;">*</span></label>
                                                                <!-- <input autofocus id="rescuer_name" name="rescuer_name" type="text" class="form-control" value="{{old('rescuer_name')}}" placeholder="Enter Name.." required> -->
                                                                {!! Form::text('rescuer_name',$rescuer->rescuer_name,array('autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                                @if($errors->has('rescuer_name'))
                                                                <small style="color:red;" >{{$errors->first('rescuer_name')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="rescuer_age">Age <span style="color:red;">*</span></label>
                                                                <!-- <input autofocus id="rescuer_age" name="rescuer_age" type="text" class="form-control" value="{{old('rescuer_age')}}" placeholder="Enter Age.." required> -->
                                                                {!! Form::text('rescuer_age',$rescuer->rescuer_age,array('autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                                @if($errors->has('rescuer_age'))
                                                                <small style="color:red;" >{{$errors->first('rescuer_age')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="rescuer_phone">Phone <span style="color:red;">*</span></label>
                                                                <!-- <input autofocus id="rescuer_phone" name="rescuer_phone" type="text" class="form-control" value="{{old('rescuer_phone')}}" placeholder="Enter Phone.." required> -->
                                                                {!! Form::text('rescuer_phone',$rescuer->rescuer_phone,array('autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                                @if($errors->has('rescuer_phone'))
                                                                <small style="color:red;" >{{$errors->first('rescuer_phone')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="rescuer_address">Address <span style="color:red;">*</span></label>
                                                                <!-- <input autofocus id="rescuer_address" name="rescuer_address" type="text" class="form-control" value="{{old('rescuer_address')}}" placeholder="Enter Address.." required> -->
                                                                {!! Form::text('rescuer_address',$rescuer->rescuer_address,array('autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                                @if($errors->has('rescuer_address'))
                                                                <small style="color:red;" >{{$errors->first('rescuer_address')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                            

                                                      </div>
                                                    </div>
                                                      </div>
                                                        <div class="modal-footer justify-content-between">
                                                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                                        </div>
                                                      </div>
                                                      </form>

                                                   
                                                      {{ csrf_field() }}
                                                    
                                             
                                                      
@endsection