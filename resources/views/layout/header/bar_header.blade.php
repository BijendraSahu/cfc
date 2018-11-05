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
                        {{--<li><a href="{{ url('enquiry') }}"><i class="fa fa-angle-double-right"></i> Enquiries </a>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{ url('lead') }}"><i class="fa fa-angle-double-right"></i> Leads </a>--}}
                        {{--</li>--}}
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
                        <li><a href="{{url('change_password')}}"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                        {{--<li class="divider"></li>--}}
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
        <ul class="sidebar-nav" style="margin-left:0;">
            <li class="sidebar-brand"><a href="#menu-toggle" id="menu-toggle" style="margin-top:20px;float:right;"> <i
                            class="fa fa-bars" style="font-size:30px !Important;" aria-hidden="true"
                            aria-hidden="true"> </i> </a></li>
            {{--<li><a href="{{url('dashboard')}}" title="Home"><i class="fa fa-home"--}}
                                                               {{--aria-hidden="true"></i><span--}}
                            {{--style="margin-left:10px;"> Home</span></a></li>--}}

            {{--<li><a href="{{url('enquiry')}}" title="Enquiries"><i class="fa fa-users"--}}
            {{--aria-hidden="true"></i><span--}}
            {{--style="margin-left:10px;"> Enquiries</span></a></li>--}}

            <li><a href="{{url('request_item')}}" title="request_item"><i class="fa fa-cart-plus"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Request Item</span></a></li>

            <li><a href="{{url('issue')}}" title="issue"><i class="fa fa-exclamation-circle"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Issue</span></a></li>
            <li><a href="{{url('ItemCat')}}" title="Item Category"><i class="fa fa-list-ol"
                                                           aria-hidden="true"></i><span
                            style="margin-left:10px;"> Item Category</span></a></li>
            <li><a href="{{url('Item')}}" title="Items"><i class="fa fa-list-ul"
                                                                          aria-hidden="true"></i><span
                            style="margin-left:10px;"> Items</span></a></li>
            <li><a href="{{url('ingredient')}}" title="Menu Ingredient"><i class="fa fa-list-alt"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Ingredient</span></a></li>
            <li><a href="{{url('MCATE')}}" title="Menu Category"><i class="fa fa-hospital-o"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menu Category</span></a></li>
            <li><a href="{{url('Menu')}}" title="Menus"><i class="fa fa-bars"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Menus</span></a></li>
            <li><a href="{{url('order')}}" title="Order"><i class="fa fa-pencil-square-o"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Order</span></a></li>
            <li><a href="{{url('getbill')}}" title="Order"><i class="fa fa-pencil-square"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Billing</span></a></li>
            <li><a href="{{url('bill_list')}}" title="Bill List"><i class="fa fa-file-text"
                                                                     aria-hidden="true"></i><span
                            style="margin-left:10px;"> Bill List</span></a></li>
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