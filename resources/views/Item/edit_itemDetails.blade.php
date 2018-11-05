<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($Item))
    {!! Form::open(['url' => 'Item/'.$Item->ItemID, 'class' => 'form-horizontal', 'id'=>'itemedit', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('role', 'Category *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlcat', $Icate, $Item->IcatID,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('name', $Item->ItemName, ['class' => 'form-control input-sm required','placeholder'=>'Name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('role', 'Unit *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlunit', $unt, $Item->UnitID,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class='form-group'>
                    {!! Form::label('contact', 'ItemCode *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('itemcode', $Item->ItemCode, ['class' => 'form-control input-sm', 'placeholder'=>'Item Code']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('ap', 'Description *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('description', $Item->Descriptions, ['class' => 'form-control input-sm ', 'placeholder'=>'Description']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('sp', 'R.O.L.', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('rol', $Item->Rol, ['class' => 'form-control input-sm', 'placeholder'=>'ROL']) !!}
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
    <h4>UserMaster not found !</h4>
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