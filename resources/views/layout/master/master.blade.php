<?php
if (!isset($_SESSION)) {
    session_start();
}
if (is_null($_SESSION['user_master'])) {
    //echo 'Please Login';
    return redirect('/');
}
?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>
    <title>@yield('title')</title>

    {{--<script src="https://code.jquery.com/jquery-1.11.3.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    {{--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>--}}
    <script src="{{ url('assets/js/jquery-1.11.3.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap1.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery-ui.js') }}"></script>


    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
{{--    <link href="{{ url('assets/css/font-awesome.min.css') }}" rel="stylesheet"/>--}}
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/bootstrap1.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap-chosen.css') }}" rel="stylesheet"/>
    <link href="{{ url('assets/css/font-awesome-animation.min.css')}}" rel="stylesheet">
    <link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/default.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/js/dataTables.uikit.min.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/select2.css')}}">
    <script src="{{ url('assets/js/select2.js') }}"></script>

    <style>
        @font-face {
            font-family: xyz;
            src: url({{url('assets/fonts/IDAutomationC39XS.ttf')}});
        }

        .barc {
            font-family: xyz;
        }
    </style>
    <link rel="shortcut icon" sizes="120x120" href="{{url('assets/img/Banjari_logo.png')}}">
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }

        .errorAlert {
            padding: 8px;
            font-size: 12px;
            font-weight: bold;
        }

        .errorClass {
            border: 1px solid red;
        }

        .errorText {
            font-size: 11px;
            font-weight: bold;
            color: red;
            margin-top: 4px;
        }

        .roundCorner {
            padding: 5px;
            border-radius: 5px;
        }

        td.highlight {
            background-color: whitesmoke !important;
        }

        .contain_wid {
            width: 1170px;
            margin: 0 auto;
        }


        .dd_ {
            width: 300px;
        }

        .bordmodal {
            border-top: none;
            border-bottom: solid 1px #eee;
            margin-bottom: 40px;
        }

        .a_txt {
            text-decoration: none !important;
            color: #6C3483 !important;
        }

        .typeDD {
            width: 100%;
        }
    </style>
    @yield('head')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<div class="navbar-nav navbar-left">--}}
                {{--<div class="h5 form-control" style="background-color: #FFFFFF">--}}
                    {{--<a class="top-menu-head" style="text-decoration: none;" href="{{url('dashboard')}}"><i--}}
                                {{--class="fa fa-home"--}}
                                {{--aria-hidden="true"></i>--}}

                        {{--<strong class="text-primary">Anantara</strong>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="nav navbar-nav navbar-right">
            @if($_SESSION['user_master']->role_master_id == 1)
                @include('layout.header.admin_header')
            @elseif($_SESSION['user_master']->role_master_id == 2)
                @include('layout.header.accounts_header')
            @elseif($_SESSION['user_master']->role_master_id == 3)
                @include('layout.header.store_header')
            @elseif($_SESSION['user_master']->role_master_id == 4)
                @include('layout.header.kitchen_header')
            @elseif($_SESSION['user_master']->role_master_id == 5)
                @include('layout.header.bar_header')
            @elseif($_SESSION['user_master']->role_master_id == 6)
                @include('layout.header.receptionist_header')
            @endif
        </div>
        {{--@include('layout.header.header')--}}
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container-fluid contain_wid">
    <div class="content gray_bg">
        <div class="row">
            <div class="col-lg-12 main_containner">
                @yield('content') {{--Place holder--}}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer">
                <div class=" pull-right">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    &nbsp;
                </div>
                &nbsp;
                <div id="modalBtn" class="pull-right">&nbsp;</div>
                {{--<button id="extraBtn1" type="button" class="btn btn-primary" style="display:none">Save changes</button>--}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="{{ url('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('assets/js/validation.js') }}"></script>
<script src="{{ url('assets/js/jquery.table2excel.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#dtTable').DataTable(
            {
                "order": [],
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,

                }]
            });
        $('.dtTable').DataTable(
            {
                "order": [],
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,

                }],
                //scrollY: '25v',
                //"iDisplayLength": 5,
                "lengthMenu": [5, 10, 25]

            });

        window.setTimeout(function () {
            $(".alert").fadeTo(3000, 0).slideUp(300, function () {
                $(this).remove();
            });
        }, 6000);

        $(function () {
            $('.dtp').datepicker({
                format: "dd-MM-yyyy",
                maxViewMode: 2,
                todayBtn: "linked",
                daysOfWeekHighlighted: "0",
                autoclose: true,
                todayHighlight: true
            });
        });
    });
    $(function () {
        $(".typeDD").select2({
            dropdownAutoWidth: 'true',
//            width: 'auto',
            cache: true
        });
    });
</script>
</body>

</html>