
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
                    <div class="col-md-2"><h5 class="card-title"><b>MAIL</b></h5></div>
                       <div class="col-md-5"></div>
                  </div>
              </div>
              
<div style="background-color: #dbc1ac"  class="card-body">
        <div  class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                    <a href="{{ route('contact.index') }}"><button style="background-color: #967259" type="button"  class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fas fa-arrow-left"> Back</i> 
                        </button></a>
                                    </h3>
                                              </div>
                                              <!-- /.card-header -->
                                              
                                              <div class="card-body">
                                              <div class="pull-left">
                                              <h3><strong>Subject: </strong>{{$contact->inquiry_subject}}</h3>
                                             <hr>
                                             <p>sender: {{$contact->inquiry_name}}</p>
                                             <hr>
                                             <p>email: {{$contact->inquiry_email}}</p> 
                                             <hr>
                                             <p>{!! nl2br($contact->inquiry_message) !!}</p>
                                             
                                             
                                          
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