<script src="{{ url('assets/js/validation.js') }}"></script>
@if(!is_null($descp))
    {!! Form::open(['url' => 'Ingredient/'.$descp->MIID, 'class' => 'form-horizontal', 'id'=>'ingdntedit', 'method'=>'put', 'files'=>true]) !!}

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">

                <div class='form-group'>
                    {!! Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlmenu', $menu, $descp->MID,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('item', 'Item Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlitem', $item, $descp->ItemID,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('role', 'Unit *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlunit', $unt, $descp->UnitId,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('qty', 'Quantity *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('qty', $descp->Qty, ['class' => 'form-control input-sm amount qty required','id'=>'quantity', 'placeholder'=>'Qty']) !!}
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class='form-group'>
                    {!! Form::label('rate', 'Rate *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('rate', $descp->rate, ['class' => 'form-control input-sm amount required', 'placeholder'=>'Rate']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('yield_rate', 'Yield Rate *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('yield_rate', $descp->yield_rate, ['class' => 'form-control input-sm amount required', 'id'=>'yRate','placeholder'=>'Yield Rate']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('amount', 'Amount *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::label('0.0', '', ['class' => 'AMT control-label']) !!}
                        {!! Form::text('amount', $descp->amount, ['class' => 'form-control hidden input-sm amount required', 'id'=>'itemAmt', 'placeholder'=>'Amount']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    <div class='col-sm-offset-4 col-sm-8'>
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@else
    <h4>Ingredient not found !</h4>
@endif
<script>
    $(document).ready(function () {
        amount = $('#itemAmt').val();
        $('.AMT').html(parseFloat(amount));
    });
    $(document).on('change keyup blur', '.qty', function () {
        calculateTotal();
    });

    $(document).on('change keyup blur', '#yRate', function () {
        calculateTotal();
    });
    function calculateTotal() {
        itemAmount = 0;
        quantity = $('#quantity').val();
        yRate = $('#yRate').val();
        if (quantity != '' && yRate != '') {
            itemAmount += (parseFloat(yRate) * parseFloat(quantity)).toFixed(2);
            $('#itemAmt').val(parseFloat(itemAmount));
            $('.AMT').html(parseFloat(itemAmount));
        }
    }
</script>
