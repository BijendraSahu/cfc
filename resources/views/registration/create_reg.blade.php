@extends('layout.master.master')

@section('title','List of Registrations')

@section('content')
    <a href="{{url('registration')}}"
       class="btn btn-sm bg-danger btnSet btn-primary  pull-right">
        <span class="fa fa-plus"></span>&nbsp;Go Back</a>
    <h3 class="heading">Create Registrations</h3>
    <hr/>
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    {!! Form::open(['url' => 'registration', 'class' => 'form-horizontal', 'id'=>'user_master','autocomplete'=>'off']) !!}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">
                <h3 class="bg-success text-center">Basic Info</h3>

                <div class='form-group'>
                    {!! Form::label('user_no', 'REG No#', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        <p></p>
                        <label for="" class="badge">AURAREG-00{{$reg_no}}</label>
                        <input type="hidden" class="form-control" name="full_reg_no" value="AURAREG-00{{$reg_no}}"
                               id="user_no">
                        <input class="form-control" name="reg_no" type="hidden" value="{{$reg_no}}">
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('name', 'Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Name']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('contact', 'Contact *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('contact', null, ['class' => 'form-control input-sm contact required', 'placeholder'=>'Contact']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('Type', 'Type*', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        <input type="radio" name="Type" checked value="Stag" onclick="getAmount(this)"/>Stag&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="Type" value="Couple" onclick="getAmount(this)"/>Couple
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('contact', 'Quantity *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        <input type="number" class="form-control input-sm numberOnly required" id="qty" min="1" max="50"
                               placeholder="No of Person/Couple" value="1">
                    </div>
                </div>

                {{--<div class='form-group'>--}}
                {{--{!! Form::label('email', 'Email', ['class' => 'col-sm-4 control-label']) !!}--}}
                {{--<div class='col-sm-8'>--}}
                {{--{!! Form::text('email', null, ['class' => 'form-control input-sm', 'placeholder'=>'Enter Email']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class='form-group'>--}}
                {{--{!! Form::label('address', 'Address', ['class' => 'col-sm-4 control-label']) !!}--}}
                {{--<div class='col-sm-8'>--}}
                {{--{!! Form::textarea('address', null, ['class' => 'form-control input-sm', 'placeholder'=>'Address', 'row'=>'5']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}

            </div>
            <div class="col-sm-6">
                <h3 class="bg-success text-center">Fee Info</h3>
                <p class="clearfix"></p>
                <div class='form-group'>
                    {!! Form::label('Amount', 'Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'><p class="clearfix"></p>
                        <lable>
                            {{--<strong>@if($reg->amount != null){{$reg->fee_amount}} @else--}}
                            {{--- @endif</strong>--}}
                            <span id="show_amount">1000</span>
                            {!! Form::text('amount', 1000, ['class' => 'form-control input-sm hidden', 'placeholder'=>'', 'onkeypress'=>'return false' ,'id'=>'amount']) !!}
                        </lable>

                    </div>
                </div>
                {{--<div class='form-group'>--}}
                {{--{!! Form::label('payment_date', 'Payment Date', ['class' => 'col-sm-3 control-label']) !!}--}}
                {{--<div class='col-sm-8'>--}}
                {{--<p class="clearfix"></p>--}}
                {{--{!! Form::text('payment_date', null, ['class' => 'form-control input-sm dtp required', 'placeholder'=>'Payment Date', 'onkeypress'=>'return false','id'=>'payment_date']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class='form-group'>
                    {!! Form::label('is_cheque', 'Payment Mode *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::radio('mode_of_payment', 'Cash',true, ['required' => 'required','class'=>'is_cheque']) !!}
                        Cash
                        &nbsp;&nbsp;&nbsp;
                        {!! Form::radio('mode_of_payment', 'Card',false, ['required' => 'required','class'=>'is_cheque']) !!}
                        Card
                        <input type="hidden" id="cheque_check">
                    </div>
                </div>
                {{--<div class='form-group'>--}}
                {{--{!! Form::label('bank_name', 'Bank Name', ['class' => 'col-sm-3 control-label']) !!}--}}
                {{--<div class='col-sm-8'>--}}
                {{--{!! Form::text('bank_name', null, ['class' => 'form-control input-sm textWithSpace', 'placeholder'=>'Bank Name','maxlength'=>'100','id'=>'bank']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class='form-group'>--}}
                {{--{!! Form::label('cheque_no', 'Cheque No', ['class' => 'col-sm-3 control-label']) !!}--}}
                {{--<div class='col-sm-8'>--}}
                {{--{!! Form::text('cheque_no', null, ['class' => 'form-control input-sm numberOnly', 'placeholder'=>'Cheque No','maxlength'=>'10','id'=>'chequeno']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class='form-group'>
                    <div class='col-sm-offset-3 col-sm-8'>
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        function getAmount(dis) {
            var txt_val = $('#qty').val();
            var type = $(dis).attr('value');
            if (type == 'Stag') {
                var stagAmt = txt_val * 1000;
                $('#show_amount').text(stagAmt);
                $('#amount').val(stagAmt);
            } else {
                var coupleAmt = txt_val * 1500;
                $('#show_amount').text(coupleAmt);
                $('#amount').val(coupleAmt);
            }
        }
        $(document).ready(function () {
            $('#qty').focusout(function () {
                var txt_val = $(this).val();
                var type = $('input[name=Type]:checked', '#user_master').val();
                if (type == 'Stag') {
                    var stagAmt = txt_val * 1000;
                    $('#show_amount').text(stagAmt);
                    $('#amount').val(stagAmt);
                } else {
                    var coupleAmt = txt_val * 1500;
                    $('#show_amount').text(coupleAmt);
                    $('#amount').val(coupleAmt);
                }


            });
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
        //        $('.is_cheque').on('change', function () {
        //            if ($(this).val() == 'Cheque') {
        //                $('#chequeno').attr('class', 'form-control input-sm textWithSpace required');
        //                $('#bank').attr('class', 'form-control input-sm numberOnly required');
        //            } else {
        //                $('#bank').attr('class', 'form-control input-sm numberOnly');
        //                $('#chequeno').attr('class', 'form-control input-sm textWithSpace');
        //            }
        //        });
    </script>
@stop

