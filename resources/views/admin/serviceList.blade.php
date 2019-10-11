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
                <h3 class="box-title">Services</h3>
                {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
                <div class="table-responsive">
                    <table class="table serviceTbl">
                        <thead>
                            <tr>
                                <th style="width:10%">#</th>
                                <th style="width:40%">Services</th>
                                <th style="width:25%">Status</th>
                                <th style="width:25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            {{-- <div class="white-box">
                <h3 class="box-title">Add Sub Services</h3>
                <form class="form-horizontal form-material">
                    <div class="form-group">
                        <label class="col-md-12">Sub Service Name</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Johnathan Doe"
                                class="form-control form-control-line"> </div>
                    </div>
                </form>
            </div> --}}
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


<div class="modal fade" id="subServiceModal" role="dialog">
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
                <input type="hidden" name="parent_id" class="parent_id">
                <div class="form-group subServiceDiv">
                    <label for="service_name"><span class="glyphicon glyphicon-home"></span> Service Name</label>
                    <div class="inputDiv">
                        <input type="text" class="form-control" id="sub_service_name" placeholder="Enter service sub service name" name="name[]" style="width: 80%">
                        <button class="button btn addMoreSub" style="width: 20%;float: right; position: relative;bottom: 36px;">
                        <span class="glyphicon glyphicon-plus">
                        </button></span>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-success btn-block saveSubServiceBtn"><span class="glyphicon glyphicon-off"></span> Add Sub Service</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
        <div class="hide cloneForm">
            <div class="inputDiv" style="margin-top: 7px">
                <input type="text" class="form-control" id="sub_service_name" placeholder="Enter service sub service name" name="name[]" style="width: 80%">
                <button class="button btn removeSub" style="width: 20%;float: right; position: relative;bottom: 36px;">
                    <span class="glyphicon glyphicon-minus">
                </button></span>
            </div>
        </div>
      </div>
      
    </div>
</div> 

@endsection


@section('scripts')

@endsection