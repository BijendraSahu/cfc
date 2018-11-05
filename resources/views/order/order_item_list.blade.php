<style>
    .right_txt {
        text-align: right;
    }

    .btndd {
        margin: 3px 0px;
        padding: 2px 3px;
    }

    .btnul a {
        padding: 3px 5px !important;
        font-size: 12px;
        border-bottom: solid thin #ccc;
    }

    .btnul {
        width: 120px;
        min-width: 100px;
        padding: 0px;
    }

    .btnula {
        padding: 3px 5px !important;
    }
</style>
<table id="" class="table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">

        <th class="text-center">S.No</th>
        <th class="text-center">Item Name</th>
        <th class="text-center">Qty</th>
        <th class="text-center">Rate</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Status</th>
        <th class="text-center">Option</th>

    </tr>
    </thead>
    <tbody>
    <?php $counter = 1; $net_amount = 1;?>
    @foreach($order_items as $item)
        <tr class="text-center">
            <td>{{ $counter }}</td>
            <td>{{ $item->m_name }}</td>
            <td>{{ $item->qty }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->total }}</td>
            <td>{{ $item->total }}</td>
            <td>
                <div class="btn-group action">
                    <button type="button" class="btn btn-sm btn-success btndd dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Options
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul id="{{$item->id}}" class="btn-sm btnul dropdown-menu">
                        <li><a href="#" id="{{$item->id}}" class="order-change btnadda"><i class="fa fa-pencil
                                        text-info">&nbsp;</i>Update Qty</a>
                        </li>
                        @if($item->is_cancelled == 0)
                            <li><a href="#" id="{{$item->id}}" class="mark-cancel btnadda"><i class="fa fa-eye
                                        text-info">&nbsp;</i>Mark As Cancel</a>
                            </li>
                        @endif
                        @if($item->is_complementary == 0)
                            <li><a href="#" id="{{$item->id}}" class="mark-Complementary btnadda"><i class="fa fa-eye
                                        text-info">&nbsp;</i>Complementary</a>
                            </li>
                        @else
                            <p class="bg-success">Complementary</p>
                        @endif

                    </ul>
                </div>
            </td>
        </tr>
        <?php $counter++; $net_amount += $item->total; ?>
    @endforeach
    {{--<tr>--}}
    {{--<td colspan="4"><br><br></td>--}}
    {{--</tr>--}}
    {{--<td colspan="4"><br></td>--}}
    {{--<tr>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<td class="text-center">Bill Amount</td>--}}
    {{--<td class="text-center">{{$net_amount}}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<td class="text-center">SGST (2.5%)</td>--}}
    {{--<td class="text-center">{{$net_amount*2.5/100}}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<td class="text-center">CGST (2.5%)</td>--}}
    {{--<td class="text-center">{{$net_amount*2.5/100}}</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td colspan="2">Round Off</td>--}}
    {{--<td colspan="2" class="right_txt">0.22</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td colspan="4"><br><br><br></td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<td class="text-center">Net Amount</td>--}}
    {{--<td class="text-center">{{$net_amount+$net_amount*5/100}}</td>--}}
    {{--</tr>--}}
    </tbody>
</table>
<script>


    $(".order-change").click(function () {
        $('#myModal').modal('show');
        $('.modal-title').html('Edit Order Items');
        $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
        var id = $(this).attr('id');
        var editurl = '{{ url('/') }}' + "/order_item/" + id + "/edit";
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

    $(".mark-cancel").click(function () {
        $('#myModal').modal('show');
        $('.modal-title').html('Cancel Order');
        $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
        var id = $(this).attr('id');
        var editurl = '{{ url('/') }}' + "/order_item/" + id + "/cancel";
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

    $(".mark-Complementary").click(function () {
        $('#myModal').modal('show');
        $('.modal-title').html('Cancel Order');
        $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
        var id = $(this).attr('id');
        var editurl = '{{ url('/') }}' + "/order_item/" + id + "/complementary";
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

    {{--$('.mark-cancel').click(function () {--}}
    {{--var id = $(this).attr('id');--}}
    {{--$('#myModal').modal('show');--}}
    {{--$('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');--}}
    {{--$('#myModal .modal-title').html('Confirm Cancellation');--}}
    {{--$('#myModal .modal-body').html('<h5>Are you sure want to Mark this as cancel</h5> </br>Remark:<textarea class="form-control" row="5" column="5" name="rmk"></textarea>');--}}
    {{--$('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('order_item') }}/' + id +--}}
    {{--'/cancel"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'--}}
    {{--);--}}
    {{--});--}}
    {{--$('.mark-Complementary').click(function () {--}}
    {{--var id = $(this).attr('id');--}}
    {{--$('#myModal').modal('show');--}}
    {{--$('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');--}}
    {{--$('#myModal .modal-title').html('Complementary');--}}
    {{--$('#myModal .modal-body').html('Resion:<textarea row="1" column="5" required="required" >');--}}
    {{--$('#modalBtn').html('<a class="btn btn-sm btn-danger"  href="{{ url('order_item') }}/' + id +--}}
    {{--'/#"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'--}}
    {{--);--}}
    {{--});--}}

</script>