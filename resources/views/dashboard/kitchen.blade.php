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
    <style>
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
        .main_containner
        {
            background: transparent;
        }
    </style>
@stop
@section('content')
    <div class="dash_head">
        <div class="dash_txt">Welcome to Anantara</div>
        <div class="dash_time">
            Last Login : {{ date_format(date_create($user_master->last_login), "d-M-Y h:i A")}}
        </div>
    </div>
    <div class="brics_mainblock">
        <a class="dash_brics_block" href="{{url('request_item')}}">
            <div class="dash_brics_icon"><i class="fa fa-cart-plus"></i>
            </div>
            <div class="dash_brics_txt">
               Requests
            </div>
            <div class="border_gardian"></div>
        </a>
        <a href="{{url('issue')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon"><i class="fa fa-exclamation-circle"></i></div>
                <div class="dash_brics_txt">Stock Issue</div>
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
            </div>
        </a>
        <a href="{{url('Item')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="dash_brics_txt">
                    Item
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#7362fd,#57595f);
"></div>
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
                    <i class="fa fa-list"></i>
                </div>
                <div class="dash_brics_txt">
                    Menu SubCategory
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#4adeff,#01455a);
"></div>
            </div>
        </a>
        <a href="{{url('Menu')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="dash_brics_txt">
                    Menus
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ff758c ,#ff7eb3);
"></div>
            </div>
        </a>
        <a href="{{url('order')}}">
            <div class="dash_brics_block">
                <div class="dash_brics_icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <div class="dash_brics_txt">
                    Order
                </div>
                <div class="border_gardian" style="
    background: -webkit-linear-gradient(#ffa8a7,#ff0d15);
"></div>
            </div>
        </a>
    </div>
        <div class="col-md-12 seperate " style="display: none">
            <table width="100%" border="0" align="left">
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
                    {{--<td align="center"><a href="vehicle"><i--}}
                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-bus"></i><br>--}}
                    {{--<h4>Vehicles</h4></a></td>--}}
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
                {{--<tr>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td align="center"><a href="http://www.monkeyjobs.in/admin/industries"><i--}}
                {{--class="fa fa-desktop awesome_style"></i><br>--}}
                {{--Job Industries</a></td>--}}
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
                {{--</tr>--}}
                {{--<tr>--}}
                {{--<td align="center">&nbsp;</td>--}}
                {{--<td align="center">&nbsp;</td>--}}
                {{--<td align="center">&nbsp;</td>--}}
                {{--<td align="center">&nbsp;</td>--}}
                {{--<td align="center">&nbsp;</td>--}}
                {{--</tr>--}}
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
        </div>
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