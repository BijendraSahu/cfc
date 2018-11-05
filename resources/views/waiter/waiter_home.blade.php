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
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
            <div class="com-block block_header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-7">
                            <h2 class="h2_header"><img src="{{url('assets_w/images/table_icon.png')}}" class="Table_Image">
                                Booking For Table <b>{{$tbl->TblNo}}</b>
                                <button type="button" id="{{ $tbl->Tid }}"
                                        class="btn btn-sm btn-success btnView" title="View Items"><span
                                            class="fa fa-eye" aria-hidden="true"></span> View Booked Items
                                </button>
                                <a href="{{url('dashboard')}}" class="btn btn-primary btn-sm">Home</a>
                            </h2>

                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="main_filter_search form-control" id="Search"
                                   placeholder="Search Item"/>
                            <input type="hidden" value="{{$tbl->Tid}}" class="tableid">
                        </div>
                        <div class="col-sm-2">
                            <div id="cart" class="card_block">
                                <p id="err"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu dynamic_tabs">
                <div class="list-group">
                    {{--<a id="0" href="#" class="list-group-item text-center dynamic_tabs_name">--}}
                    {{--<h1 class="mdi mdi-food dynamic_tabs_icon"></h1><br>All</a>--}}
                    @foreach($categories as $category)
                        <a id="{{$category->McatID}}" href="#" class="list-group-item text-center dynamic_tabs_name">
                            <h4 class="mdi mdi-food dynamic_tabs_icon"></h4>{{$category->CategoryName}}</a>
                        {{--<a id="{{$category->McatID}}" href="#" class="list-group-item text-center dynamic_tabs_name">--}}
                        {{--<h4 class="mdi mdi-food dynamic_tabs_icon"></h4><br>Non-Veg</a>--}}
                        {{--<a id="{{$category->McatID}}" href="#" class="list-group-item text-center dynamic_tabs_name">--}}
                        {{--<h4 class="mdi mdi-martini dynamic_tabs_icon"></h4><br>Bar</a>--}}
                    @endforeach
                </div>
                @if($errors->any())
                    <div role='alert' id='alert' class='alert alert-danger text-center'>{{$errors->first()}}</div>
                @endif
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                @foreach($categories as $category)
                    <div class="bhoechie-tab-content active" id="data{{$category->McatID}}">
                        <div class="bs-example">
                            <div class="panel-group" id="accordion{{$category->McatID}}">


                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<!-- train section -->--}}
                {{--<div id="data2" class="bhoechie-tab-content">--}}
                {{--<center>--}}
                {{--<h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>--}}
                {{--<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>--}}
                {{--<h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>--}}
                {{--</center>--}}
                {{--</div>--}}
                {{--<!-- hotel search -->--}}
                {{--<div id="data3" class="bhoechie-tab-content">--}}
                {{--<center>--}}
                {{--<h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>--}}
                {{--<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>--}}
                {{--<h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>--}}
                {{--</center>--}}
                {{--</div>--}}
                {{--<div id="data4" class="bhoechie-tab-content">--}}
                {{--<center>--}}
                {{--<h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>--}}
                {{--<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>--}}
                {{--<h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>--}}
                {{--</center>--}}
                {{--</div>--}}
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('#Search').keyup(function(){

                // Search text
                var text = $(this).val();

                // Hide all content class element
                $('.bhoechie-tab').hide();

                // Search and show
//                $('.search_item:contains("'+text+'")').show();
                $('.bhoechie-tab .bhoechie-tab-content .bs-example .panel-group .search_item .panel-heading .panel-title .toggle_item_name:contains("'+text+'")').closest('.bhoechie-tab').show();
//                $('.search_item:contains("'+text+'")').closest('.search_item').show();

            });
        });
//        function getBuyItem() {
//            var input = document.getElementById("Search");
//            var filter = input.value.toLowerCase();
//            var nodes = document.getElementsByClassName('list_item_toggle');
//            for (i = 0; i < nodes.length; i++) {
//                if (nodes[i].innerText.toLowerCase().includes(filter)) {
//                    nodes[i].style.display = "block";
//                } else {
//                    nodes[i].style.display = "none";
//                }
//            }
//        }
        $(".btnView").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Ordered Item List');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/userorder/" + id + "/item";
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        });


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
            var id = $('.tableid').val();
            var loadurl = "{{url('').'/'}}booked_item";
//            alert(editurl);
//            alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: loadurl,
//                data: '{"data":"' + id + '"}',
                data: {tid: id},
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
                // debugger;
//                alert();
                $(this).parent().parent().next().addClass('in');
            });
        });
        function DynamicClick(dis) {
            //debugger;
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
            {{--var tid = $('.tableid').val();--}}
            {{--var id = $(this).attr('id');--}}
            {{--var rateid = $('#menu' + id).val();--}}
            {{--var editurl = "{{url('').'/'}}menu/" + id + "/qty/" + rateid;--}}
            {{--$.ajax({--}}
                {{--type: "GET",--}}
                {{--contentType: "application/json; charset=utf-8",--}}
                {{--url: editurl,--}}
                {{--data: {data: id, tid:tid},--}}
                {{--success: function (data) {--}}
{{--//                    console.log(data);--}}
                    {{--$("#cart").html(data);--}}
{{--//                    alert('Item has been added to cart');--}}
                {{--},--}}
                {{--error: function (xhr, status, error) {--}}
                    {{--$('#err').html(xhr.responseText);--}}
{{--//                    alert('Error');--}}
                {{--}--}}
            {{--});--}}

        {{--});--}}

        $(document).click(function (e) {
//            e.stopPropagation();
            $('.menu_basic_popup').addClass('noscale');
        });

    </script>
@stop