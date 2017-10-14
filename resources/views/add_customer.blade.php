@extends('layouts.layout')

@section('title')
    Add Customer
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for pricing table samples" name="description" />
@endsection

@section('stylesheets')
	<link href="../assets/pages/css/pricing.min.css" rel="stylesheet" type="text/css" />
	@php ($path = 'add_customer')
	@if($update_cus)
		<style type="text/css">
			#update_cus
			{
				display: block;
			}
			#add_cus
			{
				display: none;
			}
		</style>
		@php ($path = 'update_customer')
		@php ($old_name = "")
		@php ($old_email = "")
		@php ($old_contact = "")
		@php ($old_address = "")
	@else
		<style type="text/css">
			#update_cus
			{
				display: none;
			}
		</style>
		@php ($old_name = old('customer_name'))
		@php ($old_email = old('customer_email'))
		@php ($old_contact = old('customer_contact'))
		@php ($old_address = old('customer_address'))
	@endif
@endsection

@section('page_level_plugins')
	<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-share font-default"></i>
                <span class="caption-subject font-default bold uppercase">You can add new Customer</span>
            </div>
            
        </div>
       <div class="portlet-body">
            <div class="pricing-content-2">
                <div class="pricing-table-container">
                    <div class="row padding-fix">
                        <div class=" col-md-offset-4 col-md-4 no-padding">
                        	<form action="{{ url($path) }}" method="post">
		                        {{ csrf_field() }}
	                            <div class="price-column-container featured-price border-top">
	                                <div class="price-feature-label uppercase bg-green-jungle">New</div>
	                                <div class="price-table-head price-2">
	                                    <h2 class="uppercase no-margin">Customer </h2>
	                                </div>                                                
	                                <div class="price-table-content"></div>
	                                <div class="row no-margin">
	                                    <div class="col-xs-12 text-left uppercase font-green sbold">
	                                        <div class="row no-margin">
	                                            <div class="col-xs-12 text-left uppercase">
	                                                <div class="form-group form-md-line-input has-info form-md-floating-label">
	                                                    <div class="input-group left-addon">
	                                                        <input type="text" class="form-control" id="new_customer" name="customer_name" value="{{ $old_name }}@foreach($customer_edit as $customer){{ $customer->customer_name }}@endforeach" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required>
	                                                        <label for="customer_name"> Name</label>
	                                                        <span class="input-group-addon">
	                                                            <i class="fa fa-user"></i>
	                                                        </span>
	                                                    </div>
	                                                    @if($errors->has('customer_name')) 
			                                                <blockquote>
			                                                    <footer><cite title="Source Title">{{ $errors->first('customer_name') }}</cite></footer>
			                                                </blockquote>
			                                            @endif
	                                                </div>
	                                                <div class="form-group form-md-line-input has-info form-md-floating-label">
	                                                    <div class="input-group left-addon">
	                                                        <input type="email" class="form-control" id="new_customer" name="customer_email" value="{{ $old_email }}@foreach($customer_edit as $customer){{ $customer->customer_email }}@endforeach" required>
	                                                        <label for="customer_email"> Email</label>
	                                                        <span class="input-group-addon">
	                                                            <i class="fa fa-user"></i>
	                                                        </span>
	                                                    </div>
	                                                    @if($errors->has('customer_email')) 
			                                                <blockquote>
			                                                    <footer><cite title="Source Title">{{ $errors->first('customer_email') }}</cite></footer>
			                                                </blockquote>
			                                            @endif
	                                                </div>
	                                                <div class="form-group form-md-line-input has-info form-md-floating-label">
	                                                    <div class="input-group left-addon">
	                                                        <input type="text" class="form-control" id="new_customer" name="customer_contact" value="{{ $old_contact }}@foreach($customer_edit as $customer){{ $customer->customer_contact }}@endforeach" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
	                                                        <label for="customer_contact"> Contact Number </label>
	                                                        <span class="input-group-addon">
	                                                            <i class="fa fa-user"></i>
	                                                        </span>
	                                                    </div>
	                                                    @if($errors->has('customer_contact')) 
			                                                <blockquote>
			                                                    <footer><cite title="Source Title">{{ $errors->first('customer_contact') }}</cite></footer>
			                                                </blockquote>
			                                            @endif
	                                                </div>
	                                                <div class="form-group form-md-line-input has-info form-md-floating-label">
	                                                    <div class="input-group left-addon">
	                                                        <input type="text" class="form-control" id="new_customer" name="customer_address" value="{{ $old_address }}@foreach($customer_edit as $customer){{ $customer->customer_address }}@endforeach" required>
	                                                        <label for="customer_address"> Address</label>
	                                                        <span class="input-group-addon">
	                                                            <i class="fa fa-user"></i>
	                                                        </span>
	                                                    </div>
	                                                    @if($errors->has('customer_address')) 
			                                                <blockquote>
			                                                    <footer><cite title="Source Title">{{ $errors->first('customer_address') }}</cite></footer>
			                                                </blockquote>
			                                            @endif
	                                                </div>
	                                            </div>
	                                        </div>    
	                                    </div>
	                                </div>
	                                <div class="price-table-footer" id="add_cus">
	                                    <input type="submit" class="btn green featured-price uppercase" value="Add it now!"/>
	                                </div>
	                                <div class="price-table-footer" id="update_cus">
	                                	<input type="hidden" name="cus_id" value="{{ $customer_id }}">
	                                    <input type="submit" class="btn green featured-price uppercase" value="Update"/>
	                                    <a href="{{ url('view_customer') }}" class="btn red featured-price uppercase">Cancel</a>
	                                </div>
	                            </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection