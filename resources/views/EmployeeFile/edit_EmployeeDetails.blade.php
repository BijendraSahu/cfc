<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($emp))
    {!! Form::open(['url' => 'Employee/'.$emp->EmpId, 'class' => 'form-horizontal', 'id'=>'Emptype', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('et', 'Emp Type *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlemp', $etype,$emp->EPTID ,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('name', 'Joining Date *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('jod', $emp->JoiningDate, ['class' => 'form-control input-sm required dtp ', 'placeholder'=>'Joining Date']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('ename', 'Emp Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('empname', $emp->Emp_Name, ['class' => 'form-control input-sm  ', 'placeholder'=>'Employee Name']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('cno', 'Contact No *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('contactno', $emp->ContactNo, ['class' => 'form-control input-sm numberOnly contact required','maxlength'=>'10', 'placeholder'=>'Contact']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('altn', 'Alt No', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('altno', $emp->Alt_No, ['class' => 'form-control input-sm numberOnly','maxlength'=>'10', 'placeholder'=>'Contact']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class='form-group'>
                    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {{ Form::radio('gender', 'Male', true) }}Male &nbsp;&nbsp;&nbsp;&nbsp;
                        {{ Form::radio('gender', 'Female') }}Female
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('at', 'D.O.B.', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('dob', $emp->DOB, ['class' => 'form-control input-sm dtp', 'placeholder'=>'Date of Birth']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('at', 'EmailId', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('email', $emp->EmailID, ['class' => 'form-control email input-sm', 'placeholder'=>'EmailID']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('at', 'Address *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('address', $emp->Addr, ['class' => 'form-control input-sm email', 'placeholder'=>'Address']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('sp', 'City', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('city', $emp->City, ['class' => 'form-control input-sm', 'placeholder'=>'City']) !!}
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
