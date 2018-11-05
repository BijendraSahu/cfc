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
    <div class="container">
        {{--<div class="pull-right time badge_capacity"></div>--}}
        <div class="pull-right  badge_capacity">Last
            Login: {{ date_format(date_create($user_master->last_login), "d-M-Y h:i A")}}</div>
        <p class="clearfix"></p>
        <h2 class="text-center"
            style=" text-shadow: 1px 1px 0px black, 0 0 2px #ccc, 0 0 5px darkblue;
    ">Welcome to CFC</h2>
        <hr/>
        <div class="col-md-12 seperate ">
            @foreach($tbls as $tbl)
                <div style="display: inline-block"><a href="{{url('table').'/'.$tbl->Tid.'/'.$tbl->TblNo}}"
                                                      class="a_txt"><i
                                class="fa awesome_style animated-hover faa- faa-fast"><img
                                    src="{{url('assets/img/table_book.png')}}" alt="" width="45%"></i>
                        <h4 style="margin-left: 12%;">{{$tbl->TblNo}}</h4></a></div>
            @endforeach



            {{--<table width="100%" border="0" align="left">--}}
            {{--<tbody>--}}
            {{--<tr>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<td width="19%" align="center"><a href="{{url('registration')}}" class="a_txt"><i--}}
            {{--class="fa awesome_style animated-hover faa-tada faa-fast fa-registered"></i><br>--}}
            {{--<h4>Registration</h4></a></td>--}}
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
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td>&nbsp;</td>--}}
            {{--<td><a href="http://www.monkeyjobs.in/admin/profiles_lists"></a></td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
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
            {{--</tr>--}}
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
            {{--</tbody>--}}
            {{--</table>--}}


        </div>
    </div>
    <script>
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