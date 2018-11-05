<table id="dataTable" class="display compact" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">
        <th>Id</th>
        <th>Bill No</th>
        <th>Date</th>
        <th>Bill Amount</th>
        <th>Dis.Type</th>
        <th>Dis Amt</th>
        <th>Dis. Reason</th>
        <th>Payment Mode</th>
        <th>Cash</th>
        <th>Card</th>
        {{--<th>Order Date</th>--}}
    </tr>
    </thead>
    <tbody>
    <?php $total = 0; ?>
    @if(count($orders)>0)
        @foreach($orders as $order)
            <tr>
                <td><a href="{{url('settle_bill').'/'.$order->id}}" target="_blank"
                       class="">
                        <span class="fa fa-wrench"></span> Settle Bill</a></td>
                <td>{{$order->bill_no}}</td>
                <td>{{$order->bill_date}}</td>
                <td>{{$order->payable_amt}}</td>
                <td>{{$order->discount_type}}</td>
                <td>{{$order->discount_amt}}</td>
                <td>{{$order->discount_reason}}</td>
                <td>{{$order->payment_mode}}</td>
                <td>{{$order->cash_amount}}</td>
                <td>{{$order->card_amt}}</td>
                {{--                            <td>{{ date_format(date_create($order->order_date), "d-M-Y h:i A")}}</td>--}}
            </tr>

        @endforeach
    @endif
    </tbody>
</table>
<script>
    $(document).ready(function () {
        var table = $('#dataTable').DataTable({
            "columnDefs": [
                {"width": "20px", "targets": 0}
            ]
        });

        $('.datatable-col').on('keyup change', function () {
            table.column($(this).attr('id')).search($(this).val()).draw();
        });
    });
</script>