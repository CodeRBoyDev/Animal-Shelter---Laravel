
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
                    <!-- <a href="{{ route('contact.create') }}"><button style="background-color: #967259" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#addCustomer"><i class="fa fa-plus"> Add contact</i> -->
                        </button></a>
                                    </h3>
                                              </div>
                                              <!-- /.card-header -->
                                              
                                              <div class="card-body">
                                                <table id="unit" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                                                  <thead>
                                                  <tr>
                                                    <th>sender</th>
                                                    <th>subject</th>
                                                    <th>email</th>
                                                    <th>action</th>
                                                  </tr>
                                                  </thead>
                                                  @foreach ($contact as $contacts)
                                                  <tbody style="background-color: #FFFFFF" >
                                                  <tr>
                                                    <td>{{$contacts->inquiry_name}}</td>
                                                    <td><a href="{{ action('App\Http\Controllers\ContactController@show', $contacts->id)}})">{{$contacts->inquiry_subject}}</a></td>
                                                    <td>{{$contacts->inquiry_email}}</td>
                                                      <td>
                                                      <!-- <a href="{{ action('App\Http\Controllers\ContactController@edit', $contacts->id) }}" class="btn btn-info btn-xs"> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" ><i class="fa fa-pencil-alt"> Edit</i> 
                                                    </button></a> -->

                                                    <form action=" {{action('App\Http\Controllers\ContactController@destroy', $contacts->id)}}"  method="post" class="btn btn-danger btn-xs" >
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
                                        {{$contact->links()}}
                                    </div>
                                </div>
                                    <!-- /.card-body -->
                            <div class="card-footer">
                        </div>
                  </form>

    @endsection