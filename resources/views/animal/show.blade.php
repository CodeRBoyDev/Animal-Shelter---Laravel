
@extends('layouts.master')

@section('content')


<!-- Main content -->
<section class="content">
      <div class="container-fluid">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div style="background-color: #967259;" class="card-header border-0">
                   <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2"><h5 class="card-title"><b>ANIMAL PROFILE</b></h5></div>
                       <div class="col-md-5"></div>
                  </div>
              </div>
              
<div style="background-color: #dbc1ac"  class="card-body">
        <div  class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                    <a href="{{ route('animal.index') }}"><button style="background-color: #967259" type="button"  class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fas fa-arrow-left"> Back</i> 
                        </button></a>
                                    </h3>
                                              </div>
                                              <!-- /.card-header -->
                                              
                                              <div class="card-body">
                                              <div class="pull-left">
                                              <h3>Profile:</h3>
                                             <img src="{{ asset($animal->animal_image) }}" alt="Your Avatar" class="img img-responsive" style="left-margin:auto; width:220px; height:180px">
                                             <hr>
                                             <div class="row">
                                             <div class="col-sm">                                             
                                             <strong>Id:</strong> {{$animal->id}}
                                             <hr>
                                             <strong>Name:</strong> {{$animal->animal_name}}
                                             <hr>
                                             <strong>Type:</strong> {{$animal->animal_type}}
                                             <hr>
                                             <strong>Gender:</strong> {{$animal->animal_sex}}
                                             <hr>
                                             <strong>Breed:</strong> {{$animal->animal_breed}}
                                             <hr>
                                             <strong>Age:</strong> {{$animal->animal_age}}</div>
                                             <div class="col-sm"><strong>Injury:</strong> 
                                             @forelse ($injury_animal as $injury_animals)  
                                             <br>{{$injury_animals}}
                                             @empty
                                             {!! Form::label('animal', 'No Injury', ['style' => 'color:green;']); !!}
                                             @endforelse
                                             <br>
                                             <strong>Disease:</strong> 
                                             @forelse ($disease_animal as $disease_animals)  
                                             <br>{{$disease_animals}}
                                             @empty
                                             {!! Form::label('animal', 'No Disease', ['style' => 'color:green;']); !!}
                                             @endforelse
                                             <br>
                                             <strong>Health Status:</strong> 
                                             @foreach ($health_status_animal as $health_status_animals)  
                                             <br>{{$health_status_animals}}
                                             @endforeach
                                             <br>
                                            <strong>Adoption:</strong> 
                                             @foreach ($adoption_status_animal as $adoption_status_animals)  
                                             <br>{{$adoption_status_animals}}
                                             @endforeach
                                            </div>
                                            
                                            

                                             
                                            </div>
           
                                              <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                                    <!-- /.card-body -->
                            <div class="card-footer">
                        </div>
                  </form>

    @endsection