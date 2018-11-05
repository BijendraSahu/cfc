<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($unit))
    {!! Form::open(['url' => 'Unit/'.$unit->UnitID, 'class' => 'form-horizontal', 'id'=>'Unit', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('user_no', 'Unit No#', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    <p></p>
                    <label for="" class="badge">Unit-{{$unit->UnitID}}</label>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('role', 'Unit Name *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', $unit->UnitName, ['class' => 'form-control input-sm required','placeholder'=>'Name']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('name', 'Minor value *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('unitvalue', $unit->UnitMinorValue, ['class' => 'form-control input-sm','placeholder'=>'Name']) !!}
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