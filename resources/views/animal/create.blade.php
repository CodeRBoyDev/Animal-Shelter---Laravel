@extends('layouts.master')

@section('content')

{!!Form::open(['route'=>['animal.store','files'=>true],'enctype'=>'multipart/form-data'])!!}
<!-- <form role="form" id="quickForm"> -->

 <div id="addCustomer">   
<div class="modal-dialog modal-lg">
                          <div style="background-color: #ece0d1" class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" style="margin-left:37%"><i class="fa fa-plus"> Add Animal</i></h4>
                              <a style="position: absolute;left: 746px;" href="{{ Route('animal.index') }}"><button onClick="window.location='{{ Route('animal.index') }}';" class="close" data-dismiss="modal" aria-label="Close">
                                <span  aria-hidden="true">&times;</span>
                              </button><a>
                            </div>
                            <div class="card card-primary">
                              <!-- form start -->
                              
                              <form role="form" id="quickForm" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div  class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                 {!! Form::label('animal_image', 'Choose Profile:', ['class' => 'awesome']); !!}{!! Form::label('animal_name', '*', ['style' => 'color:red;']); !!}
                                                <input type="file" class="form-control" name="animal_image" value="{{old('animal_image')}}" id="Profile">
                                                @if($errors->has('animal_image'))
                                                <small style="color:red;" >{{$errors->first('animal_image')}}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div  class="col-sm-4">
                                            <div class="form-group">
                                                {!! Form::label('animal_name', 'Name:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                {!! Form::text('animal_name',null,array('placeholder'=>'Enter Animal','autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                @if($errors->has('animal_name'))
                                                <small style="color:red;" >{{$errors->first('animal_name')}}</small>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                            {!! Form::label('animal_type', 'Type:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                <!-- {!! Form::select('animal_type',['Cat' => 'Cat','Dog'=>'Dog'],null, ['class'=>'form-control','placeholder'=>'Select Type']) !!} -->
                                                <br>
                                                {!! Form::radio('animal_type','Cat') !!} Cat {!! Form::radio('animal_type','Dog') !!} Dog
                                                @if($errors->has('animal_type'))
                                                <small style="color:red;" >{{$errors->first('animal_type')}}</small>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('animal_age', 'Age:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                    {!! Form::number('animal_age',null,array('placeholder'=>'Enter Age','autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                @if($errors->has('animal_age'))
                                                <small style="color:red;" >{{$errors->first('animal_age')}}</small>
                                                @endif
                                                </div>

                                                <div class="form-group">
                                                {!! Form::label('disease', 'Disease:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                <br>
                                                @foreach ($disease as $id => $diseases) 
                                                                <div class="form-check form-check-inline">
                                                                {!! Form::checkbox('disease_id[]',$id, null, array('class'=>'form-check-input','id'=>'diseases')) !!} 
                                                                {!!Form::label('diseases', $diseases,array('class'=>'form-check-label')) !!}
                                                                </div>
                                                                @endforeach 
                                                </div>   
                                            
                                            
                                        </div>
                                        <div  class="col-sm-4">
                                            <div class="horizontal-form">
                                            <div class="form-group">
                                            {!! Form::label('animal_sex', 'Gender:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                    <!-- {!! Form::select('animal_sex',['Male' => 'Male','Female'=>'Female'],null, ['class'=>'form-control','placeholder'=>'Select Gender']) !!} -->
                                                <br>
                                                {!! Form::radio('animal_sex','Male') !!} Male {!! Form::radio('animal_sex','Female') !!} Female 
                                                @if($errors->has('animal_sex'))
                                                <small style="color:red;" >{{$errors->first('animal_sex')}}</small>
                                                @endif
                                                </div>

                                                <div class="form-group">
                                                {!! Form::label('animal_breed', 'Breed:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                {!! Form::text('animal_breed',null,array('placeholder'=>'Enter Breed','autofocus required','size'=>'40','class'=>'form-control')) !!}
                                                @if($errors->has('animal_breed'))
                                                <small style="color:red;" >{{$errors->first('animal_breed')}}</small>
                                                @endif    
                                                </div>

                                                <div class="form-group">
                                                {!! Form::label('Rescuer', 'Rescuer:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                {!! Form::select('rescuer_id', $rescuer,null,['placeholder'=>'Select Rescuer','class'=>'form-control']) !!}
                                                
                                                @if($errors->has('rescuer_id'))
                                                <small style="color:red;" >{{$errors->first('rescuer_id')}}</small>
                                                @endif
                                                </div>

                                                <div class="form-group">
                                                {!! Form::label('injury', 'Injury:', ['class' => 'awesome']); !!}{!! Form::label('animal', '*', ['style' => 'color:red;']); !!}
                                                <br>
                                                @foreach ($injury as $id => $injurys) 
                                                                <div class="form-check form-check-inline">
                                                                {!! Form::checkbox('injury_id[]',$id, null, array('class'=>'form-check-input','id'=>'injurys')) !!} 
                                                                {!!Form::label('injurys', $injurys,array('class'=>'form-check-label')) !!}
                                                                </div>
                                                                @endforeach 
                                                </div>

                                                
                                                
                                                
                                                
                                                <div class="form-group" style="margin-left:20%">
                                                    <button onClick="window.location='{{ Route('animal.index') }}';"  class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> Cancel</button>
                                                    {!! Form::button('<i class="fa fa-check"> Submit</i>', array('type'=>'submit','class' => 'btn btn-primary btn-md')) !!}
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
                                                defaultPreviewContent: '<img src="{{ asset('dist/img/paw.png') }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:220px; height:180px">',
                                                allowedFileExtensions: ["jpg", "png", "gif","jpeg"]
                                            });
                                        </script>
                                    <script type="text/javascript">
                                    (function () {
                                                    var previous;

                                                    $("select[name=animal_sex]").focus(function () {
                                                        // Store the current value on focus, before it changes
                                                        previous = this.value;
                                                    }).change(function() {
                                                        // Do soomething with the previous value after the change
                                                        document.getElementById("log").innerHTML = "<b>Previous: </b>"+previous;
                                                        
                                                        previous = this.value;
                                                    });
                                                })();
                                    </script>
                                </div>

                                                   
                                                      {{ csrf_field() }}
                                                      <!-- </form> -->
                                                      {!!Form::close()!!}
                                                      
@endsection