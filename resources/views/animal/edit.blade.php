@extends('layouts.master')

@section('content')

{!!Form::model($animal,['route' => ['animal.update','files'=>true,$animal->id],'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
<!-- <form role="form" id="quickForm"> -->

 <div id="addCustomer">   
<div class="modal-dialog modal-lg">
                          <div  class="modal-content">
                            <div style="background-color: #ece0d1" class="modal-header">
                              <h4  class="modal-title" style="margin-left:37%"><i class="fa fa-plus"> Edit Animal</i></h4>
                              <a style="position: absolute;left: 746px;"><button onClick="window.location='{{ Route('animal.index') }}';" type="hidden" class="close" data-dismiss="modal" aria-label="Close">
                                <span  aria-hidden="true">&times;</span>
                              </button><a>
                            </div>
                            <div style="background-color: #FFFFF" class="card card-primary">
                              <!-- form start -->
                              
                              <form role="form" id="quickForm" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div  class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            {!! Form::label('animal_image', 'Choose Profile:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                <input type="file" class="form-control" name="animal_image" id="Profile">
                                            </div>
                                        </div>
                                        <div  class="col-sm-4">
                                            <div class="form-group">
                                            {!! Form::label('animal_name', 'Name:', ['class' => 'awesome']); !!}{!! Form::label('animal_name', '*', ['style' => 'color:red;']); !!}
                                                {!! Form::text('animal_name',$animal->animal_name,array('autofocus required','size'=>'40','class'=>'form-control')) !!}
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('animal_type', 'Type:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                {!!Form::select('animal_type',[ 'Cat'=> 'Cat', 'Dog'=> 'Dog'],$animal->animal_type,['class' => 'form-control'])!!}
                                                
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('animal_age', 'Age:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                    {!! Form::number('animal_age',null,array('placeholder'=>'Enter Age','autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                @if($errors->has('animal_age'))
                                                <small style="color:red;" >{{$errors->first('animal_age')}}</small>
                                                @endif
                                                </div>

                                                <div class="col-12">
                                                            <div class="form-group">
                                                            {!! Form::label('Disease', 'Disease:', ['class' => 'awesome']); !!}{!! Form::label('Disease', '*', ['style' => 'color:red;']); !!}
                                                            <br>
                                                                @foreach ($disease as $disease_id => $diseases) 
                                                                        <div class="form-check form-check-inline">
                                                                @if (in_array($disease_id, $disease_animal))
                                                                {!! Form::checkbox('disease_id[]',$disease_id, true, array('class'=>'form-check-input','id'=>'diseases')) !!} 
                                                                    {!!Form::label('diseases', $diseases,array('class'=>'form-check-label')) !!}
                                                                @else
                                                                {!! Form::checkbox('disease_id[]',$disease_id, null, array('class'=>'form-check-input','id'=>'diseases')) !!} 
                                                                    {!!Form::label('diseases', $diseases,array('class'=>'form-check-label')) !!}
                                                                @endif
                                                                </div>
                                                                {{-- @endforeach --}}
                                                                @endforeach 
                                                            </div>
                                                          </div>
                                            
                                        </div>
                                        <div  class="col-sm-4">
                                            <div class="horizontal-form">
                                            <div class="form-group">
                                            {!! Form::label('animal_sex', 'Gender:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                    <!-- {!!Form::select('animal_sex',[ 'Male'=> 'Male', 'Female'=> 'Female'],$animal->animal_sex,['class' => 'form-control'])!!} -->
                                                    <br>
                                                {!! Form::radio('animal_sex','Male') !!} Male {!! Form::radio('animal_sex','Female') !!} Female 
                                                    @if($errors->has('animal_sex'))
                                                <small style="color:red;" >{{$errors->first('animal_sex')}}</small>
                                                @endif
                                                </div>
                                                <div class="form-group">
                                                {!! Form::label('animal_breed', 'Breed:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                    {!! Form::text('animal_breed',$animal->animal_breed,array('autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                    
                                                </div>

                                                <div class="form-group">
                                                {!! Form::label('Rescuer', 'Rescuer:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                {!! Form::select('rescuer_id', $rescuer,null,['class'=>'form-control']) !!}
                                                </div>

                                                {!! Form::label('Injury', 'Injury:', ['class' => 'awesome']); !!}{!! Form::label('animInjuryal', '*', ['style' => 'color:red;']); !!}
                                                <br>
                                                                @foreach ($injury as $injury_id => $injurys) 
                                                                        <div class="form-check form-check-inline">
                                                                @if (in_array($injury_id, $injury_animal))
                                                                {!! Form::checkbox('injury_id[]',$injury_id, true, array('class'=>'form-check-input','id'=>'injurys')) !!} 
                                                                    {!!Form::label('injurys', $injurys,array('class'=>'form-check-label')) !!}
                                                                @else
                                                                {!! Form::checkbox('injury_id[]',$injury_id, null, array('class'=>'form-check-input','id'=>'injurys')) !!} 
                                                                    {!!Form::label('injurys', $injurys,array('class'=>'form-check-label')) !!}
                                                                @endif
                                                                </div>
                                                                {{-- @endforeach --}}
                                                                @endforeach 
                                                            </div>

                                                
                                                
                                                
                                                
                                                <div class="form-group" style="margin-left:20%">
                                                     <button onClick="window.location='{{url()->previous()}}';" class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> Cancel</button>
                                                    <!-- {{ Form::button('cancel', array ('type' => 'Cancel', 'class' => 'btn btn-danger btn-md') )  }}
                                                    <button name="btn_submit" type="submit" class="btn btn-primary btn-md"><i class="fa fa-check"></i> Submit</button> -->
                                                    {{ Form::button('<i class="fa fa-check"></i> Submit', array ('name'=>'btn_submit','type' => 'submit', 'class' => 'btn btn-primary btn-md') )  }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                       <script type="text/javascript">
                                        $("#Profile").fileinput({
                                                showCancel: false,
                                                showUpload: false,
                                                showRemove: false,
                                                browseClass: "btn btn-default",
                                                defaultPreviewContent: '<img src="{{ asset($animal->animal_image) }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:220px; height:180px">',
                                                allowedFileExtensions: ["jpg", "png", "gif","jpeg"]
                                            });
                                        </script>
                                </div>
                                                      {{ csrf_field() }}
                                                      <!-- </form> -->
                                                      {!!Form::close()!!}
                                                      
@endsection