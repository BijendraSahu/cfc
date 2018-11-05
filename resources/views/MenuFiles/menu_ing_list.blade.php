<div>
    @if(count($menuings)>0)
        <table id="dtTable" class="table table-bordered table-condensed">
            <thead>
            <tr class="bg-info text-center">
                <th width="5%">S.No</th>
                <th>Item</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Yield Rate</th>
                <th>Rate</th>
                <th>Purchase Amt</th>
                <th>Total Amt</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            @foreach($menuings as $menu)
                <tr>
                    <td>{{$i}}</td>
                    {{--<td>{{ $menu->itemID}}</td>--}}
                    <td>{{ $menu->itemName->ItemName }}</td>
                    <td>{{ $menu->itemName->menuUnit->UnitName }}</td>
                    {{--<td>{{ $menu->UnitID }}</td>--}}
                    <td>{{ $menu->Qty }}</td>
                    <td>{{ $menu->yield_rate }}</td>
                    <td>{{ $menu->rate }}</td>
                    <td>{{ $menu->purchase_amount }}</td>
                    <td>{{ $menu->amount }}</td>
                </tr>
                <?php $i++;?>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No Record Available</p>
    @endif
</div>