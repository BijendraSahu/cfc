<div class="panel panel-default search_item">
    <?php $count = 1; ?>
    @foreach($menusubs as $menusub)
        <div class="panel-heading">
            <h4 class="panel-title">
                <div class="tootgle_btn dynamic_click" onclick="DynamicClick(this)" {{--data-toggle="collapse" data-parent="#accordion{{$menusub->category_id}}"
                     href="#collapse{{$count}}"--}}><i class="mdi mdi-plus"></i></div>
                <div class="toggle_item_name">{{$menusub->CategoryName}}</div>{{------------Menu Subcategory----}}
            </h4>
        </div>
        <div id="collapse{{$count}}" class="panel-collapse collapse collapse_dynamic" aria-expanded="true">
            <div class="panel-body">
                <div class="list_item_toggle">
                    @foreach($menus as $menu)
                        @if($menu->MCID == $menusub->McatID)
                            <div class="list_item_images">
                                <img src="{{url('').'/'.$menu->menu_img}}"/> {{----Menu image------}}
                            </div>
                            <div class="list_item_details">
                                <div class="list_item_namewithprise">
                                    <span class="item_name">{{$menu->M_Name}}</span> {{------------Menu Name----}}
                                    <div class="col-sm-3 pull-right">
                                        <div class="input-group number-spinner">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default addToCart"
                                                onclick="minusqty1(this,'{{$menu->MID}}')"
                                                id="{{$menu->MID}}"
                                                data-dir="dwn">
                                          <span
                                                  class="glyphicon glyphicon-minus"></span>
                                        </button> {{------Menu Minus----}}
                                      </span>
                                            <input type="text" class="form-control text-center"
                                                   value="0"
                                                   id="menu{{$menu->MID}}">
                                            {{------------Menu Qty-----------}}
                                            <span class="input-group-btn">
                                          <button class="btn btn-default addToCart"
                                                  onclick="plusqty1(this,'{{$menu->MID}}')"
                                                  id="{{$menu->MID}}" data-dir="up">
                                            <span
                                                    class="glyphicon glyphicon-plus"></span>
                                          </button> {{--------Menu Add---}}
                                        </span>
                                        </div>
                                    </div>


                                    <span class="item_prise"><i
                                                class="mdi mdi-currency-inr"></i>{{$menu->Sale_Price}}</span> {{-----Menu Price------}}
                                </div>

                                {{--<div>--}}
                                {{--<button class="spinner_addcardbtn btn-primary"--}}
                                {{--type="button"--}}
                                {{--id="{{$menu->MID}}" onclick="plusqty(this,'{{$menu->MID}}')">--}}
                                {{--<i class="fa fa-shopping-cart"></i> <span--}}
                                {{--class="button-group__text">Add</span></button>--}}
                                {{--</div>--}}
                                <div class="item_description">  {{------------Menu Description----}}
                                    {{$menu->Descriptions}}
                                </div>
                                <div>
                                    <input type="text" class="form-control" placeholder="Enter Remark" name="rmk " id="rmk{{$menu->MID}}"/>
                                </div>
                                <div class="item_qty">
                                    {{--<div class="checkbox Checkbox_btn">--}}
                                    {{--<label>--}}
                                    {{--<input type="checkbox" data-toggle="toggle">--}}
                                    {{--</label>--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
        <?php $count++; ?>
    @endforeach
</div>
<script>
    function plusqty1(dis, rowid) {
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var rmk = $('#rmk' + id).val();
        var editurl = "{{url('').'/'}}menu/" + id + "/qty/" + 1;
//        alert(rmk);
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: editurl,
//                data: '{"data":"' + id + '"}',
            data: {data: id, tid: tid, rmk: rmk},
            success: function (data) {
//                    console.log(data);
                $("#cart").html(data);
//                    alert('Item has been added to cart');
            },
            error: function (xhr, status, error) {
                $('#err').html(xhr.responseText);
//                    alert('Error');
            }
        });
    }
    function minusqty1(dis, rowid) {
        var tid = $('.tableid').val();
        var id = $(dis).attr('id');
        var rateid = $('#menu' + id).val();
        var qty = parseFloat(rateid) - (parseFloat(1));
        var rmk = $('#rmk' + id).val();
        var editurl = "{{url('').'/'}}menuupdate/" + id + "/qty/" + qty;
        if (qty >= 0) {
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
//                data: '{"data":"' + id + '"}',
                data: {data: rowid, tid: tid, rmk: rmk},
                success: function (data) {
                    console.log(data);
                    $("#cart").html(data);
//                    showMenu();
//                    alert('Item has been added to cart');
                },
                error: function (xhr, status, error) {
                    $('#err').html(xhr.responseText);
//                    alert('Error');
                }
            });
        }
        //return false;
        // showMenu();
    }
</script>
