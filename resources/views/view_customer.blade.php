@extends('layouts.layout')

@section('title')
    View Customer
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for editable datatable samples" name="description" />
@endsection

@section('page_level_plugins')
	<link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Customers</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Contact Number </th>
                                <th> Address </th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($customers as $customer)
	                            <tr>
	                                <td> {{ $customer->id }} </td>
	                                <td> {{ $customer->customer_name }} </td>
	                                <td> {{ $customer->customer_email }} </td>
	                                <td> {{ $customer->customer_contact }} </td>
	                                <td> {{ $customer->customer_address }} </td>
	                                <td>
	                                    <form action="{{ url('add_customer') }}" id="edit-form-{{ $customer->id }}" method="get">
                                            <input type="hidden" name="customer_edit_id" value="{{ $customer->id }}"/>
                                        </form>
                                        <a class="fa fa-edit" href="{{ url('add_customer') }}" onclick="event.preventDefault();
                                            document.getElementById('edit-form-{{ $customer->id }}').submit();">
                                        </a>
	                                </td>
	                                <td>
                                        <a href="#" data-href="{{ url('view_customer') }}" data-toggle="modal" data-target="#confirm-customer-delete-{{ $customer->id }}" class="fa fa-times"></a>

                                        <div class="modal fade" id="confirm-customer-delete-{{ $customer->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                            <div class="modal-dialog">
                                                <div style="margin: 40px;">
                                                    <form action="{{ url('view_customer') }}" id="delete-form-{{ $customer->id }}" method="post">
                                                        {{ csrf_field() }}  
                                                        <input type="hidden" name="customer_del_id" value="{{ $customer->id }}"/>
                                                    </form>
                                                    <p>
                                                        <strong style="font-size: 1.3em;">Are you sure you want to DELETE this Customer ? </strong>
                                                    </p>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <a class="btn btn-danger btn-block btn-ok" href="{{ url('view_customer') }}"    onclick="event.preventDefault();
                                                            document.getElementById('delete-form-{{ $customer->id }}').submit();">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
	                                </td>
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
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	    <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
	    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
	    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
	    <script src="../assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection