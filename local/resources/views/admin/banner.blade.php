@extends('admin/layout')
@section('content')

    <!-- Main content -->
    <section class="content">
	@if(Session::has('flash_message'))
		<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ Session::get('flash_message') }}
              </div>
     
   @endif
       <div class="col-md-12">
	     
          <!-- /.box -->
            
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-list"></i> Banner List</h3>
		<a class="add-link btn btn-success btn-flat btn-grid" href="{{url('/admin/banner/add')}}"><i class="fa fa-plus-square"></i> Add Banner</a>	  
            </div>
            <!-- /.box-header -->
            @if(count($banner_data)>0)
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                 
                  <th>Action </th>                 
                </tr>
                </thead>
                <tbody>
                <?php foreach($banner_data as $val){ ?>
                <tr>
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->title }}</td>
                  
                  <td><a href="{{url('admin/banner/edit/')}}/{{ $val->id }}" title="Edit"><i class="fa fa-edit" style="cursor:pointer"></i></a> 
                 
                  </td>
                  
                </tr>
                <?php } ?>
                </tbody>
                
              </table>
            </div>
            @endif
            <!-- /.box-body -->
          </div>
         
          <!-- /.box -->
        <!-- Button trigger modal -->




          <!-- Form Element sizes -->
         

        </div>

    </section>
   
  <!-- /.content-wrapper -->
@endsection	