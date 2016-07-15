@extends('admin/layout')
@section('content')

    <!-- Main content -->
    <section class="content">
       <div class="col-md-12">
	 @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
                 <h3 class="box-title"><i class="fa fa-reply"></i> Send Template</h3>
                 <div class="pull-right"> <a href="{{ url('admin/template')}}" class="btn btn-default">Back</a></div>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <table  class="table table-bordered table-striped">
               
                <tbody>               
                    <tr>
                       <td>Subject</td>                               
                       <td>{{ $template->subject }}</td> 
                    </tr>  
                    <tr>
                        <td>Message</td>                               
                        <td>{!! $template->content !!}</td> 
                    </tr>  
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
            <!-- form start -->
            <form role="form" action="{{url('/admin/template/sent')}}" method="post" enctype= "multipart/form-data">
                 {{ csrf_field() }}
                  <input type="hidden" class="form-control" id="" name="template_id" placeholder="Name" value="{{$template->id}}">
              <div class="box-body">
			 
               <div class="row">
                <div class="col-xs-5">
                  <select name="newsletter[]" id="multiselect"  class="form-control" size="8" multiple="multiple">
                      @foreach ($newsletters as $news)
                        <option value="{{ $news->id }}">{{ $news->name }} ({{ $news->email }})</option>
                      @endforeach

                  </select>
                </div>
                <div class="col-xs-2">
                  <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                  <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                  <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                  <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                </div>
                <div class="col-xs-5">
                  
                  <select name="assign_newsletter[]" id="multiselect_to" class="form-control" size="8" multiple="multiple">
                     
                  </select>
                </div>
              </div>
               
             </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send</button>
                <div class="pull-right"> <a href="{{ url('admin/template/edit')}}/{{$template->id}}" class="btn btn-default">Edit Template</a></div>
              </div>
            </form>
          </div>
          <!-- /.box -->
         
        
          
        <!-- Button trigger modal -->




          <!-- Form Element sizes -->
         

        </div>

    </section>
   
  <!-- /.content-wrapper -->
  

 
@endsection	