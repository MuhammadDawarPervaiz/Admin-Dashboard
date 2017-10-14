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
                        <form class="price-column-container border-active" action="{{ url('general_settings') }}" method="post" enctype="multipart/form-data">
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
                                        <div class="form-group form-md-line-input has-info form-md-floating-label">
                                            <label for="company_logo">Logo of the company</label>
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
                                            <label for="banner_printing">For Banner Printing</label>
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