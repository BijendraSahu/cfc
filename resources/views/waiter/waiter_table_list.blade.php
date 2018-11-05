@extends('layout.master.waiter_master')

@section('title', 'CFC:Home')

@section('head')
    <style type="text/css">
        .collapse_dynamic {
            transition: .5s all;
        }

    </style>
@stop

@section('content')
    {{--<div class="container">--}}
    <div class="content_block form-group">
        <div class="com-block block_header">
            <div class="row">
                <div class="col-sm-12">
                    {{--<h2 class="h2_header">Choose & Login</h2>--}}
                    <h2 class="h2_header"><img src="{{url('assets_w/images/table_icon.png')}}" class="Table_Image">
                        Select Table For Booking
                    </h2>
                    <div class="card_block">
                        <a class="a_txt" title="Logout" href="{{ url('wlogout') }}"><i class="fa fa-power-off"></i>
                            Logout</a>
                    </div>
                </div>

            </div>
        </div>
        {{--<div class="container">--}}
            @php
                $table_categories = \App\TableCategory::where(['is_active'=>1])->get();
            @endphp
            @foreach($table_categories as $category)
                <div class="col-md-12">
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$category->category}}</h3>
                            <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="panel-body">
                            @php
                                $tblss = \App\Tbl_Table::where(['Isdeleted' => 0,'table_category_id'=>$category->id])->get();
                            @endphp
                            @if(count($tblss)>0)
                                @foreach($tblss as $tbl)
                                    <div class="col-sm-2 col-xs-4">
                                        <div class="divblk"><a href="{{url('table').'/'.$tbl->Tid.'/'.$tbl->TblNo}}"
                                                               class="a_txt"><i
                                                        class="fa awesome_style animated-hover faa- faa-fast">
                                                    <img src="{{url('assets_w/images/table_icon.png')}}" alt=""></i>

                                                @if($tbl->is_booked == 1)
                                                    <h4 style="color: red">{{$tbl->TblNo}}</h4>
                                                @else
                                                    <h4>{{$tbl->TblNo}}</h4>
                                                @endif
                                            </a></div>
                                    </div>
                                @endforeach
                            @else
                                <span>No Table available for {{$category->category}}</span>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="com-block content-body waiter_list">
            <div class="col-sm-12">

            </div>
        </div>
    {{--</div>--}}
    {{--</div>--}}

    <script>
        $(document).on('click', '.panel-heading span.clickable', function (e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
        })
        $(document).ready(function () {
            $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
            });
            /********* load Cart product********/
            var id = 1;
            var loadurl = "{{url('').'/'}}booked_item";
//            alert(editurl);

            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: loadurl,
//                data: '{"data":"' + id + '"}',
                data: {data: id},
                success: function (data) {
                    $("#cart").html(data);
                },
                error: function (xhr, status, error) {
                    $('#err').html(xhr.responseText);
                }
            });
            /********* load Cart product********/
            /*********First Time load all product********/
            $('#accordion').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            var btnId = 0;
            var send_to_url = '{{ url('/') }}' + "/menu/" + btnId + "/filter";
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,

                success: function (data) {
                    $("#accordion" + btnId).html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#accordion" + btnId).html(xhr.responseText);
                }
            });
            /*********First Time load all product********/
        });
        //DynamicClick();
        $('.dynamic_tabs_name').click(function () {
            var btnId = this.id;
            $('#accordion' + btnId).html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
//            alert(btnId);

            var send_to_url = '{{ url('/') }}' + "/menu/" + btnId + "/filter";
//            alert(send_to_url);
            $.ajax({
                type: "get",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,
                success: function (data) {
                    $("#accordion" + btnId).html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#accordion" + btnId).html(xhr.responseText);
                }
            });
            $('.dynamic_click').click(function () {
                debugger;
                alert();
                $(this).parent().parent().next().addClass('in');
            });
        });
        function DynamicClick(dis) {
            debugger;
            var chk_collapse = $(dis).parent().parent().next().attr('class');
            $('.collapse_dynamic').removeClass('in');
            $('.dynamic_click i').addClass('mdi-plus');
            $('.dynamic_click i').removeClass('mdi-minus');
            if (chk_collapse == "panel-collapse collapse collapse_dynamic") {
                $(dis).find('.mdi').removeClass('mdi-plus');
                $(dis).find('.mdi').addClass('mdi-minus');
                $(dis).parent().parent().next().addClass('in');
            }
        }
        {{--$(document).on('click', '.number-spinner button', function () {--}}
{{--//            $('#myModal').modal('show');--}}
{{--//            $('.modal-title').html('Edit Place');--}}
                    {{--$('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');--}}
            {{--var id = $(this).attr('id');--}}
            {{--var rateid = $('#menu' + id).val();--}}
            {{--var editurl = "{{url('').'/'}}menu/" + id + "/qty/" + rateid;--}}
{{--//            alert(editurl);--}}

            {{--$.ajax({--}}
                {{--type: "GET",--}}
                {{--contentType: "application/json; charset=utf-8",--}}
                {{--url: editurl,--}}
{{--//                data: '{"data":"' + id + '"}',--}}
                {{--data: {data: id},--}}
                {{--success: function (data) {--}}
{{--//                    console.log(data);--}}
                    {{--$("#cart").html(data);--}}
{{--//                    alert('Item has been added to cart');--}}
                {{--},--}}
                {{--error: function (xhr, status, error) {--}}
                    {{--$('#err').html(xhr.responseText);--}}
{{--//                    alert('Error');--}}
                    {{--//$('.modal-body').html("Technical Error Occured!");--}}
                {{--}--}}
            {{--});--}}
            {{--/* $('.tootgle_btn').click(function () {--}}
             {{--debugger;--}}
             {{--$(this).parent().parent().next().addClass('in');--}}
             {{--});*/--}}
        {{--});--}}

        $(document).click(function () {
            // $('.menu_basic_popup').addClass('noscale');
        });

    </script>
@stop