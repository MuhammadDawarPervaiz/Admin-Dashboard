@extends('layouts.layout')

@section('title')
    Add Category
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for pricing table samples" name="description" />
@endsection

@section('stylesheets')
	<link href="../assets/pages/css/pricing.min.css" rel="stylesheet" type="text/css" />
    @php ($path = 'add_category')
    @if($update_cat)
        <style type="text/css">
            #update_cat
            {
                display: block;
            }
            #add_cat
            {
                display: none;
            }
        </style>
        @php ($path = 'update_category')

        @foreach($category_edit as $category)
            @php ($old_name = $category->category_name)
        @endforeach
        @if(old('category_name'))
            @php ($old_name = old('category_name'))
        @endif
    @else
        <style type="text/css">
            #update_cat
            {
                display: none;
            }
        </style>
        @php ($old_name = old('category_name'))
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
                <i class="icon-share font-green"></i>
                <span class="caption-subject font-green bold uppercase">You can add new Category</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="pricing-content-1">
                <div class="row">
                    <div class="col-md-offset-3 col-md-5">
                        <form class="price-column-container border-active" action="{{ url($path) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="price-table-head bg-blue">
                                <h2 class="no-margin">New Category</h2>
                            </div>
                            <div class="arrow-down border-top-blue"></div>
                            <div class="price-table-pricing">
                                <h3 class="fa fa-sitemap" style="margin:45px; color: #cccccc;"></h3>             
                            </div>
                            <div class="price-table-content">
                                <div class="row mobile-padding">
                                    <div  class="col-xs-offset-1 col-xs-10 text-left mobile-padding">
	                                    <div class="form-group form-md-line-input has-info form-md-floating-label">
			                                <div class="input-group left-addon">
			                                    <input type="text" class="form-control" id="new_category" name="category_name" value="{{ $old_name }}" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required/>
			                                    <label for="category_name">New Category Name</label>
			                                    <span class="input-group-addon">
			                                        <i class="fa fa-sitemap"></i>
			                                    </span>
			                                </div>
                                            @if($errors->has('category_name')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('category_name') }}</cite></footer>
                                                </blockquote>
                                            @endif
			                            </div>
	                                    <div class="form-group form-md-line-input has-info form-md-floating-label">
                                            <div class="input-group left-addon">
                                                <input type="file"  class="form-control" id="category_image" name="category_image" value="" required/>
                                                <span class="input-group-addon">
                                                    <i class="fa fa-image"></i>
                                                </span>
                                            </div>
                                            @if($errors->has('category_image')) 
                                                <blockquote>
                                                    <footer><cite title="Source Title">{{ $errors->first('category_image') }}</cite></footer>
                                                </blockquote>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="arrow-down arrow-grey"></div>
                            <div class="price-table-footer" id="add_cat">
                                <input type="submit" class="btn grey-salsa btn-outline sbold uppercase price-button" value="Add category"/>
                            </div>
                            <div class="price-table-footer" id="update_cat">
                                <input type="hidden" name="cat_id" value="{{ $category_id }}">
                                <input type="submit" class="btn green featured-price uppercase" value="Update"/>
                                <a href="{{ url('view_category') }}" class="btn red featured-price uppercase">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection