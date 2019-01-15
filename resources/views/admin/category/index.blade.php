@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.category.index') !!}
@endsection

@section('content')

    <ol class='example'>
        <li>First</li>
        <li>Second</li>
        <li>Third</li>
    </ol>


    {{--todo docs jqeury nestable maxDepth 2--}}
    {{--https://github.com/dbushell/Nestable--}}

    {{--<div class="row">--}}
        {{--<div class="col-9">--}}

            {{--<div class="row">--}}
                {{--<div class="col-md-8">--}}
                    {{--<div class="well">--}}
                        {{--<p class="lead"><a href="#newModal" class="btn btn-default pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> new menu item</a> Menu:</p>--}}
                        {{--<div class="dd" id="nestable">--}}
                            {{--{!! $category->renderMenu() !!}--}}
                        {{--</div>--}}

                        {{--<p id="success-indicator" style="display:none; margin-right: 10px;">--}}
                            {{--<span class="glyphicon glyphicon-ok"></span> Menu order has been saved--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="well">--}}
                        {{--<p>Drag items to move them in a different order</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="dd">
        <ol class="dd-list">
            <li class="dd-item" data-id="1">
                <div class="dd-handle">Item 1</div>
            </li>
            <li class="dd-item" data-id="2">
                <div class="dd-handle">Item 2</div>
            </li>
            <li class="dd-item" data-id="3">
                <div class="dd-handle">Item 3</div>
                <ol class="dd-list">
                    <li class="dd-item" data-id="4">
                        <div class="dd-handle">Item 4</div>
                    </li>
                    <li class="dd-item" data-id="5">
                        <div class="dd-handle">Item 5</div>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

            {{--<!-- Create new item Modal -->--}}
            {{--<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                {{--<div class="modal-dialog">--}}
                    {{--<div class="modal-content">--}}
                        {{--{{ Form::open(array('url'=>'admin/menu/new','class'=>'form-horizontal','role'=>'form'))}}--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                            {{--<h4 class="modal-title">Provide details of the new menu item</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="title" class="col-lg-2 control-label">Title</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--{{ Form::text('title',null,array('class'=>'form-control'))}}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="label" class="col-lg-2 control-label">Label</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--{{ Form::text('label',null,array('class'=>'form-control'))}}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="url" class="col-lg-2 control-label">URL</label>--}}
                                {{--<div class="col-lg-10">--}}
                                    {{--{{ Form::text('url',null,array('class'=>'form-control'))}}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                            {{--<button type="submit" class="btn btn-primary">Create</button>--}}
                        {{--</div>--}}
                        {{--{{ Form::close()}}--}}
                    {{--</div><!-- /.modal-content -->--}}
                {{--</div><!-- /.modal-dialog -->--}}
            {{--</div><!-- /.modal -->--}}

            {{--<!-- Delete item Modal -->--}}
            {{--<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
                {{--<div class="modal-dialog">--}}
                    {{--<div class="modal-content">--}}
                        {{--{{ Form::open(array('url'=>'admin/menu/delete')) }}--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                            {{--<h4 class="modal-title">Provide details of the new menu item</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<p>Are you sure you want to delete this menu item?</p>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                            {{--<input type="hidden" name="delete_id" id="postvalue" value="" />--}}
                            {{--<input type="submit" class="btn btn-danger" value="Delete Item" />--}}
                        {{--</div>--}}
                        {{--{{ Form::close() }}--}}
                    {{--</div><!-- /.modal-content -->--}}
                {{--</div><!-- /.modal-dialog -->--}}
            {{--</div><!-- /.modal -->--}}

        {{--</div>--}}
    {{--</div>--}}


    {{--edit--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="well">--}}
                {{--<p class="lead"><a href="{{ url('admin/menu')}}" class="btn btn-default pull-right">Go Back</a> Menu:</p>--}}

{{--                {{ Form::model($item, array('url' => "admin/menu/edit/{$item->id}", 'class' => 'form-horizontal')) }}--}}
                {{--<div class="form-group">--}}
                    {{--<label for="title" class="col-lg-2 control-label">Title</label>--}}
                    {{--<div class="col-lg-10">--}}
                        {{--{{ Form::text('title',null,array('class'=>'form-control'))}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="label" class="col-lg-2 control-label">Label</label>--}}
                    {{--<div class="col-lg-10">--}}
                        {{--{{ Form::text('label',null,array('class'=>'form-control'))}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="url" class="col-lg-2 control-label">URL</label>--}}
                    {{--<div class="col-lg-10">--}}
                        {{--{{ Form::text('url',null,array('class'=>'form-control'))}}--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6 col-md-offset-6 text-right">--}}
                        {{--<button type="submit" class="btn btn-lg btn-default">Update item</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
{{--                {{ Form::close()}}--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

@endsection

@push('css')
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    {{--<link rel="stylesheet" href="/resources/demos/style.css">--}}

    {{--<style>--}}
        {{--#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }--}}
        {{--#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }--}}
        {{--#sortable li span { position: absolute; margin-left: -1.3em; }--}}
    {{--</style>--}}
    <style>
        /**
         * Nestable
         */

        body.dragging, body.dragging * {
            cursor: move !important;
        }

        .dragged {
            position: absolute;
            opacity: 0.5;
            z-index: 2000;
        }

        ol.example li.placeholder {
            position: relative;
            /** More li styles **/
        }
        ol.example li.placeholder:before {
            position: absolute;
            /** Define arrowhead **/
        }
        /*.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }*/
        /*!**!*/
        /*.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }*/
        /*.dd-list .dd-list { padding-left: 30px; }*/
        /*.dd-collapsed .dd-list { display: none; }*/

        /*.dd-item,*/
        /*.dd-empty,*/
        /*.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }*/

        /*.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;*/
            /*background: #fafafa;*/
            /*background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);*/
            /*background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);*/
            /*background:         linear-gradient(top, #fafafa 0%, #eee 100%);*/
            /*-webkit-border-radius: 3px;*/
            /*border-radius: 3px;*/
            /*box-sizing: border-box; -moz-box-sizing: border-box;*/
        /*}*/
        /*.dd-handle:hover { color: #2ea8e5; background: #fff; }*/

        /*.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }*/
        /*.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }*/
        /*.dd-item > button[data-action="collapse"]:before { content: '-'; }*/

        /*.dd-placeholder,*/
        /*.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }*/
        /*.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;*/
            /*background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),*/
            /*-webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);*/
            /*background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),*/
            /*-moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);*/
            /*background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),*/
            /*linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);*/
            /*background-size: 60px 60px;*/
            /*background-position: 0 0, 30px 30px;*/
        /*}*/

        /*.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }*/
        /*.dd-dragel > .dd-item .dd-handle { margin-top: 0; }*/
        /*.dd-dragel .dd-handle {*/
            /*-webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);*/
            /*box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);*/
        /*}*/

        /*!***/
         /** Nestable Extras*/
         /**!*/

        /*.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }*/

        /*#nestable-menu { padding: 0; margin: 20px 0; }*/

        /*#nestable-output,*/
        /*#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }*/

        /*#nestable2 .dd-handle {*/
            /*color: #fff;*/
            /*border: 1px solid #999;*/
            /*background: #bbb;*/
            /*background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);*/
            /*background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);*/
            /*background:         linear-gradient(top, #bbb 0%, #999 100%);*/
        /*}*/
        /*#nestable2 .dd-handle:hover { background: #bbb; }*/
        /*#nestable2 .dd-item > button:before { color: #fff; }*/

        /*@media only screen and (min-width: 700px) {*/

            /*.dd { float: left; width: 48%; }*/
            /*.dd + .dd { margin-left: 2%; }*/

        /*}*/

        /*.dd-hover > .dd-handle { background: #2ea8e5 !important; }*/

        /*!***/
         /** Nestable Draggable Handles*/
         /**!*/

        /*.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;*/
            /*background: #fafafa;*/
            /*background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);*/
            /*background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);*/
            /*background:         linear-gradient(top, #fafafa 0%, #eee 100%);*/
            /*-webkit-border-radius: 3px;*/
            /*border-radius: 3px;*/
            /*box-sizing: border-box; -moz-box-sizing: border-box;*/
        /*}*/
        /*.dd3-content:hover { color: #2ea8e5; background: #fff; }*/

        /*.dd-dragel > .dd3-item > .dd3-content { margin: 0; }*/

        /*.dd3-item > button { margin-left: 30px; }*/

        /*.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;*/
            /*border: 1px solid #aaa;*/
            /*background: #ddd;*/
            /*background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);*/
            /*background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);*/
            /*background:         linear-gradient(top, #ddd 0%, #bbb 100%);*/
            /*border-top-right-radius: 0;*/
            /*border-bottom-right-radius: 0;*/
        /*}*/
        /*.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }*/
        /*.dd3-handle:hover { background: #ddd; }*/

        /*!***/
         /** Socialite*/
         /*!***/
        /*.socialite { display: block; float: left; height: 35px; }*/

    </style>
@endpush

{{--todo het werkte niet omdat dit element niet de juist naam had zoals in blade admin layout is aangegeven--}}
{{--oud @push('js')--}}
@push('scripts')
    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js"></script>

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js"></script>--}}
    <script>

        // $('.dd').on('change', function() {
        //     /* on change event */
        // });
        $(document).ready(function(){
            // $(function () {
            $("#example").sortable({
                group: 'no-drop',
                handle: 'i.icon-move',
                // onDragStart: function ($item, container, _super) {
                //     // Duplicate items of the no drop area
                //     if(!container.options.drop)
                //         $item.clone().insertAfter($item);
                //     _super($item, container);
                // }
            });
            // });
            {{--dropCallback: function(details) {--}}

            {{--var order = new Array();--}}
            {{--$("li[data-id='"+details.destId +"']").find('ol:first').children().each(function(index,elem) {--}}
            {{--order[index] = $(elem).attr('data-id');--}}
            {{--});--}}
            {{--if (order.length === 0){--}}
            {{--var rootOrder = new Array();--}}
            {{--$("#nestable > ol > li").each(function(index,elem) {--}}
            {{--rootOrder[index] = $(elem).attr('data-id');--}}
            {{--});--}}
            {{--}--}}
            {{--$.post('{{url("admin/menu/")}}',--}}
            {{--{ source : details.sourceId,--}}
            {{--destination: details.destId,--}}
            {{--order:JSON.stringify(order),--}}
            {{--rootOrder:JSON.stringify(rootOrder)--}}
            {{--},--}}
            {{--function(data) {--}}
            {{--// console.log('data '+data);--}}
            {{--})--}}
            {{--.done(function() {--}}
                {{--$( "#success-indicator" ).fadeIn(100).delay(1000).fadeOut();--}}
            {{--})--}}
            {{--.fail(function() {  })--}}
            {{--.always(function() {  });--}}
            {{--}--}}
            {{--});--}}
            {{--$('.delete_toggle').each(function(index,elem) {--}}
                {{--$(elem).click(function(e){--}}
                    {{--e.preventDefault();--}}
                    {{--$('#postvalue').attr('value',$(elem).attr('rel'));--}}
                    {{--$('#deleteModal').modal('toggle');--}}
                {{--});--}}
            {{--});--}}
        });
    </script>
@endpush