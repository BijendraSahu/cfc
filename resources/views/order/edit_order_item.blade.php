<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($order_item))
    {!! Form::open(['url' => 'order_item/'.$order_item->id.'/update', 'class' => 'form-horizontal', 'id'=>'Unit', 'method'=>'post', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('Menu', 'Menu Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    <p></p>
                    <label for="">{{$order_item->m_name}}</label>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('qty', 'Qty *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('qty', $order_item->qty, ['class' => 'form-control input-sm required','placeholder'=>'Quantity']) !!}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-8'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@else
    <h4>Unit not found !</h4>
@endif
<script>
    $(function () {
        $('.dtp').datepicker({
            format: "dd-M-yyyy",
            maxViewMode: 2,
            todayBtn: "linked",
            daysOfWeekHighlighted: "0",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>