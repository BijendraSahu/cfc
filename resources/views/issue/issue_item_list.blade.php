<div>
    @if(count($issues)>0)
        <table id="dtTable" class="table table-bordered table-condensed">
            <thead>
            <tr class="bg-info text-center">
                <th width="5%">S.No</th>
                <th>Item</th>
                <th>Unit</th>
                <th>Qty</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;?>
            @foreach($issues as $item)
                <tr>
                    <td>{{$i}}</td>
                    {{--<td>{{ $item->itemID}}</td>--}}
                    <td>{{ $item->itemName->ItemName }}</td>
                    <td>{{ $item->itemName->menuUnit->UnitName }}</td>
                    {{--<td>{{ $item->UnitID }}</td>--}}
                    <td>{{ $item->qty }}</td>
                </tr>
                <?php $i++;?>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No Record Available</p>
    @endif
</div>