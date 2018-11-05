<table id="dataTable" class="display compact" cellspacing="0" width="100%">
    <thead>
    <tr class="bg-info">
        <th class="hidden">Id</th>
        <th>Menu Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        {{--<th>Order Date</th>--}}
    </tr>
    </thead>
    <tbody>
    <?php $total = 0; ?>
    @if(count($orders)>0)
        @foreach($orders as $order)
            <tr>
                <td class="hidden">{{$order->id}}</td>
                <td>{{$order->m_name}}</td>
                <td>{{$order->qty}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->total}}</td>
                {{--                            <td>{{ date_format(date_create($order->order_date), "d-M-Y h:i A")}}</td>--}}
            </tr>
            <?php $total += $order->total; ?>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td>Grand Total</td>
            <td>
                {{$total}}
            </td>
        </tr>
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