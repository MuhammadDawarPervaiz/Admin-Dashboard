@extends('layouts.layout')

@section('title')
    Settings
@endsection

@section('stylesheets')
	<link href="../assets/pages/css/pricing.min.css" rel="stylesheet" type="text/css" />
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
                <i class="icon-share font-green"></i>
                <span class="caption-subject font-green bold uppercase">You can set your settings here</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="pricing-content-1">
                <div class="row">
                    <div class="col-md-offset-3 col-md-5">
                        <form class="price-column-container border-active" action="" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="price-table-head bg-blue">
                                <h2 class="no-margin">Settings</h2>
                            </div>
                            <div class="arrow-down border-top-blue"></div>
                            <div class="price-table-pricing">
                                <h3 class="fa fa-sitemap" style="margin:45px; color: #cccccc;"></h3>             
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">
                                    <div  class="col-xs-offset-1 col-xs-10 text-left mobile-padding">
	                                    <div class="row static-info">    
                                            <div class="col-md-12 value"> 
                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                    <div class="input-icon left">
                                                        <select class="form-control " id="home_order_status" name="home_order_status" required>
                                                            <option value=""></option>
                                                            <option value="">Waiting</option>
                                                            <option value="">Ready</option>
                                                            <option value="">Expired</option>
                                                            <option value="">Canceled</option>
                                                            <option value="">Delivered</option>                           
                                                        </select>
                                                        <label for="home_order_status">Select Home Order Status</label>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Select Status for Home Order</span>
                                                    </div>
                                                    @if($errors->has('home_order_status')) 
                                                        <blockquote>
                                                            <footer><cite title="Source Title">{{ $errors->first('home_order_status') }}</cite></footer>
                                                        </blockquote>
                                                    @endif
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row static-info">    
                                            <div class="col-md-12 value"> 
                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                    <div class="input-icon left">
                                                        <select class="form-control " id="sms_api" name="sms_api" required>
                                                            <option value=""></option>
                                                            <option value="">It is not</option>
                                                            <option value="">Skebby</option>
                                                            <option value="">Clickatell</option>
                                                        </select>
                                                        <label for="sms_api">Select SMS API</label>
                                                        <div class="form-control-focus"> </div>
                                                        <span class="help-block">Select API for SMS</span>
                                                    </div>
                                                    @if($errors->has('sms_api')) 
                                                        <blockquote>
                                                            <footer><cite title="Source Title">{{ $errors->first('sms_api') }}</cite></footer>
                                                        </blockquote>
                                                    @endif
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="text" class="form-control" id="sms_api_username" name="sms_api_username" value="" required>
                                                    <label for="sms_api_username">API Username</label>
                                                    <span class="help-block">SMS API Username</span>
                                                </div>
                                                @if($errors->has('sms_api_username')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('sms_api_username') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="password" class="form-control" id="sms_api_password" name="sms_api_password" value="" required>
                                                    <label for="sms_api_password">API Password</label>
                                                    <span class="help-block">SMS API Password</span>
                                                </div>
                                                @if($errors->has('sms_api_password')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('sms_api_password') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="text" class="form-control" id="sms_api_id_clicktell" name="sms_api_id_clicktell" value=""/>
                                                    <label for="sms_api_id_clicktell">API ID <em>(Required for only Clicktell)</em></label>
                                                    <span class="help-block">SMS API ID</span>
                                                </div>
                                                @if($errors->has('sms_api_id_clicktell')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('sms_api_id_clicktell') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="text" class="form-control" id="sms_sender_name" name="sms_sender_name" value=""/>
                                                    <label for="sms_sender_name">Sender Name</label>
                                                    <span class="help-block">SMS Sender Name</span>
                                                </div>
                                                @if($errors->has('sms_sender_name')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('sms_sender_name') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <label for="sms_on_order_creation">Send SMS to the customer on the order creation</label>
                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="sms_on_order_creation" id="on" autocomplete="off"> ON
                                                    </label>
                                                    <label class="btn btn-danger active">
                                                        <input type="radio" name="sms_on_order_creation" id="off" autocomplete="off" checked> OFF
                                                    </label>
                                                </div>
                                                @if($errors->has('sms_on_order_creation')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('sms_on_order_creation') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="text" class="form-control" id="company_name" name="company_name" value=""/>
                                                    <label for="company_name">Name</label>
                                                    <span class="help-block">Company Name</span>
                                                </div>
                                                @if($errors->has('company_name')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('company_name') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="text" class="form-control" id="phone" name="phone" value=""/>
                                                    <label for="phone">Phone</label>
                                                    <span class="help-block">Phone Number</span>
                                                </div>
                                                @if($errors->has('phone')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('phone') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="text" class="form-control" id="business_address" name="business_address" value=""/>
                                                    <label for="business_address">Business Address</label>
                                                    <span class="help-block">Business Address</span>
                                                </div>
                                                @if($errors->has('business_address')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('business_address') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label" >
                                                    <input type="email" class="form-control" id="email" name="email" value=""/>
                                                    <label for="email">E-mail</label>
                                                    <span class="help-block">E-mail</span>
                                                </div>
                                                @if($errors->has('email')) 
                                                    <blockquote>
                                                        <footer><cite title="Source Title">{{ $errors->first('email') }}</cite></footer>
                                                    </blockquote>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-12 value">
                                                <div class="form-group form-md-line-input form-md-floating-label">
                                                    <textarea class="form-control" id="privacy_policy" name="privacy_policy" value="" required>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</textarea>
                                                    <label for="privacy_policy">Privacy Policy</label>
                                                    @if($errors->has('privacy_policy')) 
                                                        <blockquote>
                                                            <footer><cite title="Source Title">{{ $errors->first('privacy_policy') }}</cite></footer>
                                                        </blockquote>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-md-line-input has-info form-md-floating-label">
                                            <label for="company_logo">Logo of the company (150 w * 70 h) Pixels</label>
                                            <div class="input-group left-addon">
                                                <input type="file"  class="form-control" id="company_logo" name="company_logo" value="" required/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-image"></i>
                                                </span>
                                            </div>
                                            @if($errors->has('company_logo')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('company_logo') }}</cite></footer>
                                                </blockquote>
                                            @endif
                                        </div>
                                        <div class="form-group form-md-line-input has-info form-md-floating-label">
                                            <label for="banner_printing">For Banner Printing (500 w * 70 h) Pixels</label>
                                            <div class="input-group left-addon">
                                                <input type="file"  class="form-control" id="banner_printing" name="banner_printing" value="" required/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-image"></i>
                                                </span>
                                            </div>
                                            @if($errors->has('banner_printing')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('banner_printing') }}</cite></footer>
                                                </blockquote>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer" id="add_cat">
                                <input type="submit" class="btn grey-salsa btn-outline sbold uppercase price-button" value="Save"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection