<style>
    .right_txt {
        text-align: right;
    }

    .txthide {
        display: none;
    }

    .txtshow {
        display: block;
    }
</style>
<table id="" class="table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">
        <th class="text-center">S.No</th>
        {{--<th class="text-center">id</th>--}}
        <th class="text-center">Item Name</th>
        <th class="text-center">Tax %</th>
        <th class="text-center">Qty</th>
        <th class="text-center">Rate</th>
        <th class="text-center">Tax Amt</th>
        <th class="text-center">Amount</th>
    </tr>
    </thead>
    <tbody>
    <?php $counter = 1; $net_amount = 0; ?>
    @foreach($bills as $item)
        <?php $menu = \App\MenuItemModel::find($item->mid); ?>
        <tr class="text-center">
            <td>{{ $counter }}</td>
            {{--            <td>{{ $item->id }}</td>--}}
            <td>{{ $item->m_name }}</td>
            <td> @if(isset($item->mid)){{ $menu->tax->type." ".$menu->tax->percent }}@endif</td>
            {{--            <td> {{$item->mid}}</td>--}}
            <td>{{ $item->qty }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->price*$item->qty*$menu->tax->percent/100 }}</td>
            <td>{{ $item->total+$item->price*$item->qty*$menu->tax->percent/100 }}</td>
        </tr>
        <?php $counter++; $net_amount += $item->total + $item->price * $item->qty * $menu->tax->percent / 100; ?>
    @endforeach
    {{--<tr>--}}
    {{--<td colspan="4"><br><br></td>--}}
    {{--</tr>--}}
    <td colspan="4"><br></td>
    <tr>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <td class="text-center">Net Amount</td>
        <td class="text-center">{{$net_amount}}</td>
    </tr>

    {{--<tr>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
    {{--<td class="text-center">Bill Amount</td>--}}
    {{--<td class="text-center">{{$net_amount}}</td>--}}
    {{--</tr>--}}
    <td colspan="4"><br></td>
    <tr>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center">Discount Type</th>
        <td class="text-center">
            <select id="distype" onchange="ChangeDiscountType(this);" name="status" style="width:100%">
                {{--<optgroup label="Status">--}}
                {{--<option value="0">Select</option>--}}
                <option value="Flat">Flat</option>
                <option value="Percent">Percent</option>
                {{--</optgroup>--}}
            </select></td>
        <td class="text-center"><input type="text" placeholder="Enter Discount" id="discount_txt" class="changesDis"
                                       onkeyup="DiscountForpayable(this)" value="0">
            <input type="text" placeholder="Enter Reason" id="dis_reason"/>
        </td>
        <th class="text-center">Payable Amount</th>
        <th class="text-center"><span id="PayableAmt">{{$net_amount}}</span></th>
        <input type="hidden" value="{{$net_amount}}" id="gtotal"/>
    </tr>
    <td colspan="4"><br></td>

    <tr>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <td class="text-center">Payment Mode*</td>
        <td class="text-center">
            <select id="paymentmode" onchange="ChangePaymentMode(this);" name="status" style="width:100%">
                {{--<optgroup label="Status">--}}
                <option value="0">Select</option>
                <option value="Cash">Cash</option>
                <option value="Credit/Debit Card">Credit/Debit Card</option>
                <option value="Cheque">Cheque</option>
                {{--</optgroup>--}}
            </select></td>

        <th class="text-center"><input type="text" class="txthide" placeholder="Enter Bank Name" id="bank"/></th>
        <th class="text-center"><input type="text" class="txthide" placeholder="Enter Cheque No" id="chequeno"/></th>
    </tr>
    {{--<tr>--}}
    {{--<th class="text-center"></th>--}}
    {{--<th class="text-center"></th>--}}
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

    </tbody>
</table>
<script>
    function ChangePaymentMode(dis) {
        var ischeque = ($(dis).val().trim());
//        alert(ischeque);
        if (ischeque == 'Cheque') {
            $('#bank').removeClass('txthide').addClass('txtshow');
            $('#chequeno').removeClass('txthide').addClass('txtshow');
        } else {
            $('#bank').removeClass('txtshow').addClass('txthide');
            $('#chequeno').removeClass('txtshow').addClass('txthide');
        }
    }
    function ChangeDiscountType(dis) {
        DiscountForpayable($('#discount_txt'));
    }
    function DiscountForpayable(dis) {
        gAmount = 0;
        var discount = Number($(dis).val().trim());

        var gtotal = Number($('#gtotal').val().trim());
        var distype = $('#distype').val().trim();
        if (discount > 0) {
//            if ($('#dis_reason').val() == '') {
//                alert('Please Enter Reason');
//            }
            if (discount < gtotal) {
                if (distype == 'Flat') {
                    gAmount = (parseFloat(gtotal) - parseFloat(discount)).toFixed(2);
                    //alert(gAmount);
                    $('#PayableAmt').html(parseFloat(gAmount));
                } else {
                    gAmount = (parseFloat(gtotal) - (parseFloat(gtotal) * parseFloat(discount) / 100).toFixed(2));
                    $('#PayableAmt').html(parseFloat(gAmount));
                }
            } else {
                $(dis).val(gtotal);
                $('#PayableAmt').html(parseFloat(0));
            }
//            if (discount > 0) {
//                if ($('#gtotal').val() == '') {
//                    alert('Please Enter Reason');
//                }
//            }
        } else if (discount < 1) {
            $('#PayableAmt').html(parseFloat(gtotal));
        } else {
            $(dis).val();
        }
    }
    /*$(document).on('change keyup blur', '.changesDis', function () {


     //        id_arr = $(this).attr('id');
     gAmount = 0;
     var distype = $('#distype').val;
     var gtotal = $('#gtotal').val;
     var discount = $(this).val;
     if (distype == 'Flat') {
     gAmount += (parseFloat(gtotal) - parseFloat(discount)).toFixed(2);
     alert(gAmount);
     $('#PayableAmt').html(parseFloat(gAmount));
     } else {
     gAmount += (parseFloat(gtotal) - (parseFloat(gAmount) * parseFloat(discount) / 100).toFixed(2);
     $('#PayableAmt').html(parseFloat(gAmount));
     }
     });*/
</script>
