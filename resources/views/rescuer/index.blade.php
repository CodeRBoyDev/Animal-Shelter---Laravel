
@extends('layouts.master')

@section('content')


<!-- Main content -->
<section class="content">
  @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
      <div class="container-fluid">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div style="background-color: #967259;" class="card-header border-0">
                   <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2"><h5 class="card-title"><b>RESCUER CRUD</b></h5></div>
                       <div class="col-md-5"></div>
                  </div>
              </div>
              
<div style="background-color: #dbc1ac"  class="card-body">
        <div  class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                    <a href="{{ route('rescuer.create') }}"><button style="background-color: #967259" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"> Add Rescuer</i>
                        </button></a>
                                    </h3>
                                              </div>
                                              <!-- /.card-header -->
                                              
                                              <div class="card-body">
                                                <table id="unit" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                                                  <thead>
                                                  <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Animal</th>
                                                    <th>Animal Picture</th>
                                                    <th>Action</th>
                                                  </tr>
                                                  </thead>
                                                  @foreach ($rescuer as $rescuers)
                                                  <tbody style="background-color: #FFFFFF" >
                                                  <tr>
                                                     <td>{{$rescuers->id}}</td>
                                                    <td>{{$rescuers->rescuer_name}}</td>
                                                    <td>{{$rescuers->rescuer_age}}</td>
                                                    <td>{{$rescuers->rescuer_phone}}</td>
                                                    <td>{{$rescuers->rescuer_address}}</td>
                                                    <td>{{$rescuers->animal_name}}</td>
                                                    <td><img src="{{ $rescuers->animal_image}}" class="brand-image img-square elevation-3" width="60" ></td>
                                                      <td>
                                                      <a href="{{ action('App\Http\Controllers\RescuerController@edit', $rescuers->id) }}" class="btn btn-info btn-xs"> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" ><i class="fa fa-pencil-alt"> Edit</i> 
                                                    </button></a>

                                                    <form action=" {{action('App\Http\Controllers\RescuerController@destroy', $rescuers->id)}}"  method="post" class="btn btn-danger btn-xs" >
                                                    {{ csrf_field() }}
                                                        <button  name="_method" value="DELETE" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash">Delete</i></button>
                                                    </form>
                                                    
                                                    @csrf
                                                </td>
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