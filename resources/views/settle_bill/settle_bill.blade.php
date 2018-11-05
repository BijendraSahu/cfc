@extends('layout.master.master')

@section('title','Bill Settlement')

@section('content')
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif

    {!! Form::open(['url' => 'settle_bill/'.$bill_master->id, 'class' => 'form-horizontal', 'id'=>'payment']) !!}
    <div class="container-fluid roundCorner">
        <div class="col-sm-12">
            <h4 class="bg-danger img-rounded text-center">Bill Settlement</h4>
            <div class="col-sm-6">
                <p class="clearfix"></p>
                <div class='form-group'>
                    {!! Form::label('grand_total', 'Bill Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'><p class="clearfix"></p>
                        <lable>
                            <strong>@if($bill_master->grand_total != null){{$bill_master->grand_total}} @else
                                    - @endif</strong>
                            <input type="hidden" value="{{$bill_master->grand_total}}" id="gtotal"/>
                        </lable>

                    </div>
                </div>
            {{--<div class='form-group'>--}}
            {{--{!! Form::label('paid_amount', 'Paid Amount', ['class' => 'col-sm-3 control-label']) !!}--}}
            {{--<div class='col-sm-8'><p class="clearfix"></p>--}}
            {{--<lable>--}}
            {{--<strong>@if($bill_master->paid_amount != null){{$bill_master->paid_amount}} @else--}}
            {{--- @endif</strong>--}}
            {{--</lable>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--<div class='form-group'>--}}
            {{--{!! Form::label('balance', 'Balance Amount', ['class' => 'col-sm-3 control-label']) !!}--}}
            {{--<div class='col-sm-8'><p class="clearfix"></p>--}}
            {{--<lable>--}}
            {{--<strong>@if($bill_master->balance != null){{$bill_master->balance}} @else--}}
            {{--- @endif</strong>--}}
            {{--</lable>--}}

            {{--</div>--}}
            {{--</div>--}}

            <!--  <div class='form-group'>-->
            <!-- {!! Form::label('payment_date', 'Payment Date', ['class' => 'col-sm-3 control-label']) !!}-->
                <!--   <div class='col-sm-8'>
                       <p class="clearfix"></p>-->
            <!--  {!! Form::text('payment_date', null, ['class' => 'form-control input-sm dtp required', 'placeholder'=>'Payment Date', 'onkeypress'=>'return false','id'=>'payment_date']) !!}-->
                <!--  </div>
              </div>-->

                <div class='form-group'>
                    {!! Form::label('payment_date', 'Discount Type', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        <select id="distype" onchange="ChangeDiscountType(this);" name="discount_type"
                                class="form-control input-sm" style="width:100%">
                            {{--<optgroup label="Status">--}}
                            {{--<option value="0">Select</option>--}}
                            <option value="Flat">Flat</option>
                            <option value="Percent">Percent</option>
                            {{--</optgroup>--}}
                        </select></td>
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('discount', 'Discount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        <input type="text" placeholder="Enter Discount" id="discount_txt"
                               class="changesDis form-control input-sm required amount"
                               onkeyup="DiscountForpayable(this)" value="0">
                        <p class="clearfix"></p>
                        <textarea class="form-control input-sm" id="dis_reason" disabled="disabled"
                                  name="discount_reason"
                                  placeholder="Enter Reason" rows='3'></textarea>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class='form-group'>
                    {!! Form::label('payment_amount', 'Payable Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        <p class="clearfix"></p>
                        <strong id="PayableAmt">{{$bill_master->grand_total}}</strong>
                        <input id="PayableAmt2" type="hidden" value="{{$bill_master->grand_total}}" name="payable_amt"/>
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('is_cheque', 'Payment Mode *', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {{--{!! Form::checkbox('is_cash', 'Cash',false, ['class'=>'is_cash']) !!}--}}
                        <input type="checkbox" id="cash" name="cash" class="is_cash" onclick="checkiscash();">
                        Cash
                        &nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="cheque" name="cheque" class="is_cheque" onclick="checkischeque();">
                        Cheque
                        &nbsp;&nbsp;&nbsp;
                        <input type="checkbox" id="card" name="card" class="is_card" onclick="checkiscard();">
                        Card


                        <input type="hidden" id="cheque_check">
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('cash_Amount', 'Cash Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {{--{!! Form::text('cash_amt', null, ['class' => 'form-control input-sm amount', 'disabled' =>'disabled', 'placeholder'=>'Cash Amount','maxlength'=>'100','id'=>'cash_amt','onkeyup=getcashchange(this)']) !!}--}}
                        <input type="number" name="cash_amt" onkeyup="getcashchange(this);"
                               class="form-control input-sm amount" min="0" max="{{round($bill_master->grand_total)}}"
                               disabled="disabled" id="cash_amt" maxlength="100"
                               placeholder="Cash Amount"/>
                    </div>
                </div>


                <div class='form-group'>
                    {!! Form::label('bank_name', 'Bank Name', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('bank_name', null, ['class' => 'form-control input-sm textWithSpace', 'disabled' =>'disabled', 'placeholder'=>'Bank Name','maxlength'=>'100','id'=>'bank']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('cheque_no', 'Cheque No', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('cheque_no', null, ['class' => 'form-control input-sm numberOnly', 'disabled' =>'disabled',  'placeholder'=>'Cheque No','maxlength'=>'10','id'=>'chequeno']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('Cheque_Amount', 'Cheque Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('cheque_amt', null, ['class' => 'form-control input-sm', 'disabled' =>'disabled', 'placeholder'=>'Cheque Amount','maxlength'=>'100','id'=>'cheque_amt']) !!}
                    </div>
                </div>


                <div class='form-group'>
                    {!! Form::label('card_Amount', 'Card Amount', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {{--                        {!! Form::text('card_amt', null, ['class' => 'form-control input-sm', 'disabled' =>'disabled', 'placeholder'=>'Card Amount','maxlength'=>'100','id'=>'card_amt']) !!}--}}
                        <input type="text" name="card_amt" onkeyup="getcardchange(this);"
                               class="form-control input-sm" disabled="disabled" id="card_amt" maxlength="100"
                               placeholder="Card Amount"/>
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('card_no', 'Card No', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('card_no', null, ['class' => 'form-control input-sm numberOnly', 'disabled' =>'disabled', 'placeholder'=>'Card No','maxlength'=>'20','id'=>'card_no']) !!}
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('card_no', 'If not chargable bill', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        <p class="clearfix"></p>
                        <input type="checkbox" id="chargable" name="chargable" onclick="checkisnotchargable();"
                               class="is_card">
                        <input type="hidden" name="chargable" id="is_chargable" value="0">
                    </div>
                </div>

                <div class='form-group'>
                    {!! Form::label('', '', ['class' => 'col-sm-3 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary',  'id'=>'btnSubmit']) !!}
                    </div>
                </div>


                {{--<select id="paymentmode" onchange="ChangePaymentMode(this);" name="status" style="width:100%">--}}
                {{--<optgroup label="Status">--}}
                {{--<option value="0">Select</option>--}}
                {{--<option value="Cash">Cash</option>--}}
                {{--<option value="Credit/Debit Card">Credit/Debit Card</option>--}}
                {{--<option value="Cheque">Cheque</option>--}}
                {{--</optgroup>--}}
                {{--</select></td>--}}

            </div>
            <div class='form-group'>
                <div class='col-sm-offset-3 col-sm-8'>

                </div>

            </div>
            <p class="alert-info" id="msg"></p>

        </div>
    </div>
    {!! Form::close() !!}
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
        $(function () {
            $('form#payment').submit(function () {
                var c = confirm("Are you sure to continue?");
                return c;
            });
        });
//        $(document).ready(function () {
//            cash_amt = 0;
//            card_amt = 0;
//            cheque_amt = 0;
//            cash_amt += $('#cash_amt').val();
//            card_amt += $('#card_amt').val();
//            cheque_amt += $('#cheque_amt').val();
//            var total = parseFloat(cash_amt) + parseFloat(card_amt) + (parseFloat(cheque_amt));
//            var finalamt = Math.round($('#PayableAmt').html());
//            if (total <= finalamt) {
//                $("#btnSubmit").removeAttr('disabled', 'disabled');
//            }
//        });

        function getcashchange(dis) {
            var cashamt = $(dis).val();
//            alert(cashamt);
            var finalamt = $('#PayableAmt').html();

            if ($("#card").is(":checked") == true) {
                gAmount = 0;
                gAmount += parseFloat(finalamt) - (parseFloat(cashamt));
                $('#card_amt').val(gAmount);
                $("#cash_amt").removeAttr('disabled', 'disabled');

            }
//            if (cashamt > finalamt) {
//                $('#cash_amt').val(finalamt);
//                $('#card_amt').val('');
//                $("#card").removeAttr('checked', 'checked');
//                $("#card_amt").attr('disabled', 'disabled');
//            }
//            if ($(dis).val() == '') {
//                $('#cash_amt').val(0);
//                $('#card_amt').val(finalamt);
//                $("#card").attr('checked', 'checked');
//                $("#card_amt").removeAttr('disabled', 'disabled');
//            }
        }
        function getcardchange(dis) {
            var cardamt = $(dis).val();
//            alert(cashamt);
            var finalamt = $('#PayableAmt').html();
            if ($("#cash").is(":checked") == true) {
                gAmount = 0;
                gAmount += parseFloat(finalamt) - (parseFloat(cardamt));
                $('#cash_amt').val(gAmount);
//                $("#card_amt").removeAttr('disabled', 'disabled');
//            if (cashamt > finalamt) {
//                $(dis).val(finalamt);
//                $('#card_amt').val('');
//                $("#card").removeAttr('checked', 'checked');
//                $("#card_amt").removeAttr('disabled', 'disabled');
//            }
            }
//            if (cardamt > finalamt) {
//                $('#card_amt').val(finalamt);
//                $('#cash_amt').val('');
//                $("#cash").removeAttr('checked', 'checked');
//                $("#cash_amt").attr('disabled', 'disabled');
//            }
//            if ($(dis).val() == '') {
//                $('#card_amt').val(0);
//                $('#cash_amt').val(finalamt);
//                $("#cash").attr('checked', 'checked');
//                $("#cash_amt").removeAttr('disabled', 'disabled');
//            }
        }

        function checkiscash() {
            if ($("#cash").is(":checked") == true) {
                $("#cash_amt").removeAttr('disabled', 'disabled');
                $('#cash_amt').attr('class', 'form-control input-sm amount required');
                $('#cash_amt').val(Math.round($('#PayableAmt').text()));
            } else {
                $("#cash_amt").val('');
                $("#cash_amt").attr('disabled', 'disabled');
                $('#cash_amt').attr('class', 'form-control input-sm ');
            }
        }
        function checkischeque() {
            if ($("#cheque").is(":checked") == true) {
                $("#bank").removeAttr('disabled', 'disabled');
                $("#chequeno").removeAttr('disabled', 'disabled');
                $("#cheque_amt").removeAttr('disabled', 'disabled');
                $('#chequeno').attr('class', 'form-control input-sm textWithSpace required');
                $('#bank').attr('class', 'form-control input-sm numberOnly required');
                $('#cheque_amt').attr('class', 'form-control input-sm amount required');
//                $('#cheque_amt').val(0);

            } else {
                $("#bank").val('');
                $("#chequeno").val('');
                $("#cheque_amt").val('');
                $("#bank").attr('disabled', 'disabled');
                $("#chequeno").attr('disabled', 'disabled');
                $("#cheque_amt").attr('disabled', 'disabled');
                $('#bank').attr('class', 'form-control input-sm numberOnly');
                $('#chequeno').attr('class', 'form-control input-sm textWithSpace');
                $('#cheque_amt').attr('class', 'form-control input-sm');
            }
        }

        function checkiscard() {
            if ($("#card").is(":checked") == true) {
                $("#card_no").removeAttr('disabled', 'disabled');
                $("#card_amt").removeAttr('disabled', 'disabled');
                $('#card_amt').attr('class', 'form-control input-sm amount required');
//                $('#card_amt').val(0);
//                $('#cash_amt').val($('#PayableAmt').text());
            } else {
                $("#card_no").val('');
                $("#card_amt").val('');
                $("#card_no").attr('disabled', 'disabled');
                $("#card_amt").attr('disabled', 'disabled');
            }
        }

        function checkisnotchargable() {
            if ($("#chargable").is(":checked")) {
                $("#is_chargable").val(1);
            } else {
                $("#is_chargable").val(0);
            }
        }

        function ChangeDiscountType(dis) {
            DiscountForpayable($('#discount_txt'));
        }
        function DiscountForpayable(dis) {
            gAmount = 0;
            var discount = Number($(dis).val().trim());
            var gtotal = Number($('#gtotal').val().trim());
            var distype = $('#distype').val().trim();
            if (discount > 0) {
//            if ($('#dis_reason').val() == '') {
//                alert('Please Enter Reason');
//            }
                if (discount > 0) {
                    $("#dis_reason").removeAttr('disabled', 'disabled');
                    $('#dis_reason').attr('class', 'form-control input-sm textWithSpace required');
                } else if (discount == 0) {
                    $("#dis_reason").val('');
                    $("#dis_reason").attr('disabled', 'disabled');
                    $('#dis_reason').attr('class', 'form-control input-sm textWithSpace');
                }
                if (discount < gtotal) {
                    if (distype == 'Flat') {
                        gAmount = (parseFloat(gtotal) - parseFloat(discount)).toFixed(2);
                        //alert(gAmount);
                        $('#PayableAmt').html(parseFloat(gAmount));
                        $('#PayableAmt2').val(parseFloat(gAmount));
                    } else {
                        gAmount = (parseFloat(gtotal) - (parseFloat(gtotal) * parseFloat(discount) / 100).toFixed(2));
                        $('#PayableAmt').html(parseFloat(gAmount));
                        $('#PayableAmt2').val(parseFloat(gAmount));
                    }
                } else {
                    $(dis).val(gtotal);
                    $('#PayableAmt').html(parseFloat(0));
                    $('#PayableAmt2').val(parseFloat(0));
                }
//            if (discount > 0) {
//                if ($('#gtotal').val() == '') {
//                    alert('Please Enter Reason');
//                }
//            }
            } else if (discount < 1) {
                $('#PayableAmt').html(parseFloat(gtotal));
                $('#PayableAmt2').val(parseFloat(gtotal));
            } else {
                $(dis).val();
            }
        }
        //        $(document).on('change keyup blur', '.changesDis', function () {
        //            gAmount = 0;
        //            var distype = $('#distype').val();
        //            var gtotal = $('#gtotal').val;
        //            var discount = $(this).val;
        //            if (distype == 'Flat') {
        //                gAmount += (parseFloat(gtotal) - parseFloat(discount)).toFixed(2);
        //                alert(gAmount);
        //                $('#PayableAmt').html(parseFloat(gAmount));
        //            } else {
        //                gAmount += (parseFloat(gtotal) - (parseFloat(gAmount) * parseFloat(discount) / 100).toFixed(2);
        //                $('#PayableAmt').html(parseFloat(gAmount));
        //            }
        //        });
    </script>
@stop