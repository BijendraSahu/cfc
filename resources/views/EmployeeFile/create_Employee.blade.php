@extends('layout.master.master')

@section('title','List of Emp Type')

@section('content')
    <a href="{{url('Employee')}}" class="btn btn-sm bg-danger btnSet btn-primary add- pull-right">
        <span class="fa fa-angle-double-left"></span>&nbsp;Go Back</a>
    <h3 class="heading">Create Employee</h3>
    <hr/>
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    {!! Form::open(['url' => 'Employee', 'class' => 'form-horizontal', 'id'=>'emp']) !!}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('et', 'Emp Type *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlemp', $etype, null,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('name', 'Joining Date *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('jod', null, ['class' => 'form-control input-sm required dtp ', 'placeholder'=>'Joining Date']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('ename', 'Emp Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('empname', null, ['class' => 'form-control input-sm  ', 'placeholder'=>'Employee Name']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('cno', 'Contact No *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('contactno', null, ['class' => 'form-control input-sm numberOnly contact required','maxlength'=>'10', 'placeholder'=>'Contact']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('altn', 'Alt No', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('altno', null, ['class' => 'form-control input-sm numberOnly','maxlength'=>'10', 'placeholder'=>'Contact']) !!}
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
                        {!! Form::text('dob', null, ['class' => 'form-control input-sm dtp', 'placeholder'=>'Date Of Birth']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('at', 'EmailId', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('email', null, ['class' => 'form-control email input-sm', 'placeholder'=>'EmailID']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('at', 'Address *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('address', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Address']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('sp', 'City', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('city', null, ['class' => 'form-control input-sm', 'placeholder'=>'City']) !!}
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
@stop
