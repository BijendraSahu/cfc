<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($Tbl_Table))
    {!! Form::open(['url' => 'Tbl/'.$Tbl_Table->Tid, 'class' => 'form-horizontal', 'id'=>'Tbl_', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('role', 'Category *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::select('table_category_id', $table_cat, $Tbl_Table->table_category_id,['class' => 'form-control requiredDD']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Category Name*', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', $Tbl_Table->TblNo, ['class' => 'form-control input-sm required','placeholder'=>'Name']) !!}
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