<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        {{--<li>--}}
        {{--<ul class="nav navbar-nav navbar-left">--}}
        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"--}}
        {{--data-close-others="false">--}}
        {{--<span style="color:#fff">  Quick Links--}}
        {{--<span class="caret"></span></span></a>--}}
        {{--<ul class="dropdown-menu">--}}
        {{--<li><a href="{{ url('booking_master') }}"><i class="fa fa-angle-double-right"></i> Bookings </a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        <ul class="nav navbar-nav">
            <li><a class="top-menu-head" href="{{url('dashboard')}}"><i class="fa fa-home"
                                                                        aria-hidden="true"></i> Home</a>
            </li>
        </ul>
        <li>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                style="color:#fff"> Hi, {{$_SESSION['user_master']->name}}
                            &nbsp;<b class="fa fa-angle-down"></b></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{url('change_password')}}"><i class="fa fa-unlock-alt"></i>Change Password</a>
                        </li>
                        {{--<li class="dropdown-header">Select Branch</li>--}}
                        {{--@foreach($_SESSION['all_branches'] as $key=>$value)--}}
                        {{--<li><a href="{{url('_switchBranch/'.$key)}}"><i class="fa fa-fw fa-building-o"></i>&nbsp;{{$value}}--}}
                        {{--</a></li>--}}
                        {{--@endforeach--}}
                        {{--<li class="divider"></li>--}}
                        <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="simple_logoimg">
            <a href="{{url('dashboard')}}"><img src="{{url('assets/img/Retinodes_logo.png')}}"/></a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;float:right;"> <i
                            class="fa fa-bars" style="font-size:30px !Important;" aria-hidden="true"
                            aria-hidden="true"> </i> </a></li>
            {{--<li><a href="{{url('home')}}" title="Home"><i class="fa fa-home"--}}
            {{--aria-hidden="true"></i><span--}}
            {{--style="margin-left:10px;"> Home</span></a></li>--}}

            {{--<li><a href="{{url('enquiry_master')}}" title="Enquiries"><i class="fa fa-users"--}}
            {{--aria-hidden="true"></i><span--}}
            {{--style="margin-left:10px;"> Enquiries</span></a></li>--}}
            <li><a href="{{url('Unit')}}" title="Unit"><i class="fa fa-snowflake-o"
                                                          aria-hidden="true"></i><span
                            style="margin-left:10px;"> Unit</span></a></li>

            <li><a href="{{url('Item')}}" title="Items"><i class="fa fa-list-ul"
                                                           aria-hidden="true"></i><span
                            style="margin-left:10px;"> Items</span></a></li>
            <li><a href="{{url('ItemCat')}}" title="Item Category"><i class="fa fa-list-ol"
                                                                      aria-hidden="true"></i><span
                            style="margin-left:10px;"> Item Category</span></a></li>

            <li><a href="{{url('Supplier')}}" title="Supplier"><i class="fa fa-users"
                                                                  aria-hidden="true"></i><span
                            style="margin-left:10px;"> Supplier</span></a></li>
            <li><a href="{{url('stock')}}" title="Create Stock"><i class="fa fa-info-circle"
                                                                   aria-hidden="true"></i><span
                            style="margin-left:10px;"> Create Stock</span></a></li>
            <li><a href="{{url('issue')}}" title="Issue Stock"><i class="fa fa-exclamation-circle"
                                                                  aria-hidden="true"></i><span
                            style="margin-left:10px;"> Issue Stock</span></a></li>
            <li><a href="{{url('request_item')}}" title="request_item"><i class="fa fa-cart-plus"
                                                                          aria-hidden="true"></i><span
                            style="margin-left:10px;"> Request Item</span></a></li>
            <li><a href="{{url('stocklist')}}" title="Stock List"><i class="fa fa-th-list"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Stock List</span></a></li>
            <li><a href="{{ url('logout') }}" title="Logout"><i class="fa fa-power-off" aria-hidden="true"> </i> <span
                            style="margin-left:10px;">Log Out </span> </a></li>

        </ul>
    </div>
</div>
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>