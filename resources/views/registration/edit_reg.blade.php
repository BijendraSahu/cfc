@extends('layout.master.master')

@section('title','List of Registrations')

@section('content')
    <a href="{{url('registration')}}"
       class="btn btn-sm bg-danger btnSet btn-primary  pull-right">
        <span class="fa fa-plus"></span>&nbsp;Go Back</a>
    <h3 class="heading">Edit Registrations</h3>
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    {!! Form::open(['url' => 'registration/'.$reg->Regid, 'class' => 'form-horizontal', 'id'=>'registration', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">
                <h3 class="bg-success text-center">Basic Info</h3>

                <div class='form-group'>
                    {!! Form::label('user_no', 'REG No#', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        <p></p>
                        <label for="" class="badge">{{$reg->reg_full}}</label>
                        {{--<input type="hidden" class="form-control" name="full_reg_no" value="REG-{{$reg_no}}"--}}
                        {{--id="user_no">--}}
                        {{--<input class="form-control" name="reg_no" type="hidden" value="{{$reg_no}}">--}}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('name', 'Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('name', $reg->Name, ['class' => 'form-control input-sm required', 'placeholder'=>'Name']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('gender', 'Gender', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        @if($reg->Gender == "Male")
                            {{ Form::radio('gender', 'Male', true) }}Male &nbsp;&nbsp;&nbsp;&nbsp;
                            {{ Form::radio('gender', 'Female') }}Female
                        @else
                            {{ Form::radio('gender', 'Male') }}Male &nbsp;&nbsp;&nbsp;&nbsp;
                            {{ Form::radio('gender', 'Female', true) }}Female
                        @endif
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('contact', 'Contact *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('contact', $reg->Contact_No, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('email', 'Email *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('email', $reg->EmailId, ['class' => 'form-control input-sm', 'placeholder'=>'Enter Email']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('address', 'Address *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::textarea('address', $reg->Addr, ['class' => 'form-control input-sm', 'placeholder'=>'Address', 'row'=>'5']) !!}
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <h3 class="bg-success text-center">Fee Info</h3>
                <p class="clearfix"></p>
                <div class='form-group'>
                    {!! Form::label('payment_amount', 'Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'><p class="clearfix"></p>
                        <lable>
                            {{--<strong>@if($reg->amount != null){{$reg->fee_amount}} @else--}}
                            {{--- @endif</strong>--}}
                            2000
                        </lable>

                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('payment_date', 'Payment Date', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        <p class="clearfix"></p>
                        {!! Form::text('payment_date', null, ['class' => 'form-control input-sm dtp required', 'placeholder'=>'Payment Date', 'onkeypress'=>'return false','id'=>'payment_date']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('is_cheque', 'Payment Mode *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::radio('mode_of_payment', 'Cash',true, ['required' => 'required','class'=>'is_cheque']) !!}
                        Cash
                        &nbsp;&nbsp;&nbsp;
                        {!! Form::radio('mode_of_payment', 'Cheque',false, ['required' => 'required','class'=>'is_cheque']) !!}
                        Cheque
                        <input type="hidden" id="cheque_check">
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('bank_name', 'Bank Name', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('bank_name', null, ['class' => 'form-control input-sm textWithSpace', 'placeholder'=>'Bank Name','maxlength'=>'100','id'=>'bank']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('cheque_no', 'Cheque No', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('cheque_no', null, ['class' => 'form-control input-sm numberOnly', 'placeholder'=>'Cheque No','maxlength'=>'10','id'=>'chequeno']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    <div class='col-sm-offset-3 col-sm-8'>
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="col-sm-12">--}}
        {{--<div class="col-sm-12">--}}


        {{--</div>--}}
        {{--<div class='form-group'>--}}
        {{--<div class='col-sm-offset-3 col-sm-8'>--}}
        {{--{!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
    {!! Form::close() !!}
    <script>

        $(document).ready(function () {
            $(document).ready(function () {
                if ($('#cheque_check').val() == 0) {
                    $('#cash').prop('checked', 'checked');
                    $('#bank').attr('class', 'form-control input-sm numberOnly');
                    $('#chequeno').attr('class', 'form-control input-sm textWithSpace');
                }
                else {
                    $('#cheque').prop('checked', 'checked');
                    $('#chequeno').attr('class', 'form-control input-sm textWithSpace required');
                    $('#bank').attr('class', 'form-control input-sm numberOnly required');
                }
            });
        });
        $('.is_cheque').on('change', function () {
            if ($(this).val() == 'Cheque') {
                $('#chequeno').attr('class', 'form-control input-sm textWithSpace required');
                $('#bank').attr('class', 'form-control input-sm numberOnly required');
            } else {
                $('#bank').attr('class', 'form-control input-sm numberOnly');
                $('#chequeno').attr('class', 'form-control input-sm textWithSpace');
            }
        });
    </script>
@stop
