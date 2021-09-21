  @extends('admin.layout.master')
  @section('content')



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
     {{-- @permission(['Post Add','All'])               --}}
 <a href="{{ url('/category/create') }}" class="btn btn-primary pull-right">Create</a>         
    {{-- @endpermission --}}
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        
                         <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($data as $i=>$row)
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $row->name }}</td>
                        <td> 
                     {{ Form::open(['method'=>'PUT','url'=>['/category/status/'.$row->id],'style'=>'display:inline' ]) }}
                     @if($row->status === 1)
                       {{ Form::submit('Unpublish',['class'=>'btn btn-danger']) }}
                       @else
                       {{ Form::submit('Publish',['class'=>'btn btn-success']) }}
                     @endif
                       {{ Form::close() }}

                         </td>
                        
                        <td>
                          {{-- @permission(['Post Add','All','Post Update'])  --}}
           <a href="{{ url('/category/edit/'.$row->id) }} " class="btn btn-primary">Edit</a>
           {{-- @endpermission --}}
           {{-- @permission(['Post Add','All'])  --}}
           {{ Form::open(['method'=>'DELETE','url'=>['/category/delete/'.$row->id],'style'=>'display:inline' ]) }}
           {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
           {{ Form::close() }}
           {{-- @endpermission --}}

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
        </div><!-- .content -->

    





@endsection