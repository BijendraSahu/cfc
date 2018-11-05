<div class="icon_blockwithcount glo_menuclick"><i
            class="icon_blockwithcount_icon mdi mdi-basket"></i>
    <?php $total = 0; $gst = 0; $gtotal = 0; $itemcnt = 0; ?>
    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
        <?php if ($row->qty > 0) {
            $total += $row->price * $row->qty;
            $itemcnt++;
            $total = 0;
        } elseif ($row->qty == 0) {
            $total = 0;
        }
        ?>
    @endforeach
    <span class="cart_count">{{$itemcnt}}</span>
    <div class="menu_basic_popup effect noscale">
        {!! Form::open(['url' => 'confirm_order/'.$tid, 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
        <div class="menu_popup_head">
            Shortlisted Items list <button class="btn btn-primary btn-sm" onclick="emptycart()">Empty Cart</button> <span class="Total_orderamt"><i class="mdi mdi-currency-inr"></i>{{$total}}</span>
        </div>
        <div class="menu_popup_containner style-scroll">
            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
                @if($row->qty >0 )
                    <div class="menu_popup_row">
                        <div class="menu_popup_imgbox"><img
                                    src="{{url('menuimg/menu.png')}}"
                                    class="profile_img"></div>
                        <div class="menu_popup_text">
                            <p class="popup_text">{{$row->name}}</p>
                            <div class="popup_iconwithtime">x{{$row->qty}}
                                <i class="mdi mdi-currency-inr"></i>{{$row->price}}
                            </div>


                            <div class="input-group number-spinner card_spinner_btn">
                            <span class="input-group-btn nopadding">
                            <p class="btn btn-default addToCart plus_cardbtn"
                               onclick="minusqty(this,'{{$row->id}}')"
                               id="{{$row->id}}"
                               data-dir="dwn">
                            <span
                                    class="glyphicon glyphicon-minus"></span>
                            </p>
                            </span>
                                <input type="text" class="form-control text-center card_qty_txt"
                                       value="{{$row->qty}}"
                                       id="menu{{$row->id}}">
                                <span class="input-group-btn nopadding">
                            <p class="btn btn-default addToCart" onclick="plusqty(this,'{{$row->rowId}}')"
                               id="{{$row->id}}" data-dir="up">
                            <span class="glyphicon glyphicon-plus plus_cardbtn"></span>
                            </p>
                            </span>

                            </div>
                            <div class="pull-left">
                                {{ ($row->options->has('remark') ? $row->options->remark : '-')}}
                            </div>

                            {{--<div class="close_item effect mdi mdi-close">--}}
                            {{--<p onclick="menudelete(this,'{{$row->rowId}}')" id="{{$row->id}}"--}}
                            {{--class="close_item effect mdi mdi-close" data-toggle="tooltip"--}}
                            {{--title="Remove"></p>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>


        <div class="menu_popup_showall">
        {{--<button class="btn btn-primary"><i class="mdi mdi-shopping-cart"></i>Confirm Order--}}
        {{--</button>--}}
        {!! Form::submit('Confirm Order', ['class' => 'btn btn-sm btn-primary ']) !!}
        <!--<a class="btn btn-warning" href="http://52.15.163.153/prihul/cart"><i class="mdi mdi-shopping-cart"></i>Cart</a>-->

        </div>
        {!! Form::close() !!}
    </div>
</div>

<?php $total = 0; $gst = 0; $gtotal = 0; ?>
@foreach($cart as $row)
    <?php $total += $row->price * $row->qty ?>
@endforeach
<span class="Total_orderamt_main"><i class="mdi mdi-currency-inr"></i>
    @if($total != 0)
        {{$total}}
    @else
        {{0}}
    @endif
    </span>
<script>

    $(document).ready(function () {
        $('.glo_menuclick').click(function (e) {
            debugger;
            e.stopPropagation();
            var chk_open = $('.menu_basic_popup').attr('class');
            if (chk_open == "menu_basic_popup effect noscale") {
                $('.menu_basic_popup').addClass('noscale');
                $(this).find('.menu_basic_popup').removeClass('noscale');
            }
            else {
                $('.menu_basic_popup').addClass('noscale');
            }
        });
    });
    function showMenu() {

        $('.menu_basic_popup').removeClass('noscale');
        return false;
    }
    function plusqty(dis, rowid) {
        //event.stopPropagation();
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var rmk = $('#rmk' + id).val();
        var editurl = "{{url('').'/'}}menu/" + id + "/qty/" + 1;
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
            //                data: '{"data":"' + id + '"}',
            data: {data: id, tid: tid, rmk: rmk},
            success: function (data) {
                $("#cart").html(data);
                showMenu();
            },
            error: function (xhr, status, error) {
                $('#err').html(xhr.responseText);
                //                    alert('Error');
            }

        });
        //return false;
        //$('.menu_basic_popup').removeClass('noscale');
        //showMenu();
    }
    function minusqty(dis, rowid) {
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var qty = parseFloat(rateid) - (parseFloat(1));
        var rmk = $('#rmk' + id).val();
        var editurl = "{{url('').'/'}}menuupdate/" + id + "/qty/" + qty;
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
//                data: '{"data":"' + id + '"}',
            data: {data: rowid, tid: tid, rmk: rmk},
            success: function (data) {
                console.log(data);
                $("#cart").html(data);
                showMenu();
//                    alert('Item has been added to cart');
            },
            error: function (xhr, status, error) {
                $('#err').html(xhr.responseText);
//                    alert('Error');
            }
        });
        //return false;
        // showMenu();
    }

    function menudelete(dis, rowid) {
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var editurl = "{{url('').'/'}}cart_delete/" + id;
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
//                data: '{"data":"' + id + '"}',
            data: {data: rowid, tid: tid},
            success: function (data) {
                console.log(data);
                $("#cart").html(data);
                showMenu();
//                    alert('Item has been added to cart');
            },
            error: function (xhr, status, error) {
                $('#err').html(xhr.responseText);
//                    alert('Error');
            }
        });
    }

    function emptycart() {
        var tid = $('.tableid').val();
        var editurl = "{{url('').'/'}}cartempty";
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
//                data: '{"data":"' + id + '"}',
            data: {tid: tid},
            success: function (data) {
                console.log(data);
                $("#cart").html(data);
            },
            error: function (xhr, status, error) {
                $('#err').html(xhr.responseText);
            }
        });

    }

</script>