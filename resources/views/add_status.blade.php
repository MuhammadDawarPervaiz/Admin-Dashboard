@extends('layouts.layout')

@section('title')
    Add Status
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for pricing table samples" name="description" />
@endsection

@section('stylesheets')
	<link href="../assets/pages/css/pricing.min.css" rel="stylesheet" type="text/css" />
    @php ($path = 'add_status')
    @if($update_status)
        <style type="text/css">
            #update_status
            {
                display: block;
            }
            #add_status
            {
                display: none;
            }
        </style>
        @php ($path = 'update_status')
        @foreach($status_edit as $status)
            @php ($flag = $status->flag)
        @endforeach

        @php ($old_status = "")
        @php ($old_description = "")
        @php ($old_color = "")
    @else
        <style type="text/css">
            #update_status
            {
                display: none;
            }
        </style>
        @php ($flag = "")

        @php ($old_status = old('status'))
        @php ($old_description = old('description'))
        @php ($old_color = old('color'))
    @endif
@endsection

@section('page_level_plugins')
	<link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
@endsection

@section('theme_global_styles')

@endsection

@section('theme_layout_styles')

@endsection

@section('page_title')
    <!-- BEGIN PAGE TITLE-->
    <!-- END PAGE TITLE-->
@endsection

@section('content')
	
	<div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-share font-green"></i>
                <span class="caption-subject font-purple-intense bold uppercase">You can add new Status</span>
            </div>        
        </div>
        <div class="portlet-body">
            <div class="pricing-content-1">
                <div class="row">
                    <div class="col-md-offset-3 col-md-5">
                        <form class="price-column-container border-active" action="{{ url($path) }}" method="post">
                        	{{ csrf_field() }}
                            <div class="price-table-head bg-purple-intense">
                                <h2 class="no-margin">New Status</h2>
                            </div>
                            <div class="arrow-down border-top-purple-intense"></div>
                            <div class="price-table-pricing">
                                <h3 class="fa fa-sticky-note-o" style="margin:45px; color: #cccccc;"></h3>
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">   
                                    <div  class="col-xs-offset-1 col-xs-10 text-left mobile-padding">
                                    	<div class="form-group form-md-line-input has-info form-md-floating-label">
			                                <div class="input-group left-addon">
			                                    <input type="text" class="form-control" id="new_category" name="status" value="{{ $old_status }}@foreach($status_edit as $status){{ $status->status }}@endforeach" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required>
			                                    <label for="status"> Status Type</label>
			                                    <span class="input-group-addon">
			                                		<i class="fa fa-sticky-note-o"></i>
			                                    </span>
			                                </div>
                                            @if($errors->has('status')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('status') }}</cite></footer>
                                                </blockquote>
                                            @endif
			                            </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
			                                <textarea class="form-control" id="description" name="description" value="" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required />{{ $old_description }}@foreach($status_edit as $status){{ $status->description }}@endforeach</textarea>
			                                <label for="description">Description</label>
                                            @if($errors->has('description')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('description') }}</cite></footer>
                                                </blockquote>
                                            @endif
			                            </div>
                                        <div class="form-group form-md-line-input form-md-floating-label">
                                            <label for="description">Choose a background color for status </label>
                                            <input type="color" id="color" name="color" value="{{ $old_color }}@foreach($status_edit as $status){{ $status->color }}@endforeach" />
                                            @if($errors->has('color')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('color') }}</cite></footer>
                                                </blockquote>
                                            @endif
                                        </div>
                                        <div class="form-group form-md-line-input form-md-floating-label" style="display: none;">
                                            <label for="default">Make Default : </label>
                                            <input type="radio" id="default" name="flag" value="1" 
                                                @if($flag)
                                                    checked
                                                @endif
                                            /> YES
                                            <input type="radio" id="default" name="flag" value="0" 
                                                @if(!$flag)
                                                    checked
                                                @endif
                                            /> NO
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer" id="add_status">
                                <input type="submit" class="btn grey-salsa btn-outline sbold uppercase price-button" value="Add Status"/>
                            </div>
                            <div class="price-table-footer" id="update_status">
                                <input type="hidden" name="status_id" value="{{ $status_id }}">
                                <input type="submit" class="btn green featured-price uppercase" value="Update"/>
                                <a href="{{ url('view_status') }}" class="btn red featured-price uppercase">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('quick_sidebar')

@endsection

@section('scripts')

@endsection