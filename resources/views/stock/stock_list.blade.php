{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: nec--}}
{{--* Date: 25-Jul-17--}}
{{--* Time: 7:55 PM--}}
{{--*/--}}
<div>
    @if(count($stocks)>0)
        @if($qtns == 23)
            <table id="dtTable" class="table table-bordered table-condensed">
                <thead>
                <tr class="bg-info text-center">
                    <th>Sr. No.</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Item Total</th>
                    <th>CGST</th>
                    <th>CGST Amount</th>
                    <th>SGST</th>
                    <th>SGST Amount</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; $tamt = 0;?>
                @foreach($stocks as $list)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $list->item_master->ItemName }}</td>
                        <td>{{ $list->qty }}</td>
                        <td>{{ $list->rate }}</td>
                        <td>{{ $list->qty* $list->rate }}</td>
                        <td>{{ $list->gst_per/2 }}</td>
                        <td>{{ $list->gst_amt/2 }}</td>
                        <td>{{ $list->gst_per/2 }}</td>
                        <td>{{ $list->gst_amt/2 }}</td>
                        <td>{{ $list->amount }}</td>
                    </tr>
                <?php $i++; $tamt += $list->amount; ?>
                @endforeach
                <tbody>
            </table>
        @else
            <table id="dtTable" class="table table-bordered table-condensed">
                <thead>
                <tr class="bg-info text-center">
                    <th>Sr. No.</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Item Total</th>
                    <th>IGST</th>
                    <th>IGST Amount</th>
                    <th>Total Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;?>
                @foreach($stocks as $list)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $list->item_master->ItemName }}</td>
                        <td>{{ $list->qty }}</td>
                        <td>{{ $list->rate }}</td>
                        <td>{{ $list->qty*$list->rate }}</td>
                        <td>{{ $list->gst_per }}</td>
                        <td>{{ $list->gst_amt }}</td>
                        <td>{{ $list->amount }}</td>
                    </tr>
                    <?php $i++;?>
                @endforeach
                </tbody>
            </table>
        @endif
    @else
        <div role='alert' id='alert' class='alert alert-danger'>No Item Available</div>
    @endif
</div>
<script>
    $(document).ready(function () {
        var table = $('#dtTable').DataTable({
            "columnDefs": [
                {"width": "20px", "targets": 0}
            ]
        });

        $('.datatable-col').on('keyup change', function () {
            table.column($(this).attr('id')).search($(this).val()).draw();
        });
    });
</script>