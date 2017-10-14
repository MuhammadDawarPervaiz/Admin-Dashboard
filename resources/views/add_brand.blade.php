@extends('layouts.layout')

@section('title')
    Add Brand
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for custom bootstrap ribbon elements to be used on any container" name="description" />
@endsection

@section('stylesheets')
    @php ($path = 'add_brand')
    @if($update_brand)
        <style type="text/css">
            #update_brand
            {
                display: block;
            }
            #add_brand
            {
                display: none;
            }
        </style>
        @php ($path = 'update_brand')

        @foreach($brand_edit as $brand)
            @php ($old_name = $brand->brand_name)
        @endforeach
        @if(old('brand_name'))
            @php ($old_name = old('brand_name'))
        @endif
    @else
        <style type="text/css">
            #update_brand
            {
                display: none;
            }
        </style>
        @php ($old_name = old('brand_name'))
    @endif
@endsection

@section('content')
    <!-- BEGIN : RIBBONS -->   
        <br>
        <br>
        <div class="row">
            <div class=" col-lg-offset-3 col-lg-6">
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="mt-element-ribbon bg-grey-steel">
                                    <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-info uppercase">
                                        <div class="ribbon-sub ribbon-clip ribbon-right"></div> Add Brand 
                                    </div>
                                    <form action="{{ url($path) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">   
                                            <div class=" col-md-offset-2 col-md-8 col-sm-8 col-xs-8">
                                               <div class="form-group form-md-line-input has-info form-md-floating-label">
                                    				<div class="input-group left-addon">
				                                        <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{ $old_name }}" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode <= 32' required />
				                                        <label for="brand_name">New Brand Name</label>
				                                        <span class="input-group-addon">
				                                            <i class="fa fa-user"></i>
				                                        </span>
				                                    </div>
                                                    @if($errors->has('brand_name')) 
                                                        <blockquote>
                                                            <footer><cite title="Source Title">{{ $errors->first('brand_name') }}</cite></footer>
                                                        </blockquote>
                                                    @endif
                                				</div>
                                                <div class="form-group form-md-line-input has-info form-md-floating-label">
				                                    <div class="input-group left-addon">
				                                        <input type="file"  class="form-control" id="brand_image" name="brand_image" value="" required>    
				                                        <span class="input-group-addon">
				                                            <i class="fa fa-image"></i>
				                                        </span>
				                                    </div>
                                                    @if ($errors->has('brand_image')) 
                                                        <blockquote>
                                                            <footer><cite title="Source Title">{{ $errors->first('brand_image') }}</cite></footer>
                                                        </blockquote>
                                                    @endif
			                                	</div>
                                                <div id="add_brand">
                                                    <input type="submit" value="Add!" class=" pull-right btn blue btn-lg featured-price uppercase"/>
                                                </div>
                                                <div class="price-table-footer" id="update_brand">
                                                    <input type="hidden" name="brand_id" value="{{ $brand_id }}">
                                                    <input type="submit" class="pull-right btn green btn-lg featured-price uppercase" value="Update"/>
                                                    <a href="{{ url('view_brand') }}" class="pull-right btn red btn-lg featured-price uppercase">Cancel</a>
                                                </div>
                                        	</div>
                                       	</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    <!-- END : RIBBONS -->

@endsection

@section('scripts')
	
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
        <link href="../assets/global/plugins/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/dropzone/basic.min.css" rel="stylesheet" type="text/css" />
        <script src="../assets/global/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
        <script src="../assets/pages/scripts/form-dropzone.min.js" type="text/javascript"></script>

@endsection