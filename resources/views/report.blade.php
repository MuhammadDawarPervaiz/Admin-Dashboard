@extends('layouts.layout')

@section('title')
    Report
@endsection

@section('meta_description')
    <meta content="Preview page of Metronic Admin Theme #1 for view order details" name="description" />
@endsection

@section('page_level_plugins')
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('stylesheets')
    <style>
        .row .col-md-5 .col-xs-5 .col-md-7 .col-xs-7 .portlet  .panel .panel-default
        {
          margin: 0px;
          padding:0px;
        }
        .portlet-body
        {
          margin: 0px;
          padding: 0px;
        }
    </style>
@endsection

@section('content')
    @foreach($orders as $order)
        @section('print_btn')
            <div class="col-md-5 col-md-offset-1">
                <input type="button" class="btn btn-primary btn-block pull-left hide-to-print" onClick="window.print()" value="Print"/>
            </div>
            <div class="col-md-5">
                <a href="{{ url('view_order') }}" class="btn btn-danger btn-block">Cancel</a>
            </div>
        @endsection
        @for($i=0; $i<2; $i++)
        	<div class="row" style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Begin: life time stats -->
                    <div class=" bordered">
                        <div class="row">
                            <div class="col-md-5 col-xs-5">
                                <div class="col-md-4 col-xs-4">
                                    <a class="navbar-brand" href="#">LOGO IMAGE</a>
                                </div>
                                <div class="col-md-8 col-xs-8" id="header_left">
                                    <h3 class="h3" style="margin:0px;padding: 0px">Repair Shop</h3>
                                    <p style="margin: 8px 0px; margin-bottom: 0px;">Ferozpur Road Lahore,Pakistan</p>
                                    <p style="margin:0px;">
                                        Tel:032020202020
                                        Email:gul@evslearning.com
                                    </p>
                                </div>                                          
                            </div>
                            <div class="col-md-6 col-md-offset-1 col-xs-6 col-xs-offset-1">
                                @foreach ($banner_images as $image) 
                                    <img src="{{ asset('uploads/'.$image->banner_image) }}" alt="shop_image" class="img-responsive" style="height: 144px; width: 101%"/>
                                @endforeach
                            </div>
                        </div>
                        <div class="">
                            <ul class="nav nav-tabs nav-tabs-lg">
                                <li class="active">
                                    <a id="date_tab"> Order No:{{ $order->id }}&nbsp; | &nbsp;Date:{{ $order->from }} - {{ $order->to }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-5" style=".col-xs-4{ margin: -12px; padding: 0px;}">
                                       <div class="col-md-12 col-sm-12 col-xs-12" >
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <div class="caption headings">
                                                        <i class="fa fa-user"></i>Customer Info
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-xs-3 name txt"> Name: </div>
                                                        <div class="col-md-9 col-xs-9 value txt"> {{ $order->customer_name }} </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-xs-3 name txt"> Email: </div>
                                                        <div class="col-md-9 col-xs-9 value txt"> {{ $order->customer_email }} </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-xs-3 name txt"> Contact: </div>
                                                        <div class="col-md-9 col-xs-9 value txt"> {{ $order->customer_contact }} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="caption headings">
                                                        <i class="fa fa-cogs"></i>Device Details 
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-xs-5 name txt"> Category: </div>
                                                        <div class="col-md-7 col-xs-7 value txt"> {{ $order->category_name }} </div>
                                                    </div>
                                                    <div class="row txt">
                                                        <div class="col-md-5 col-xs-5 name txt"> Brand: </div>
                                                        <div class="col-md-7 col-xs-7 value txt"> {{ $order->brand_name }} </div>
                                                    </div>
                                                    <div class="row txt">
                                                        <div class="col-md-5 col-xs-5 name txt"> Device Name</div>
                                                        <div class="col-md-7 col-xs-7 value txt"> {{ $order->device_name }} </div>
                                                    </div>
                                                    <div class="row txt">
                                                        <div class="col-md-5 col-xs-5 name txt"> IMEI#: </div>
                                                        <div class="col-md-7 col-xs-7 value txt"> {{ $order->imei_no }} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" >
                                            <div class="panel panel-success">
                                                <div class="panel-heading">
                                                    <div class="caption headings">
                                                        <i class="fa fa-cogs"></i> Payment Detail
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row ">
                                                        <div class="col-md-4 col-xs-4 name"> 
                                                            <h4 class="h4 left headings">Total:${{ $order->total }}</h4>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 txt value">Advance: ${{ $order->advance }}</div>
                                                        <div class="col-md-4 col-xs-4 txt value">Balance: ${{ $order->balance }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 " style=".col-xs-4{ margin: 0px;}">
                                        <div class="panel panel-danger" >
                                            <div class="panel-heading">
                                                <div class="caption">
                                                    <i class="fa fa-pagelines"></i><b class="headings">Problems &amp; Prices</b> 
                                                </div>
                                            </div>
                                            <div class="panel-body bg-grey" id="problems">
                                                <div class="row">
                                                    <div class="col-md-12 value"> 
                                                        <table class="table" id="sample_editable_1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Problems</th>
                                                                    <th>Prices</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php ($problems = App\order::find($order->id)->problems)
                                                                @foreach($problems as $problem)
                                                                    <tr>
                                                                        <td> <em class="txt">{{ $problem->problem }}</em> </td>
                                                                        <td> <em class="txt">{{ $problem->price }}</em> </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 " style=".col-xs-4{ margin: 0px;}">
                                        <div class="panel panel-default">
                                            <div class="panel-heading " >
                                                <h3 class="panel-title headings">Privacy Policy</h3>
                                            </div>
                                            <div class="panel-body text-justify txt">
                                                <p class="txt">
                                                    There are many different ways you can use our services – to search for and share information, to communicate with other people or to create new content. When you share information with us, for example by creating a Google Account, we can make those services even better – to show you more relevant search results and ads, to help you connect with people or to make sharing with others quicker and easier. As you use our services, we want you to be clear how we’re using information and the ways in which you can protect your privacy. Our Privacy Policy explains: What information we collect and why we collect it. How we use that information. The choices we offer, including how to access and update
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
        @endfor
    @endforeach
    <!-- End: life time stats -->
@endsection

@section('scripts')
	<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/ecommerce-orders-view.min.js" type="text/javascript"></script>
@endsection