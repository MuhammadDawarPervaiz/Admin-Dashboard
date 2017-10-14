@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('meta_description')
    <meta content="Preview page of Metronic Admin Theme #1 for recent ecommerce statistics, charts, recent orders and sales" name="description" />
@endsection

@section('page_level_plugins')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('page_title')
    <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Admin Dashboard
            <small>here manage your shop statics</small>
        </h1>
    <!-- END PAGE TITLE-->
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-bottom-10">
            <a class="more" href="{{ url('view_order') }}">
                <div class="dashboard-stat blue" >
                    <div class="visual">
                       <i class="fa fa-files-o"></i>
                    </div>
                    <div class="details">
                        <div class="number"> {{ $orders }} </div>
                        <div class="desc"> Orders </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a  href="{{ url('view_category') }}"> 
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="details">
                        <div class="number"> {{ $categories }} </div>
                        <div class="desc"> Categories </div>
                    </div>
                </div>                                    
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="more" href="{{ url('view_brand') }}"> 
                <div class="dashboard-stat green">
                    <div class="visual">
                        <i class="fa fa-tags"></i>
                    </div>
                    <div class="details">
                        <div class="number"> {{ $brands }} </div>
                        <div class="desc"> Brands </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="more" href="{{ url('view_customer') }}"> 
                <div class="dashboard-stat red">
                    <div class="visual">
                        <i class="fa fa-group fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> {{ $customers }} </div>
                        <div class="desc"> Customers </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- Begin: life time stats -->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-share font-blue"></i>
                            <span class="caption-subject font-blue bold uppercase">Overview</span>
                            <span class="caption-helper">report overview...</span>
                        </div>                         
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#overview_3" data-toggle="tab"> New Customers </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> Orders
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="#overview_4" id="latest" data-toggle="tab">
                                                <i class="icon-bell"></i> Latest 10 Orders 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#overview_5" data-toggle="tab">
                                                <i class="icon-info"></i> Pending Orders 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#overview_6" data-toggle="tab">
                                                <i class="icon-speech"></i> Completed Orders 
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#overview_7" data-toggle="tab">
                                                <i class="icon-settings"></i> Rejected Orders 
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="overview_3">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Total Orders </th>
                                                    <th> Total Amount </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cus_overview as $cus)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;"> {{ $cus->customer_name }} </a>
                                                        </td>
                                                        <td> {{ $cus->total_orders }} </td>
                                                        <td> ${{ $cus->total_ammount }} </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_4">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Date </th>
                                                    <th> Amount </th>
                                                    <th> Status </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody id="overview_table">
                                                @foreach($cus_orders as $cus)
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;"> {{ $cus->customer_name }} </a>
                                                        </td>
                                                        <td> {{ $cus->from }} </td>
                                                        <td> ${{ $cus->balance }} </td>
                                                        <td>
                                                            @php($text = "")
                                                            @if($cus->color == "#ffffff")
                                                                @php($text = "#000")
                                                            @endif
                                                            <span class="label label-sm" style="background-color: {{ $cus->color }}; color: {{ $text }};"> {{ $cus->status }} </span>
                                                        </td>
                                                        <td>
                                                            <form action="{{ url('add_order') }}" id="edit-form-{{ $cus->id }}" method="get">
                                                                <input type="hidden" name="order_edit_id" value="{{ $cus->id }}"/>
                                                            </form>
                                                            <a class="fa fa-search btn btn-sm btn-default" href="{{ url('add_order') }}" onclick="event.preventDefault();
                                                                document.getElementById('edit-form-{{ $cus->id }}').submit();"> View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_5">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Date </th>
                                                    <th> Amount </th>
                                                    <th> Status </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cus_orders as $cus)
                                                    @if($cus->status == 'Pending')
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;"> {{ $cus->customer_name }} </a>
                                                        </td>
                                                        <td> {{ $cus->from }} </td>
                                                        <td> ${{ $cus->balance }} </td>
                                                        <td>
                                                            @php($text = "")
                                                            @if($cus->color == "#ffffff")
                                                                @php($text = "#000")
                                                            @endif
                                                            <span class="label label-sm" style="background-color: {{ $cus->color }}; color: {{ $text }};"> {{ $cus->status }} </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> View 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_6">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Date </th>
                                                    <th> Amount </th>
                                                    <th> Status </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cus_orders as $cus)
                                                    @if($cus->status == 'Completed')
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;"> {{ $cus->customer_name }} </a>
                                                        </td>
                                                        <td> {{ $cus->from }} </td>
                                                        <td> ${{ $cus->balance }} </td>
                                                        <td>
                                                            @php($text = "")
                                                            @if($cus->color == "#ffffff")
                                                                @php($text = "#000")
                                                            @endif
                                                            <span class="label label-sm" style="background-color: {{ $cus->color }}; color: {{ $text }};"> {{ $cus->status }} </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> View 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="overview_7">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Customer Name </th>
                                                    <th> Date </th>
                                                    <th> Amount </th>
                                                    <th> Status </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cus_orders as $cus)
                                                    @if($cus->status == 'Rejected')
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:;"> {{ $cus->customer_name }} </a>
                                                        </td>
                                                        <td> {{ $cus->from }} </td>
                                                        <td> ${{ $cus->balance }} </td>
                                                        <td>
                                                            @php($text = "")
                                                            @if($cus->color == "#ffffff")
                                                                @php($text = "#000")
                                                            @endif
                                                            <span class="label label-sm" style="background-color: {{ $cus->color }}; color: {{ $text }};"> {{ $cus->status }} </span>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" class="btn btn-sm btn-default">
                                                                <i class="fa fa-search"></i> View 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End: life time stats -->
        </div>
        <div class="col-md-6">
            <!-- Begin: life time stats -->
                <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-globe font-red"></i>
                                <span class="caption-subject font-red bold uppercase">Revenue</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#portlet_ecommerce_tab_1" data-toggle="tab"> Amounts </a>
                                </li>
                                <li>
                                    <a href="#portlet_ecommerce_tab_2" id="statistics_orders_tab" data-toggle="tab"> Orders </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                                    <div id="statistics_1" class="chart"> </div>
                                </div>
                                <div class="tab-pane" id="portlet_ecommerce_tab_2">
                                    <div id="statistics_2" class="chart"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End: life time stats -->
        </div>
    </div>
@endsection


@section('scripts')
        
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/ecommerce-dashboard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

@endsection