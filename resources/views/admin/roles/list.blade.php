@extends('admin.layout.master')
  @section('content')


    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/datatable/dataTables.bootstrap.min.css ') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->





  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>{{ $page_name }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">

                 @if($message = Session::get('success'))
                 <div class="alert alert-success">

                  {{ $message }}

                 </div>

                 @endif

                        <div class="card-header">
                            <strong class="card-title">{{ $page_name }}</strong>

 <a href="{{ url('/role/create') }}" class="btn btn-primary pull-right">Create</a>

                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>display name</th>
                        <th>description</th>
                        <th>permissions</th>

                         <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $i=>$row)
                      <tr>

                        <td>{{ ++$i }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->display_name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>
                         @if($row->perms())
                             <ul style="margin-left: 20px">
                     	@foreach($row->perms()->get() as $permission)

                     	<li> {{ $permission->name }} </li>
                     	@endforeach
                     </ul>
                      @endif</td>

                        <td><a href="{{ url('role/edit/'.$row->id) }} " class="btn btn-primary">Edit</a>
                         {{ Form::open(['method'=>'DELETE','url'=>['role/delete/'.$row->id],'style'=>'display:inline' ]) }}
                         {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                         {{ Form::close() }}
                         </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div>






@endsection
