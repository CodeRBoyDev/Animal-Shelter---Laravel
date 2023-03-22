
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
                    <div class="col-md-2"><h5 class="card-title"><b>employee CRUD</b></h5></div>
                       <div class="col-md-5"></div>
                  </div>
              </div>
              
<div style="background-color: #dbc1ac"  class="card-body">
        <div  class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                    <a href="{{ route('employee.create') }}"><button style="background-color: #967259" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"> Add employee</i>
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
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                  </tr>
                                                  </thead>
                                                  @foreach ($employee as $employees)
                                                  <tbody style="background-color: #FFFFFF" >
                                                  <tr>
                                                     <td>{{$employees->id}}</td>
                                                    <td>{{$employees->employee_name}}</td>
                                                    <td>{{$employees->employee_age}}</td>
                                                    <td>{{$employees->employee_gender}}</td>
                                                    <td>{{$employees->employee_phone}}</td>
                                                    <td>{{$employees->employee_address}}</td>
                                                      <td>
                                                      <a href="{{ action('App\Http\Controllers\EmployeeController@edit', $employees->id) }}" class="btn btn-info btn-xs"> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" ><i class="fa fa-pencil-alt"> Edit</i> 
                                                    </button></a>

                                                    <form action=" {{action('App\Http\Controllers\EmployeeController@destroy', $employees->id)}}"  method="post" class="btn btn-danger btn-xs" >
                                                    {{ csrf_field() }}
                                                        <button  name="_method" value="DELETE" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash">Delete</i></button>
                                                    </form>
                                                    @csrf
                                                </td>
                                                @endforeach
                                                  </tr>
                                                  @foreach ($admin as $admins)
                                                  <thead>
                                                  <tr>
                                                    <th>Admin</th>
                                                    <th>{{$admins->employee_name}}</th>
                                                    <th>{{$admins->employee_age}}</th>
                                                    <th>{{$admins->employee_gender}}</th>
                                                    <th>{{$admins->employee_phone}}</th>
                                                    <th>{{$admins->employee_address}}</th>
                                                    <th>Admin</th>
                                                  </tr>
                                                  @endforeach
                                                  </thead>
                                                  </tbody>
                                                  <tfoot>
                                                  </tfoot>
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