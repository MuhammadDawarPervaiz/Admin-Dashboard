@extends('layouts.layout')

@section('title')
    Add Order
@endsection

@section('meta_description')
    <meta content="Preview page of Metronic Admin Theme #1 for view order details" name="description" />
@endsection

@section('stylesheets')
    @if($update_order)
        <style type="text/css">
            #update_order
            {
                display: block !important;
            }
            #add_order
            {
                display: none !important;
            }
        </style>
        @php ($path = 'update_order')
        @php ($orders = $order_id)
        @php ($problems = App\order::find($order_id)->problems)

        @php ($old_customer = "")
        @php ($old_category = "")
        @php ($old_brand = "")
        @php ($old_device = "")
        @php ($old_imei = "")
        @php ($old_from = "")
        @php ($old_to = "")
    @else
        @php ($path = 'add_order')

        @php ($old_customer = old('customer_id'))
        @php ($old_category = old('category_id'))
        @php ($old_brand = old('brand_id'))
        @php ($old_device = old('device_name'))
        @php ($old_imei = old('imei_no'))
        @php ($old_from = old('from'))
        @php ($old_to = old('to'))
    @endif
@endsection

@section('page_level_plugins')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection

@section('theme_global_styles')
    <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
@endsection

@section('theme_layout_styles')
    <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/awesomplete.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
@endsection

@section('page_title')
    <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Generate an Order
            <small>here make an order</small>
        </h1>
    <!-- END PAGE TITLE-->
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- Begin: life time stats -->
            <div class="portlet light portlet-fit portlet-datatable bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs nav-tabs-lg">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">FILL Form </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form action="{{ url($path) }}" method="post" id="order_form">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet yellow-crusta box">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Order Details 
                                                        </div>
                                                        <div class="actions">
                                                            <a disabled class="btn btn-default btn-md">
                                                                <i class="fa fa-tagl"></i> #{{ $orders }}
                                                                <input type="hidden" name="id" value="{{ $orders }}"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                    <!--<div class="row static-info">    
                                                            <div class="col-md-12 value">  
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                                        <input type="text" class="form-control" name="d_of_rece">
                                                                        <label for="d_of_rece">Date Order</label>
                                                                        <span class="input-group-addon"> to </span>
                                                                        <input type="text" class="form-control" name="d_of_del">
                                                                    </div>/input-group 
                                                                    <span class="help-block"> Select the Date</span>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div class="row static-info">    
                                                            <div class="col-md-12 value"> 
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <div class="input-icon left">
                                                                        <i id="cus_link" class="fa fa-plus"></i>
                                                                        <select class="form-control " id="customer" name="customer_id" required>
                                                                            <option value=""></option>
                                                                            @foreach($customers as $customer)
                                                                                <option
                                                                                    @if($old_customer == $customer->id)
                                                                                        selected
                                                                                    @endif
                                                                                    @foreach($order_edit as $order)
                                                                                        @if($customer->id == $order->customer_id)
                                                                                            Selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                    value="{{ $customer->id }}" >{{ $customer->customer_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <label for="category_id">Select Customer</label>
                                                                        <div class="form-control-focus"> </div>
                                                                        <span class="help-block">Select Customer for Ordering</span>
                                                                    </div>
                                                                    @if($errors->has('customer_id')) 
                                                                        <blockquote>
                                                                            <footer><cite title="Source Title">{{ $errors->first('customer_id') }}</cite></footer>
                                                                        </blockquote>
                                                                    @endif
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">    
                                                            <div class="col-md-12 value"> 
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <div class="input-icon left">
                                                                        <i data-target="#static1" data-toggle="modal" class="fa fa-plus"></i>
                                                                        <select class="form-control " id="cat" name="category_id" required>
                                                                            <option value=""></option>
                                                                            @foreach($categories as $category)
                                                                                <option
                                                                                    @if($old_category == $category->id)
                                                                                        selected
                                                                                    @endif
                                                                                    @foreach($order_edit as $order)
                                                                                        @if($category->id == $order->category_id)
                                                                                            Selected 
                                                                                        @endif
                                                                                    @endforeach
                                                                                    value="{{ $category->id }}" >{{ $category->category_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <label for="category_id">Select Category</label>
                                                                        <div class="form-control-focus"> </div>
                                                                        <span class="help-block">Select Category of Device</span>
                                                                    </div>
                                                                    @if($errors->has('category_id')) 
                                                                        <blockquote>
                                                                            <footer><cite title="Source Title">{{ $errors->first('category_id') }}</cite></footer>
                                                                        </blockquote>
                                                                    @endif
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-12 value"> 
                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                    <div class="input-icon left">
                                                                        <i data-target="#static" data-toggle="modal" class="fa fa-plus"></i>
                                                                        <select class="form-control " id="brand" name="brand_id" required>
                                                                            <option value=""></option>
                                                                            @foreach($brands as $brand)
                                                                                <option
                                                                                    @if($old_brand== $brand->id)
                                                                                        selected
                                                                                    @endif
                                                                                    @foreach($order_edit as $order)
                                                                                        @if($brand->id == $order->brand_id)
                                                                                            Selected
                                                                                        @endif
                                                                                    @endforeach
                                                                                    value="{{ $brand->id }}" >{{ $brand->brand_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        <label for="brand_id">Select Brands</label>
                                                                        <div class="form-control-focus"> </div>
                                                                        <span class="help-block">Select Brand of Device</span>
                                                                    </div>
                                                                    @if($errors->has('brand_id')) 
                                                                        <blockquote>
                                                                            <footer><cite title="Source Title">{{ $errors->first('brand_id') }}</cite></footer>
                                                                        </blockquote>
                                                                    @endif
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-12 value">
                                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                                    <input type="text" class="form-control" id="device_name" name="device_name" value="{{ $old_device }}@foreach($order_edit as $order){{ $order->device_name }}@endforeach" required/>
                                                                    <label for="device_name">Device Name</label>
                                                                    <span class="help-block">Customer device name</span>
                                                                </div>
                                                                @if($errors->has('device_name')) 
                                                                    <blockquote>
                                                                        <footer><cite title="Source Title">{{ $errors->first('device_name') }}</cite></footer>
                                                                    </blockquote>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row static-info">
                                                            <div class="col-md-12 value">  
                                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                                    <input type="text" class="form-control " id="imei" name="imei_no" value="{{ $old_imei }}@foreach($order_edit as $order){{ $order->imei_no }}@endforeach" pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                                                                    <label for="imei_no">IMEI No</label>
                                                                    <span class="help-block">Orignal IMEI No</span>
                                                                </div>
                                                                @if($errors->has('imei_no')) 
                                                                    <blockquote>
                                                                        <footer><cite title="Source Title">{{ $errors->first('imei_no') }}</cite></footer>
                                                                    </blockquote>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="portlet grey-cascade box" id="problem_and_price">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-cogs"></i>Problem and Price
                                                        </div>
                                                        <div class="actions">
                                                            <a  class="btn btn-default btn-sm">
                                                                <i class="fa fa-edit"></i> 
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body" >
                                                        <div class="table-responsive" style="overflow: hidden">
                                                            <table class="table table-hover table-bordered table-striped " >
                                                                <div class="form-group mt-repeater">
                                                                    <div data-repeater-list="group-c">
                                                                        @if($update_order)
                                                                            @php ($problems = App\order::find($order_id)->problems)
                                                                            @if(count($problems))
                                                                                @foreach($problems as $problem)
                                                                                    <div data-repeater-item class="mt-repeater-item">
                                                                                        <div class="row mt-repeater-row">
                                                                                            <div class="col-md-6">
                                                                                                <div class="row static-info">
                                                                                                    <div class="col-md-12 value">
                                                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                                                            <input type="text" class="form-control" id="problem" name="problem" value="{{ $problem->problem }}" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required/>
                                                                                                            <label for="problem">Problem Name</label>
                                                                                                        </div>
                                                                                                        @if($errors->has('problem')) 
                                                                                                            <blockquote>
                                                                                                                <footer><cite title="Source Title">{{ $errors->first('problem') }}</cite></footer>
                                                                                                            </blockquote>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <div class="row static-info">
                                                                                                    <div class="col-md-12 value">
                                                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                                                            <input type="text" class="form-control" id="problem_price" name="problem_price" value="{{ $problem->price }}" pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
                                                                                                            <label for="problem_price">Problem Price</label>
                                                                                                        </div>
                                                                                                        @if($errors->has('problem_price')) 
                                                                                                            <blockquote>
                                                                                                                <footer><cite title="Source Title">{{ $errors->first('problem_price') }}</cite></footer>
                                                                                                            </blockquote>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div> 
                                                                                            </div>
                                                                                            <div class="col-md-2">
                                                                                                <button type="button" id="del_problem_price" data-repeater-delete class="btn btn-danger mt-repeater-delete bold font-green mt-sweetalert" data-title="Problem and Price" data-message="Deleted" data-type="error" data-allow-outside-click="true" data-confirm-button-class="btn-danger" value="{{ $problem->id }}" name="delete_problem_{{ $problem->id }}">
                                                                                                <i class="fa fa-close"></i>
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            @else
                                                                                <div data-repeater-item class="mt-repeater-item">
                                                                                    <div class="row mt-repeater-row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="row static-info">
                                                                                                <div class="col-md-12 value">
                                                                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                                                                        <input type="text" class="form-control" id="problem" name="problem" value="" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32'required />
                                                                                                        <label for="problem">Problem Name</label>
                                                                                                    </div>
                                                                                                    @if($errors->has('problem')) 
                                                                                                        <blockquote>
                                                                                                            <footer><cite title="Source Title">{{ $errors->first('problem') }}</cite></footer>
                                                                                                        </blockquote>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="row static-info">
                                                                                                <div class="col-md-12 value">
                                                                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                                                                        <input type="text" class="form-control" id="problem_price" name="problem_price" value="" pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
                                                                                                        <label for="problem_price">Problem Price</label>
                                                                                                    </div>
                                                                                                    @if($errors->has('problem_price')) 
                                                                                                        <blockquote>
                                                                                                            <footer><cite title="Source Title">{{ $errors->first('problem_price') }}</cite></footer>
                                                                                                        </blockquote>
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div> 
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <button type="button" id="del_problem_price" data-repeater-delete class="btn btn-danger mt-repeater-delete bold font-green mt-sweetalert" data-title="Problem and Price" data-message="Deleted" data-type="error" data-allow-outside-click="true" data-confirm-button-class="btn-danger">
                                                                                            <i class="fa fa-close"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @else
                                                                            <div data-repeater-item class="mt-repeater-item">
                                                                                <div class="row mt-repeater-row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="row static-info">
                                                                                            <div class="col-md-12 value">
                                                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                                                    <input type="text" class="form-control" id="problem" name="problem" value="" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required />
                                                                                                    <label for="problem">Problem Name</label>
                                                                                                </div>
                                                                                                @if($errors->has('problem')) 
                                                                                                    <blockquote>
                                                                                                        <footer><cite title="Source Title">{{ $errors->first('problem') }}</cite></footer>
                                                                                                    </blockquote>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="row static-info">
                                                                                            <div class="col-md-12 value">
                                                                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                                                                    <input type="text" class="form-control" id="problem_price" name="problem_price" value="" pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
                                                                                                    <label for="problem_price">Problem Price</label>
                                                                                                </div>
                                                                                                @if($errors->has('problem_price')) 
                                                                                                    <blockquote>
                                                                                                        <footer><cite title="Source Title">{{ $errors->first('problem_price') }}</cite></footer>
                                                                                                    </blockquote>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div> 
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <button type="button" id="del_problem_price"data-repeater-delete class="btn btn-danger mt-repeater-delete bold font-green mt-sweetalert" data-title="Problem and Price" data-message="Deleted" data-type="error" data-allow-outside-click="true" data-confirm-button-class="btn-danger">
                                                                                        <i class="fa fa-close"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add">
                                                                        <i class="fa fa-plus"></i> Add Problem
                                                                    </a>
                                                                </div>   
                                                                <div class="row" >  
                                                                    <div class="col-md-4 value" >                                   
                                                                        <div class="form-group form-group form-md-line-input form-md-floating-label">
                                                                            <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                                                                <input type="text" class="form-control" id="from" name="from" placeholder="Date of Order" value="{{ $old_from }}@foreach($order_edit as $order){{ $order->from }}@endforeach" required/>
                                                                                <span class="input-group-addon"> to </span>
                                                                                <input type="text" class="form-control" name="to" placeholder="Date of Deleiverd" value="{{ $old_to }}@foreach($order_edit as $order){{ $order->to }}@endforeach" required/>
                                                                            </div>
                                                                            <!-- /input-group -->
                                                                            <span class="help-block"> Select date range </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" col-md-offset-4 col-md-4 value  right"> 
                                                                        <div class="form-group form-md-line-input form-md-floating-label">
                                                                            <select class="form-control " id="status" name="status_id">
                                                                                <option value=""></option>
                                                                                @foreach($statuses as $status)
                                                                                    <option
                                                                                        @foreach($order_edit as $order)
                                                                                            @if($status->id == $order->status_id)
                                                                                                Selected
                                                                                            @endif
                                                                                        @endforeach
                                                                                        @if($status->flag)
                                                                                            Selected
                                                                                        @endif
                                                                                        value="{{ $status->id }}" >{{ $status->status }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="status_id">Select Status</label>
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Select Status of Device</span>
                                                                        </div>
                                                                        @if($errors->has('status_id')) 
                                                                            <blockquote>
                                                                                <footer><cite title="Source Title">{{ $errors->first('status_id') }}</cite></footer>
                                                                            </blockquote>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="well">
                                                            <div class="row static-info text-center">
                                                                <div class="col-md-12 name">
                                                                    <h4> Grand Total: $<em id="total_ammount">
                                                                        @foreach($order_edit as $order)
                                                                            {{ $order->total }}
                                                                        @endforeach</em> 
                                                                    </h4>
                                                                    <input type="hidden" name="total" value="@foreach($order_edit as $order){{ $order->total }}@endforeach"/>
                                                                </div>
                                                            </div>
                                                            <div class="row static-info ">
                                                                <div class="col-md-6 value">
                                                                    <div class="form-group form-md-line-input form-md-floating-label">
                                                                        <input type="text" class="form-control" id="advance" name="advance" value="@foreach($order_edit as $order){{ $order->advance }}@endforeach" required pattern="[0-9]*" title="Digits Only" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                                                                        <label for="advance">Advance</label>
                                                                    </div>
                                                                    @if($errors->has('advance')) 
                                                                        <blockquote>
                                                                            <footer><cite title="Source Title">{{ $errors->first('advance') }}</cite></footer>
                                                                        </blockquote>
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 value">
                                                                    <div class="form-group form-md-line-input">
                                                                        <input type="text" class="form-control" id="balance" name="balance" value="@foreach($order_edit as $order){{ $order->balance }}@endforeach" required readonly />
                                                                        <label for="balance">Balance</label>
                                                                    </div>
                                                                    @if($errors->has('balance')) 
                                                                        <blockquote>
                                                                            <footer><cite title="Source Title">{{ $errors->first('balance') }}</cite></footer>
                                                                        </blockquote>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" id="add_order">
                                                <input type="hidden" name="rep_id" value="{{ $orders }}"/>
                                                <input type="hidden" value="" name="print" id="print"/>
                                                <input type="submit" class="btn btn-success mt-sweetalert" name="order_submit" value="Submit"/>
                                                <input type="submit" class="btn btn-primary pull-left" id="print_btn" value="Save &amp; Print"/>

                                                <!--
                                                <a data-toggle="modal" data-target="#confirm-submit" class="btn btn-success mt-sweetalert">Submit</a>
                                                <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                    <div class="modal-dialog">
                                                        <div style="margin: 40px;">
                                                            <p>
                                                                <strong style="font-size: 1.4em;">Save Order ? </strong>
                                                            </p>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <a class="btn btn-danger btn-block btn-ok" href="{{ url('edit_status') }}"    onclick="event.preventDefault();
                                                                    document.getElementById('order_form').submit();">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->

                                                <a href="#" data-href="{{ url('dashboard') }}" data-toggle="modal" data-target="#confirm-cancel" class="btn btn-danger mt-sweetalert">Cancel Order</a>
                                            </div>
                                            <div class="col-md-12" id="update_order" style="display: none;">
                                                <input type="hidden" name="order_id" value="{{ $order_id }}">
                                                <input type="submit" class="btn btn-success mt-sweetalert" value="Update"/>
                                                <a href="{{ url('view_order') }}" class="btn btn-danger mt-sweetalert">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: life time stats -->
        </div>
    </div>

@endsection

@section('quick_sidebar')
    <!-- BEGIN QUICK SIDE-BAR -->
        <div class="modal fade" id="confirm-cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
            <div class="modal-dialog">
                <div style="margin: 40px;">
                    <p>
                        <strong style="font-size: 1.4em;">Are you sure you want to cancel this order ? </strong>
                    </p>
                    <br/>
                    <div class="row">
                        <div class="col-md-5">
                            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-danger btn-block btn-ok" href="{{ url('dashboard') }}">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="advance_validation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
            <div class="modal-dialog">
                <div style="margin: 40px;">
                    <p>
                        <strong style="font-size: 1.3em;">Value can not be greater than Total Ammount!</strong>
                    </p>
                    <br/>
                    <div class="row">
                        <div class="col-md-10">
                            <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="static2" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
            <div class="portlet-body hidden">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="title">Title</label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Enter a message ...">Is Added in your Customer List</textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="toastTypeGroup">
                            <label>Toast Type</label>
                            <div class="mt-radio-list">
                                <label class="mt-radio mt-radio-outline">
                                    <input type="radio" name="toasts" value="success" checked/>Success
                                    <span></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group" id="positionGroup">
                            <label>Position</label>
                            <div class="mt-radio-list">
                                <label class="mt-radio mt-radio-outline">
                                    <input type="radio" name="positions" value="toast-top-right" checked/>Top Right
                                    <span></span>
                                </label>                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="controls">
                                <label class="control-label" for="showEasing">Show Easing</label>
                                <input id="showEasing" type="text" placeholder="swing, linear" class="form-control input-small" value="swing" />
                                <label class="control-label" for="hideEasing">Hide Easing</label>
                                <input id="hideEasing" type="text" placeholder="swing, linear" class="form-control input-small" value="linear" />
                                <label class="control-label" for="showMethod">Show Method</label>
                                <input id="showMethod" type="text" placeholder="show, fadeIn, slideDown" class="form-control input-small" value="fadeIn" />
                                <label class="control-label" for="hideMethod">Hide Method</label>
                                <input id="hideMethod" type="text" placeholder="hide, fadeOut, slideUp" class="form-control input-small" value="fadeOut" /> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="controls">
                                <label class="control-label" for="showDuration">Show Duration</label>
                                <input id="showDuration" type="text" placeholder="ms" class="form-control input-small" value="1000" />
                                <label class="control-label" for="hideDuration">Hide Duration</label>
                                <input id="hideDuration" type="text" placeholder="ms" class="form-control input-small" value="1000" />
                                <label class="control-label" for="timeOut">Time out</label>
                                <input id="timeOut" type="text" placeholder="ms" class="form-control input-small" value="5000" />
                                <label class="control-label" for="timeOut">Extended time out</label>
                                <input id="extendedTimeOut" type="text" placeholder="ms" class="form-control input-small" value="1000" /> 
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label" >
                            <input id="title" type="text" class="form-control"  />
                            <label for="add_customer_name">Customer Name</label>
                            <span class="help-block">New Customer Name</span>
                        </div>
                    </div>                                        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cancel</button>
                <button type="button" data-dismiss="modal" class="btn green" id="showtoast">Submit</button>
            </div>
        </div>
        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
            <form class="brands">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label" >
                            <input type="text" class="form-control" id="brand_name" name="brand_name" value="">
                            <label for="brand_name">Brand Name</label>
                            <span class="help-block">New Brand Name</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cancel</button>
                    <input type="submit" data-dismiss="modal" class="btn green" id="add_brand" value="Submit"/>
                </div>
            </form>
        </div>
        <div id="static1" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" data-attention-animation="false">
            <form class="cats">
                <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label" >
                            <input type="text" class="form-control" id="add_category" name="category_name" value="">
                            <label for="category_name">Category Name</label>
                            <span class="help-block">Category Name of Device</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cancel</button>
                    <input type="submit" data-dismiss="modal" class="btn green" id="add_cat" value="Submit"/>
                </div>
            </form>
        </div>
    <!-- END QUICK SIDEBAR -->
@endsection

@section('scripts')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

        <script src="../assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>  
        <script src="../assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->

        <script src="../assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/ecommerce-orders-view.min.js" type="text/javascript"></script>
        <!-- BEGIN AJAX SCRIPT -->
            <script src="{{ asset('js/ajax.js') }}"></script>
            <script type="text/javascript">
                $('#cus_link').click(function(){
                    window.location.href = "{{ url('add_cus') }}";
                });
            </script>
        <!-- BEGIN AJAX SCRIPT -->
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- Google Code for Universal Analytics -->
        <script>
            @section('toastr')
                toastr[success]("Gnome & Growl type non-blocking notifications", "Toastr Notifications")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-right",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
            @endsection
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-37564768-1', 'auto');
            ga('send', 'pageview');
        </script>
    <!-- End -->

@endsection