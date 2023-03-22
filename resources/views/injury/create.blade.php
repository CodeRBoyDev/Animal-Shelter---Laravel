@extends('layouts.master')

@section('content')

{!!Form::open(['route'=>['injury.store']])!!}
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
                                                  <h4 class="modal-title" style="margin-left:30%"><i class="fa fa-plus"> Add injury</i></h4>
                                                  <button onClick="window.location='{{ Route('injury.index') }}';" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                  </button>
                                                </div>
                                                <div class="card card-primary">
                                                   <div class="card-body">
                                                        <div class="row">
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('injury_name', 'Name:', ['class' => 'awesome']); !!}{!! Form::label('injury', '*', ['style' => 'color:red;']); !!}
                                                            {!! Form::text('injury_name',null,array('placeholder'=>'Enter Name','autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                                @if($errors->has('injury_name'))
                                                                <small style="color:red;" >{{$errors->first('injury_name')}}</small>
                                                                @endif
                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('injury_description', 'Description:', ['class' => 'awesome']); !!}{!! Form::label('injury', '*', ['style' => 'color:red;']); !!}
                                                            {!! Form::textarea('injury_description', null, ['class'=>'form-control']) !!}
                                                                @if($errors->has('injury_description'))
                                                                <small style="color:red;" >{{$errors->first('injury_description')}}</small>
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
                                                    
                                                      {!!Form::close()!!}
                                                      
@endsection