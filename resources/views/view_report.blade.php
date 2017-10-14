@extends('layouts.layout')

@section('title')
    View Report
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for rowreorder extension demos" name="description" />
@endsection

@section('page_level_plugins')
	<link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i> 
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_2">
                        <thead>
                            <tr>
                                <th> Report ID </th>
                                <th> Date </th>
                                <th> Customer Name</th>
                                <th> Device Name </th>
                              
                            </tr>
                        </thead>
                        <tfoot>
                             <tr>
                                <th> Report ID </th>
                                <th> Date </th>
                                <th> Customer Name</th>
                                <th> Device Name </th>
                              
                            </tr>
                        </tfoot>
                        <tbody>
                        	@foreach($reports as $report)
	                         	<tr>
	                        	    <td>{{ $report->id }}</td>
	                                <td>{{ $report->from }}</td>
	                                <td>{{ $report->customer_name }}</td>
	                                <td>{{ $report->device_name }}</td>
	                            </tr>
                            @endforeach                  
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection

@section('scripts')
	<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
@endsection