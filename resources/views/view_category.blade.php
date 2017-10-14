@extends('layouts.layout')

@section('title')
    View Category
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for Portfolio 1 - Basic Grid" name="description" />
@endsection

@section('page_level_plugins')
	<link href="../assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
@endsection

@section('page_level_styles')
	<link href="../assets/pages/css/portfolio.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	<br><br>
    <div class="portfolio-content portfolio-1">
        <div id="js-grid-juicy-projects" class="cbp">
            @foreach($categories as $category)
	            <div class="cbp-item graphic">
	                <div class="cbp-caption">
	                    <div class="cbp-caption-defaultWrap">
	                        <img src="{{ asset('uploads/'.$category->category_image) }}" alt="Category Image" style="color: #fff;"/>
	                    </div>
	                    <div class="cbp-caption-activeWrap">
	                        <div class="cbp-l-caption-alignCenter">
	                            <div class="cbp-l-caption-body mt-overlay">
	                            	<div class="row uppercase">
	                            		<div class="col-md-5">
	                            			<div class="col-md-6">
	                            				<form action="{{ url('add_category') }}" id="edit-form-{{ $category->id }}" method="get">
			                                        <input type="hidden" name="category_edit_id" value="{{ $category->id }}"/>
			                                    </form>
			                                    <a class="btn btn-primary" href="{{ url('add_category') }}" onclick="event.preventDefault();
			                                        document.getElementById('edit-form-{{ $category->id }}').submit();">Edit
			                                    </a>
	                            			</div>
	                            			<div class="col-md-6">
                                                <a href="#" data-href="{{ url('edit_category') }}" data-toggle="modal" data-target="#confirm-category-delete-{{ $category->id }}" class="btn btn-danger">Delete</a>

                                                <div class="modal fade" id="confirm-category-delete-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                    <div class="modal-dialog">
                                                        <div style="margin: 40px;">
                                                            <form action="{{ url('view_category') }}" id="delete-form-{{ $category->id }}" method="post">
						                                        {{ csrf_field() }}  
						                                        <input type="hidden" name="category_del_id" value="{{ $category->id }}"/>
						                                        <input type="hidden" name="category_del_name" value="{{ $category->category_name }}"/>
						                                    </form>
                                                            <p>
                                                                <strong style="font-size: 1.3em;">Are you sure you want to DELETE this Category ? </strong>
                                                            </p>
                                                            <br/>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <a class="btn btn-danger btn-block btn-ok" href="{{ url('edit_category') }}"    onclick="event.preventDefault();
			                                        				document.getElementById('delete-form-{{ $category->id }}').submit();">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
	                            		</div>
	                            		<div class="col-md-7">
	                            			<div class="col-md-12">
	                            				<a href="{{ asset('uploads/'.$category->category_image) }}" class="cbp-lightbox cbp-l-caption-button btn btn-primary btn-block" >View larger</a>
	                            			</div>
	                            		</div>
	                            	</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Category</div>
	                <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">{{ $category->category_name }}</div>
	            </div>
	            <br/>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	    <script src="../assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
	    <script src="../assets/pages/scripts/portfolio-1.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection