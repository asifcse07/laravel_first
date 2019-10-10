@extends('layouts.admin')


@section('title')
	Dashboard | test
@endsection



@section('content')
	<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Service List</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <a href="/" target="_blank"
                class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light manual-ajax">Add New Service

            </a>
          {{--   <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">Basic Table</li>
            </ol> --}}
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-7">
            <div class="white-box">
                <h3 class="box-title">Basic Table</h3>
                {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:40%">Services</th>
                                <th style="width:25%">Status</th>
                                <th style="width:25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Deshmukh</td>
                                <td>Prohaska</td>
                                <td>@Genelia</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Deshmukh</td>
                                <td>Gaylord</td>
                                <td>@Ritesh</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sanghani</td>
                                <td>Gusikowski</td>
                                <td>@Govinda</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Roshan</td>
                                <td>Rogahn</td>
                                <td>@Hritik</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	    
    </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Add Service</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          	<form role="form" class="addServiceForm">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            	<div class="form-group">
	              	<label for="service_name"><span class="glyphicon glyphicon-home"></span> Service Name</label>
	              	<input type="text" class="form-control" id="service_name" placeholder="Enter service name" name="name">
	            </div>
            	<button type="submit" class="btn btn-success btn-block saveServiceBtn"><span class="glyphicon glyphicon-off"></span> Add</button>
          	</form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
</div> 


@endsection


@section('scripts')

@endsection