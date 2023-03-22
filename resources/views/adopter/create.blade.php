@extends('layouts.master')

@section('content')

{!!Form::open(['route'=>['adopter.store']])!!}
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
                                                  <h4 class="modal-title" style="margin-left:30%"><i class="fa fa-plus"> Add adopter</i></h4>
                                                  <button onClick="window.location='{{ Route('adopter.index') }}';" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                  </button>
                                                </div>
                                                <div class="card card-primary">
                                                   <div class="card-body">
                                                        <div class="row">
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="adopter_name">Name <span style="color:red;">*</span></label>
                                                                <input autofocus id="adopter_name" name="adopter_name" type="text" class="form-control" value="{{old('adopter_name')}}" placeholder="Enter Name.." required>
                                                                @if($errors->has('adopter_name'))
                                                                <small style="color:red;" >{{$errors->first('adopter_name')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="adopter_age">Age <span style="color:red;">*</span></label>
                                                                <input autofocus id="adopter_age" name="adopter_age" type="text" class="form-control" value="{{old('adopter_age')}}" placeholder="Enter Age.." required>
                                                                @if($errors->has('adopter_age'))
                                                                <small style="color:red;" >{{$errors->first('adopter_age')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="adopter_phone">Phone <span style="color:red;">*</span></label>
                                                                <input autofocus id="adopter_phone" name="adopter_phone" type="text" class="form-control" value="{{old('adopter_phone')}}" placeholder="Enter Phone.." required>
                                                                @if($errors->has('adopter_phone'))
                                                                <small style="color:red;" >{{$errors->first('adopter_phone')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="adopter_address">Address <span style="color:red;">*</span></label>
                                                                <input autofocus id="adopter_address" name="adopter_address" type="text" class="form-control" value="{{old('adopter_address')}}" placeholder="Enter Address.." required>
                                                                @if($errors->has('adopter_address'))
                                                                <small style="color:red;" >{{$errors->first('adopter_address')}}</small>
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
                                                    
                                                      {!!Form::close()!!}
                                                      
@endsection