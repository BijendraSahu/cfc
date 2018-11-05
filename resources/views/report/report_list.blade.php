@extends('layout.master.master')

@section('title', 'Reports')

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

        .awesome_style {
            font-size: 100px;
            text-decoration: none;
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
        <a class="dash_brics_block" href="{{url('sale_report')}}">
            <div class="dash_brics_icon"><i class="fa fa-users"></i>
            </div>
            <div class="dash_brics_txt">
                Sale Report
            </div>
            <div class="border_gardian"></div>
        </a>
    </div>
    <div class="container" style="display: none;">
        {{--<div class="pull-right time badge_capacity"></div>--}}
        <div class="pull-right  badge_capacity">Last
            Login: {{ date_format(date_create($user_master->last_login), "d-M-Y h:i A")}}</div>
        <p class="clearfix"></p>
        <h2 class="text-center"
            style=" text-shadow: 1px 1px 0px black, 0 0 2px #ccc, 0 0 5px darkblue;
    ">Welcome to Anantara</h2>
        <hr/>
        <div class="col-md-12 seperate ">
            {{--<div class="col-md-2" onclick="window.location = '{{url('user_master')}}'">--}}
            {{--<div class="col-md-12 faa-parent box animated-hover bg6 style_prevu_kit">--}}
            {{--<span class="fa fa-users faa-shake faa-fast"></span><h4>Users</h4></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2" onclick="window.location = '{{url('enquiry')}}'">--}}
            {{--<div class="col-md-12 faa-parent box animated-hover bg9 style_prevu_kit">--}}
            {{--<span class="fa fa-address-book faa-shake faa-fast"></span><h4>Enquiries</h4></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2" onclick="window.location = '{{url('lead')}}'">--}}
            {{--<div class="col-md-12 box bg1 style_prevu_kit">--}}
            {{--<span class="fa fa-reply-all faa-parent animated-hover faa-shake faa-fast"></span><h4>Leads</h4>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2" onclick="window.location = '{{url('place')}}'">--}}
            {{--<div class="col-md-12 faa-parent box animated-hover bg12 style_prevu_kit">--}}
            {{--<span class="fa fa-location-arrow faa-shake faa-fast"></span><h5 style="font-size: 17px;"><b>Places</b></h5></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2" onclick="window.location = '{{url('hotel')}}'">--}}
            {{--<div class="col-md-12 faa-parent box animated-hover bg4 style_prevu_kit">--}}
            {{--<span class="fa fa-hospital-o faa-shake faa-fast"></span><h5 style="font-size: 17px;"><b>Hotels</b></h5></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-2" onclick="window.location = '{{url('vehicle')}}'">--}}
            {{--<div class="col-md-12 box bg1 style_prevu_kit">--}}
            {{--<span class="fa fa-bus faa-parent animated-hover faa-shake faa-fast"></span><h4>Vehicles</h4>--}}
            {{--</div>--}}
            {{--</div>--}}
            <table width="100%" border="0" align="left">
                <tbody>
                <tr>
                    {{--<td>&nbsp;</td>--}}
                    {{--<td>&nbsp;</td>--}}
                    {{--<td>&nbsp;</td>--}}
                    {{--<td>&nbsp;</td>--}}
                    {{--<td>&nbsp;</td>--}}
                    {{--<td> </td>--}}
                </tr>
                <tr>
                    <td width="16%" align="center"><a href="{{url('sale_report')}}" class="a_txt"><i
                                    class="fa awesome_style animated-hover faa-tada faa-fast fa-users"></i><br>
                            <h4>Sale Report</h4></a></td>
                    {{--<td width="16%" align="center"><a href="{{url('Unit')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-address-book"></i><br>--}}
                            {{--<h4>Units</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('ItemCat')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-reply-all"></i> <br>--}}
                            {{--<h4>Item Category</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('Item')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-info-circle"></i><br>--}}
                            {{--<h4>Item</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('MCATE')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-area-chart"></i><br>--}}
                            {{--<h4>Menu Category</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('subcategory')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-align-right"></i><br>--}}
                            {{--<h4>Menu SubCategory</h4></a></td>--}}
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td></td>
                </tr>
                {{--<tr>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td> </td>--}}
                {{--<td><a href="http://www.monkeyjobs.in/admin/profiles_lists"></a></td>--}}
                {{--</tr>--}}
                <tr>


                    {{--<td width="16%" align="center"><a href="{{url('Menu')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-bar-chart"></i><br>--}}
                            {{--<h4>Menus</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('Ingredient')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-align-center"></i><br>--}}
                            {{--<h4>Menu Ingredients</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('EMPTYPE')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-user-circle"></i><br>--}}
                            {{--<h4>Emp Type</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('Employee')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-user-o"></i><br>--}}
                            {{--<h4>Employee</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('Supplier')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-id-card-o"></i><br>--}}
                            {{--<h4>Supplier</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('stock')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-strikethrough"></i><br>--}}
                            {{--<h4>Stock</h4></a></td>--}}


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
                    <td></td>
                </tr>
                {{--<tr>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td> </td>--}}
                {{--<td><a href="http://www.monkeyjobs.in/admin/profiles_lists"></a></td>--}}
                {{--</tr>--}}
                <tr>
                    {{--<td width="16%" align="center"><a href="{{url('Tbl')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-table"></i><br>--}}
                            {{--<h4>Tables</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('registration')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-registered"></i><br>--}}
                            {{--<h4>Registration</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('issue')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-industry"></i><br>--}}
                            {{--<h4>Issue Stock</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="{{url('request_item')}}" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-industry"></i><br>--}}
                            {{--<h4>Request Issue Stock</h4></a></td>--}}
                    {{--<td width="16%" align="center"><a href="#" class="a_txt"><i--}}
                                    {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-superpowers"></i><br>--}}
                            {{--<h4>Report</h4></a></td>--}}
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


        </div>
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