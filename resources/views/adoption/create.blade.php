@extends('layouts.master')

@section('content')

{!!Form::open(['route'=>['adoption.store']])!!}
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
                                                  <h4 class="modal-title" style="margin-left:30%"><i class="fa fa-plus"> Add Adoption</i></h4>
                                                  <button onClick="window.location='{{ Route('adoption.index') }}';" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                  </button>
                                                </div>
                                                <div class="card card-primary">
                                                   <div class="card-body">
                                                        <div class="row">
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('adopter', 'adopter:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                {!! Form::select('adopter_id', $adopter,null,['placeholder'=>'Select adopter','class'=>'form-control']) !!}
                                                <p class="mb-0">Add new adopter:
               			 <a href="{{ Route('adopter.create') }}" class="text-center">Click here</a>
             		 </p>
                                                @if($errors->has('adopter_id'))
                                                <small style="color:red;" >{{$errors->first('adopter_id')}}</small>
                                                @endif

                                                            </div>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('animal', 'Avaiblabe for Adoption:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                        <br>
                                                        @foreach ($animal as $id => $animals) 
                                                                        <div class="form-check form-check-inline">
                                                                        {!! Form::checkbox('animal_id[]',$id, null, array('class'=>'form-check-input','id'=>'animals')) !!} 
                                                                        {!!Form::label('animals', $animals,array('class'=>'form-check-label')) !!}
                                                                  
                                                                      </div>
                                                                        @endforeach 
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