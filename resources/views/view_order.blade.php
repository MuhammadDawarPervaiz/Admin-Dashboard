@extends('layouts.layout')

@section('title')
    View Order
@endsection

@section('meta_description')
    <meta content="Preview page of Metronic Admin Theme #1 for editable datatable samples" name="description" />
@endsection

@section('stylesheets')
    <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_level_plugins')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('page_title')
    <!-- BEGIN PAGE TITLE-->
  
    <!-- END PAGE TITLE-->
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">Order list</span>
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
                                    <th style="padding: 10px 10px 10px 2px;"> ID </th>
                                    <th style="padding: 10px 10px 10px 10px;"> Customer </th>
                                    <th> Category </th>
                                    <th> Brand </th>
                                    <th style="padding: 10px 15px 10px 5px;"> Device </th>
                                    <th> IMEI </th>
                                    <th> From </th>
                                    <th> To </th>
                                    <th> Status </th>
                                    <th style="padding: 10px 15px 10px 10px;"> Total </th>
                                    <th style="padding: 10px 10px 10px 10px;"> Advance </th>
                                    <th style="padding: 10px 10px 10px 10px;"> Balance </th>
                                    <th style="padding: 10px 10px 10px 2px;"> Edit </th>
                                    <th style="padding: 10px 10px 10px 2px;"> Delete </th>
                                    <th style="padding: 10px 10px 10px 2px;"> Report </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->category_name }}</td>
                                        <td>{{ $order->brand_name }}</td>
                                        <td>{{ $order->device_name }}</td>
                                        <td>{{ $order->imei_no }}</td>
                                        <td>{{ $order->from }}</td>
                                        <td>{{ $order->to }}</td>
                                        <td>
                                            @php($text = "")
                                            @if($order->color == "#ffffff")
                                                @php($text = "#000")
                                            @endif
                                            <span class="label label-sm" style="background-color: {{ $order->color }}; color: {{ $text }};"> {{ $order->status }} </span>
                                        </td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->advance }}</td>
                                        <td>{{ $order->balance }}</td>
                                        <td>
                                            <form action="{{ url('add_order') }}" id="edit-form-{{ $order->id }}" method="get">
                                                <input type="hidden" name="order_edit_id" value="{{ $order->id }}"/>
                                            </form>
                                            <a class="fa fa-edit" href="{{ url('add_order') }}" onclick="event.preventDefault();
                                                document.getElementById('edit-form-{{ $order->id }}').submit();">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" data-href="{{ url('edit_order') }}" data-toggle="modal" data-target="#confirm-order-delete-{{ $order->id }}" class="fa fa-times"></a>

                                            <div class="modal fade" id="confirm-order-delete-{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                <div class="modal-dialog">
                                                    <div style="margin: 40px;">
                                                        <form action="{{ url('view_order') }}" id="delete-form-{{ $order->id }}" method="post">
                                                            {{ csrf_field() }}  
                                                            <input type="hidden" name="order_del_id" value="{{ $order->id }}"/>
                                                        </form>
                                                        <p>
                                                            <strong style="font-size: 1.3em;">Are you sure you want to DELETE this Order ? </strong>
                                                        </p>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <a class="btn btn-danger btn-block btn-ok" href="{{ url('edit_order') }}"    onclick="event.preventDefault();
                                                                document.getElementById('delete-form-{{ $order->id }}').submit();">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ url('report') }}" id="report-form-{{ $order->id }}" method="get">
                                                <input type="hidden" name="rep_id" value="{{ $order->id }}"/>
                                            </form>
                                            <a class="fa fa-file-text" href="{{ url('report') }}" onclick="event.preventDefault();
                                                document.getElementById('report-form-{{ $order->id }}').submit();">
                                            </a>
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

    <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection