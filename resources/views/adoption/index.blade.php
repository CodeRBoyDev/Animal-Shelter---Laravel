
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
                    <div class="col-md-2"><h5 class="card-title"><b>Available</b></h5></div>
                       <div class="col-md-5"></div>
                  </div>
              </div>
              
<div style="background-color: #dbc1ac"  class="card-body">
        <div  class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                    <a href="{{ action('App\Http\Controllers\AdoptionController@create') }}"><button style="background-color: #967259" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"> Add Adopter</i>
                        </button></a>
                                    </h3>
                                              </div>
                                              <!-- /.card-header -->
                                              
                                              <div class="card-body">
                                                <table id="unit" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                                                  <thead>
                                                  <tr>
                                                    <th>ID</th>
                                                    <th>Picture</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Sex</th>
                                                    <th>Breed</th>
                                                    <th>Age</th>
                                                    <th>Health Status</th>
                                                    <th>Adoption</th>
                                                  </tr>
                                                  </thead>
                                                  @foreach ($animal as $animals)
                                                  <tbody style="background-color: #FFFFFF" >
                                                  <tr>
                                                     <td>{{$animals->id}}</td>
                                                    <td><img src="{{ $animals->animal_image}}" class="brand-image img-square elevation-3" width="60" ></td>
                                                    <td><a href="{{ action('App\Http\Controllers\AnimalController@show', $animals->id)}})">{{$animals->animal_name}}</a></td>
                                                    <td>{{$animals->animal_type}}</td>
                                                    <td>{{$animals->animal_sex}}</td>
                                                    <td>{{$animals->animal_breed}}</td>
                                                    <td>{{$animals->animal_age}}</td>
                                                    <td>{{$animals->status_name}}</td>
                                                    <td>{{$animals->status_names}}</td>

                                                    {{ csrf_field() }}
                                                    <!-- </a> -->
                                                    @csrf
                                                  </tr>
                                                  <tr>
                                                  </tbody>
                                                  <tfoot>
                                                  </tfoot>
                                                  @endforeach
                                                </table>
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