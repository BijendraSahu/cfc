<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($EmplyoeeType))
    {!! Form::open(['url' => 'EMPTYPE/'.$EmplyoeeType->EPTID, 'class' => 'form-horizontal', 'id'=>'Emptype', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class='form-group'>
                {!! Form::label('user_no', 'Category No#', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    <p></p>
                    <label for="" class="badge">EmpID-{{$EmplyoeeType->EPTID}}</label>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('role', 'Emp Type *', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', $EmplyoeeType->Emp_Type, ['class' => 'form-control input-sm required','placeholder'=>'Name']) !!}
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