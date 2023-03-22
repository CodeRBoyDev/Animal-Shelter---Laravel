
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
                    <div class="col-md-2"><h5 class="card-title"><b>injury PROFILE</b></h5></div>
                       <div class="col-md-5"></div>
                  </div>
              </div>
              
<div style="background-color: #dbc1ac"  class="card-body">
        <div  class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                    <a href="{{ route('injury.index') }}"><button style="background-color: #967259" type="button"  class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fas fa-arrow-left"> Back</i> 
                        </button></a>
                                    </h3>
                                              </div>
                                              <!-- /.card-header -->
                                              
                                              <div class="card-body">
                                              <div class="pull-left">
                                              <h3>Details:</h3>
                                             <hr>
                                             <strong>Id:</strong> {{$injury->id}}
                                             <hr>
                                             <strong>Name:</strong> {{$injury->injury_name}}
                                             <hr>
                                             <strong>Type:</strong> {{$injury->injury_description}}
                                             <hr>
                                             <div class="col-sm"><h1>Animals with this injury:</h1> 
                                             @foreach ($injury_animal as $injury_animals)  
                                             <br>{{$injury_animals}}
                                             @endforeach
                                             <br>
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