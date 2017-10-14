@extends('layouts.layout')

@section('title')
    View Status
@endsection

@section('meta_description')
	<meta content="Preview page of Metronic Admin Theme #1 for basic bootstrap tables with various options and styles" name="description" />
@endsection

@section('content')
	<div class="row" style="margin-bottom: 70px;"></div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-comments"></i>Status</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>            
                        <a href="javascript:;" class="reload"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"> No </th>
                                    <th class="text-center"> Status Name </th>
                                    <th class="text-center"> Status Description </th>
                                    <th class="text-center"> Default Status </th>
                                    <th class="text-center"> Edit </th>
                                    <th class="text-center"> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($statuses as $status)
	                                <tr>
	                                    <td class="text-center"> {{ $status->id }}</td>
	                                    <td class="active"> {{ $status->status }}</td>
	                                    <td class="success"> {{ $status->description }} </td>
                                        <td class="text-center"> 
                                            <input type="radio" name="default_status" id="default_status" value="{{ $status->id }}"
                                                @if($status->flag)
                                                    checked
                                                @endif  
                                            />
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ url('add_status') }}" id="edit-form-{{ $status->id }}" method="get">
                                                <input type="hidden" name="status_edit_id" value="{{ $status->id }}"/>
                                            </form>
                                            <a class="fa fa-edit" href="{{ url('add_status') }}" onclick="event.preventDefault();
                                                document.getElementById('edit-form-{{ $status->id }}').submit();">
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" data-href="{{ url('edit_status') }}" data-toggle="modal" data-target="#confirm-status-delete-{{ $status->id }}" class="fa fa-times"></a>

                                            <div class="modal fade" id="confirm-status-delete-{{ $status->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: grey;">
                                                <div class="modal-dialog">
                                                    <div style="margin: 40px;">
                                                        <form action="{{ url('view_status') }}" id="delete-form-{{ $status->id }}" method="post">
                                                            {{ csrf_field() }}  
                                                            <input type="hidden" name="status_del_id" value="{{ $status->id }}"/>
                                                            <input type="hidden" name="status_del_name" value="{{ $status->status }}"/>
                                                        </form>
                                                        <p>
                                                            <strong style="font-size: 1.3em;">Are you sure you want to DELETE this Status ? </strong>
                                                        </p>
                                                        <br/>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">No</button>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <a class="btn btn-danger btn-block btn-ok" href="{{ url('edit_status') }}"    onclick="event.preventDefault();
                                                                document.getElementById('delete-form-{{ $status->id }}').submit();">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
	                                </tr>
	                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection

@section('scripts')
    <!-- BEGIN AJAX SCRIPT -->
        <script src="{{ asset('js/ajax.js') }}"></script>
@endsection