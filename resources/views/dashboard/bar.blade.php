{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: nec--}}
{{--* Date: 15-Jun-17--}}
{{--* Time: 2:56 PM--}}
{{--*/--}}
@extends('layout.master.master')

@section('title', 'Home')

@section('head')
    <link href="{{ url('assets/css/font-awesome-animation.min.css') }}" rel="stylesheet"/>
    {{--    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet"/>--}}
    <style type="text/css">
        .time {
            padding-right: 10px
        }

        .badge_capacity {
            display: inline-block;
            min-width: 10px;
            /*padding: 3px 7px;*/
            padding: 6px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            background-color: #a94442;
            border-radius: 10px;
        }

        .a_txt {
            text-decoration: none;
        !important;
        }

        .awesome_style {
            font-size: 100px;
            text-decoration: none;
        }

        .content {
            background-color: transparent;
        }
        .chart_block
        {
            position: absolute;
            z-index: 11;
            bottom: 45px;
            left: 0px;
            width: 100%;
            padding: 0px 15px;
        }
        .brics_overlay
        {
            position:absolute;
            width: 100%;
            height: 100%;
            top:0px;
            left:0px;
            z-index: 15;

        }
        .overview-chart {
            height: 60px;
            position: relative;
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }

        .overview-chart canvas {
            width: 100%;
        }
        .main_containner
        {
            background: transparent;
        }
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }
    </style>
@stop
@section('content')
    <div class="dash_head">
        <div class="dash_txt">Welcome to CFC</div>
        <div class="dash_time">
            Last Login : {{ date_format(date_create($user_master->last_login), "d-M-Y h:i A")}}
        </div>
    </div>
    <div class="brics_mainblock">
        <a class="dash_brics_block" href="{{url('request_item')}}">
            <div class="dash_brics_icon">            <i class="fa fa-cart-plus"></i>
            </div>
            <div class="dash_brics_txt">
                Requests
            </div>
            <div class="border_gardian"></div>
            <div class="brics_overlay"></div>
            {{--  <div class="chart_block">
                           <div class="overview-chart">
                               <canvas class="widgetChart1" id="widgetChart"></canvas>
                           </div>
                       </div>--}}
        </a>
        <a href="{{url('issue')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon"><i class="fa fa-exclamation-circle"></i></div>
                <div class="dash_brics_txt">Issue Stock</div>
                <div class="border_gardian" style="background: -webkit-linear-gradient(#fd6562,#324a82);"></div>
            </div>
        </a>
        <a href="{{url('ItemCat')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ol"></i>
                </div>
                <div class="dash_brics_txt">
                    Item Category
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#2bf38d,#798cb9);
"></div>
                <div class="brics_overlay"></div>
                <div class="chart_block">
                    <div class="overview-chart">
                        <canvas class="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{url('Item')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="dash_brics_txt">
                   Item
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#7362fd,#57595f);
"></div>
                <div class="brics_overlay"></div>
                <div class="chart_block">
                    <div class="overview-chart">
                        <canvas class="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{url('Ingredient')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-alt"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu Ingredients
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ffed0f,#615f25);
"></div>
            </div>
        </a>
        <a href="{{url('Menu')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-pencil-square-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Menus
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ff758c ,#ff7eb3);
"></div>
            </div>
        </a>
        <a href="{{url('MCATE')}}">
            <div class="dash_brics_block">

                <div class="dash_brics_icon">
                    <i class="fa fa-hospital-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu Category
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ecd2d4,#000000);
"></div>
            </div>
        </a>
        <a href="{{url('subcategory')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ol"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu SubCategory
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#4adeff,#01455a);
"></div>
            </div>
        </a>
        <a href="{{url('order')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-info"></i>
                </div>
                <div class="dash_brics_txt">
                    Order
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#00000094,#adadad);
"></div>
            </div>
        </a>
        <a href="{{url('getorder')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-align-center"></i>
                </div>
                <div class="dash_brics_txt">
                    Kot
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ffa8a7,#ff0d15);
"></div>
            </div>
        </a>
        <a href="{{url('finalbill')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class=" fa fa-file-text"></i>
                </div>
                <div class="dash_brics_txt">
                    Print Bill
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#c5c5c5,#324a82);
"></div>
            </div>
        </a>
        <a href="{{url('bill_list')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Bill List
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#d800ff,#1f459e);
"></div>
            </div>
        </a>
        <a href="{{url('table_settle')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-bus"></i>
                </div>
                <div class="dash_brics_txt">
                    Table Settlement
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#535454,#1f6f88);
"></div>
            </div>
        </a>
        <a href="{{url('shift')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-info"></i>
                </div>
                <div class="dash_brics_txt">
                    Shift Settlement
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ee9ca7 ,#ffdde1);
"></div>
            </div>
        </a>
        <a href="{{url('http://192.168.1.3:93/dashboard.aspx')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-align-center"></i>
                </div>
                <div class="dash_brics_txt">
                    Reports
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#1e3c72 ,#2a5298);
"></div>
            </div>
        </a>
        <a href="{{url('billst')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class=" fa fa-calendar-check-o"></i>
                </div>
                <div class="dash_brics_txt">
                    Sattled Bill
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#c79081 ,#dfa579);
"></div>
            </div>
        </a>
    </div>
    <table width="100%" border="0" align="left" style="display: none">
        <tbody>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td width="19%" align="center"><a href="{{url('request_item')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-reply"></i><br>
                    <h4>Requests</h4></a></td>
            <td width="16%" align="center"><a href="{{url('issue')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-industry"></i><br>
                    <h4>Issue Stock</h4></a></td>
            <td width="16%" align="center"><a href="{{url('ItemCat')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-reply-all"></i> <br>
                    <h4>Item Category</h4></a></td>
            <td width="16%" align="center"><a href="{{url('Item')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-info-circle"></i><br>
                    <h4>Item</h4></a></td>
            <td width="16%" align="center"><a href="{{url('Ingredient')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-align-center"></i><br>
                    <h4>Menu Ingredients</h4></a></td>
            <td width="16%" align="center"><a href="{{url('MCATE')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-area-chart"></i><br>
                    <h4>Menu Category</h4></a></td>
            {{--<td width="19%" align="center"><a href="{{url('Unit')}}" class="a_txt"><i--}}
            {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-address-book"></i><br>--}}
            {{--<h4>Units</h4></a></td>--}}
            {{--<td width="19%" align="center"><a href="{{url('ItemCat')}}" class="a_txt"><i--}}
            {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-reply-all"></i> <br>--}}
            {{--<h4>Item Category</h4></a></td>--}}
            {{--<td width="19%" align="center"><a href="{{url('EMPTYPE')}}" class="a_txt"><i--}}
            {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-location-arrow"></i><br>--}}
            {{--<h4>Emp Type</h4></a></td>--}}
            {{--<td width="19%" align="center"><a href="{{url('MCATE')}}" class="a_txt"><i--}}
            {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-hospital-o"></i><br>--}}
            {{--<h4>Menu Category</h4></a></td>--}}
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            {{--<td><a href="http://www.monkeyjobs.in/admin/profiles_lists"></a></td>--}}
        </tr>
        <tr>

            <td width="16%" align="center"><a href="{{url('subcategory')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-align-right"></i><br>
                    <h4>Menu SubCategory</h4></a></td>
            <td width="16%" align="center"><a href="{{url('Menu')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-bar-chart"></i><br>
                    <h4>Menus</h4></a></td>
            <td width="16%" align="center"><a href="{{url('order')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-clock-o"></i><br>
                    <h4>Order</h4></a></td>
            <td width="16%" align="center"><a href="{{url('getorder')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-clock-o"></i><br>
                    <h4>KOT</h4></a></td>

            {{--<td width="16%" align="center"><a href="{{url('getbill')}}" class="a_txt"><i--}}
            {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-building-o"></i><br>--}}
            {{--<h4>Print Dummy Bill</h4></a></td>--}}

            <td width="16%" align="center"><a href="{{url('finalbill')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-building-o"></i><br>
                    <h4>Print Bill</h4></a></td>
            <td width="16%" align="center"><a href="{{url('bill_list')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-building-o"></i><br>
                    <h4>Bill List</h4></a></td>


            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/invite_employer"><i--}}
            {{--class="fa awesome_style fa-envelope"></i><br>--}}
            {{--Invite Employer</a></td>--}}
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/invite_jobseeker"><i--}}
            {{--class="fa awesome_style fa-users"></i> <br>--}}
            {{--Invite Jobseeker</a></td>--}}
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/email_template"><i--}}
            {{--class="fa fa-envelope awesome_style"></i><br>--}}
            {{--Email Templates</a></td>--}}
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/ads"><i--}}
            {{--class="fa awesome_style fa-bullhorn"></i><br>--}}
            {{--Ads</a></td>--}}
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td width="16%" align="center"><a href="{{url('table_settle')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-table"></i><br>
                    <h4>Table Settlement</h4></a></td>
            <td width="16%" align="center"><a href="{{url('shift')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-shirtsinbulk"></i><br>
                    <h4>Shift Settlement</h4></a></td>

            <td width="16%" align="center"><a target="_blank" href="{{url('http://192.168.1.3:93/dashboard.aspx')}}"
                                              class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-registered"></i><br>
                    <h4>Reports</h4></a></td>
            <td width="16%" align="center"><a href="{{url('billst')}}" class="a_txt"><i
                            class="fa awesome_style animated-hover faa-tada faa-fast fa-edit"></i><br>
                    <h4>Sattled Bill</h4></a></td>
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/institute"><i--}}
            {{--class="fa awesome_style fa-university"></i><br>--}}
            {{--Institute</a></td>--}}
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/salary"><i--}}
            {{--class="fa awesome_style fa-money"></i> <br>--}}
            {{--Salary</a></td>--}}
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/qualification"><i--}}
            {{--class="fa  awesome_style fa-graduation-cap">&nbsp;</i><br>--}}
            {{--Qualification</a></td>--}}
            {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/prohibited_keyword"><i--}}
            {{--class="fa awesome_style fa-tags"></i><br>--}}
            {{--Manage Prohibited Keywords</a></td>--}}
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        {{--<tr>--}}
        {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/skills"><i--}}
        {{--class="fa awesome_style fa-tags"></i><br>--}}
        {{--Manage Skills</a></td>--}}
        {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/manage_newsletters"><i--}}
        {{--class="fa fa-envelope awesome_style"></i><br>--}}
        {{--Manage Newsletters</a></td>--}}
        {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/job_alert_queue"><i--}}
        {{--class="fa fa-envelope awesome_style"></i><br>--}}
        {{--Job Alert Queue</a></td>--}}
        {{--<td align="center"></td>--}}
        {{--<td align="center"></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td align="center">&nbsp;</td>--}}
        {{--<td align="center">&nbsp;</td>--}}
        {{--<td align="center">&nbsp;</td>--}}
        {{--<td align="center">&nbsp;</td>--}}
        {{--<td align="center">&nbsp;</td>--}}
        {{--</tr>--}}
        </tbody>
    </table>
    <div class="col-md-12 seperate ">
        {{--@foreach($tbls as $tbl)--}}
        {{--<div style="display: inline-block"><a href="{{url('registration')}}" class="a_txt"><i--}}
        {{--class="fa awesome_style animated-hover faa- faa-fast"><img--}}
        {{--src="{{url('assets/img/table_book.png')}}" alt="" width="45%"></i><br>--}}
        {{--<h4 style="margin-left: 7%;">{{$tbl->TblNo}}</h4></a></div>--}}
        {{--@endforeach--}}
    </div>
{{--    <script type="text/javascript"
            href="https://colorlib.com/polygon/cooladmin/vendor/chartjs/Chart.bundle.min.js"></script>--}}

    <script type="text/javascript">
        var start = new Date;
        start.setSeconds(start.getSeconds());
        $('.time').text('Date & Time: ' + set_format(start));
        setInterval(function () {
            start.setSeconds(start.getSeconds() + 1);
            $('.time').text('Date & Time: ' + set_format(start));
        }, 1000);

        function set_format(d) {
            var dd = appendZ(d.getDate());
            var MM = appendZ(d.getMonth() + 1);
            var yyyy = d.getFullYear();
            var h = appendZ(d.getHours());
            var m = appendZ(d.getMinutes());
            var s = appendZ(d.getSeconds());
            var temp = (h < 12) ? ' AM' : ' PM';

            return dd + '-' + MM + '-' + yyyy + ' ' + hours12(h) + ':' + m + ':' + s + temp;
        }

        function appendZ(d) {
            if (d < 10) {
                d = '0' + d;
            }
            return d;
        }

        function hours12(h) {
            return (h + 24) % 12 || 12;
        }
    </script>
@stop