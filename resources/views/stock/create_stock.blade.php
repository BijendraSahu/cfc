@extends('layout.master.master')

@section('title','Create Stock')

@section('content')
    <script src="{{ url('assets/js/validation.js') }}"></script>
    {{--<script src="/assets/js/validation.js" type="text/javascript"></script>--}}
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    @if(Session::has('success-msg'))
        <p class="alert alert-success">{{ Session::get('success-msg') }}</p>
    @endif
    <a href="{{url('stock')}}" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">
        <span class="fa fa-eye"></span>&nbsp;Go Back</a>
    <h3 class="heading bg-success">Create Stock</h3>
    {!! Form::open(['url' => 'stock', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
    <div class="light bordered">

        {{--<form action="/administrator/stock" method="post" id="frmStock" enctype="multipart/form-data">--}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token()}}"/>--}}
        <p class="clearfix"></p>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif


    <!-- Begin page content -->
        <div class="container-fluid">
            {{-- invoice details --}}
            <div class="grid simple">
                <div>
                    <p class="clearfix"></p>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Stock No.# <b class="star">*</b>: &nbsp;</label>
                            {{--<input type="text" class="form-control input-sm required"--}}
                            {{--name="stock_no"--}}
                            {{--id="stock_no"--}}
                            {{--placeholder="Stock No." readonly="readonly"--}}
                            {{--value="{{$stock_no}}">--}}
                            {!! Form::text('stock_no', $stock_no, ['class' => 'form-control input-sm input-sm required', 'placeholder'=>'Date', 'onkeypress'=>'return false','id'=>'stock_no','readonly'=>true]) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bill/Challan Date<b class="star">*</b>: &nbsp;</label>
                            {{--                            {!! Form::label('date', 'Bill/Challan Date', ['class' => 'col-sm-3 control-label']) !!}--}}
                            {{--<div class='form-group'>--}}
                            {{--<div class='col-sm-8'>--}}
                            {{--<p class="clearfix"></p>--}}
                            {!! Form::text('date', null, ['class' => 'form-control input-sm input-sm dtp required', 'placeholder'=>'Date', 'onkeypress'=>'return false','id'=>'payment_date']) !!}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<input class="form-control input-sm required" type="date" name="date"--}}
                            {{--id="date" onkeypress="return false"--}}
                            {{--placeholder="Bill/Challan Date">--}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bill No: &nbsp;</label>
                            {{--<input type="text" class="form-control input-sm required"--}}
                            {{--name="bill_no"--}}
                            {{--id="bill_no"--}}
                            {{--placeholder="Bill No."--}}
                            {{--value="">--}}
                            {!! Form::text('bill_no', null, ['class' => 'form-control input-sm input-sm', 'placeholder'=>'Bill No.', 'id'=>'bill_no']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Challan No: &nbsp;</label>
                        {{--<input type="text" class="form-control input-sm required"--}}
                        {{--name="challan_no"--}}
                        {{--id="challan_no"--}}
                        {{--placeholder="Challan No."--}}
                        {{--value="">--}}
                        {!! Form::text('challan_no', null, ['class' => 'form-control input-sm input-sm', 'placeholder'=>'Challan No.', 'id'=>'challan_no']) !!}
                    </div>
                </div>

            </div>
            <div>
                <p class="clearfix"></p>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Supplier Name<b class="star">*</b></label>
                        {{--<select name="supplier" id="">--}}
                        {{--<option value="">SELECT</option>--}}
                        {{--@foreach($suppliers as $supplier)--}}
                        {{--<option value="{{$supplier->id}}">{{$supplier->supplier_name}}--}}
                        {{--, {{$supplier->mobile}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {!! Form::select('supplier_id', $suppliers, null,['class' => 'form-control input-sm requiredDD']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Description: &nbsp;</label>
                    <textarea class="form-control input-sm" name="material_description"
                              id="material_description"
                              placeholder="Material Description" rows='3'></textarea>
                    {{--                        {!! Form::textarea('material_description', null, ['class' => 'form-control input-sm input-sm', 'placeholder'=>'Material Description', 'onkeypress'=>'return false','id'=>'material_description', 'row'=>'3']) !!}--}}
                </div>
            </div>
            {{--<div class="col-md-4">--}}
            {{--<div class="form-group">--}}
            {{--<div class="col-md-4"><label>Department: &nbsp;{{$request_master->department_id}}</label>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    {{-- invoice details --}}
    <p class="clearfix"></p>
    <div id="msg" class="alert-danger"></div>
    <h3>Item List</h3>
    <p class="msg bg-primary"></p>

    {{--<input type="text" name="item_arr" class="form-control input-sm" id="item_arr" value="{{json_encode($item_arr)}}">--}}
    <div class="container-fluid">
        <table id="itemTable" class="table table-bordered table-responsive">
            <thead>
            <tr class="bg danger">
                <th width="2%"><input id="check_all" type="checkbox"/></th>
                <th class="hidden">Product Id</th>
                <th>PARTICULARS</th>
                <th>Unit</th>
                <th>QTY</th>
                <th>RATE</th>
                <th>GST%</th>
                <th>GST AMT</th>
                <th>AMOUNT</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input class="case" type="checkbox"/></td>
                <td class="hidden">
                    <input type="text" class="form-control input-sm" id="itemId_1" name="itemId[]">
                </td>
                <td>
                    <input type="text" tabindex="7" class="form-control input-sm auto-text required"
                           placeholder="Search Items by Name"
                           id="itemName_1" name="itemName[]">
                    {{--<select id="itemName_1" data-placeholder="Enter keywords to search..."--}}
                    {{--class="typeDD" name="itemName[]">--}}
                    {{--<option></option>--}}
                    {{--@foreach(\App\ProductMaster::orderBy('id','desc')->get() as $item)--}}
                    {{--<option value="{{$item->name}}">{{$item->name}}</option>--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--{!! Form::select('itemId[]', $items, null,['class' => 'typeDD dd_  requiredDD','tabindex'=>'3', 'id'=>'itemId_1']) !!}--}}
                </td>
                <td>
                    <input type="text" tabindex="-1" class="form-control input-sm required"
                           placeholder="Item Unit" readonly="readonly"
                           id="itemUnit_1" name="itemUnit[]">
                </td>

                <td>
                    <input type="text" class="form-control input-sm changesNo value-change pqty required numberOnly"
                           placeholder="Quantity"
                           id="quantity_1" tabindex="8" name="quantity[]">
                </td>
                <td>
                    <input type="text" class="form-control input-sm changesNo rate amount required" placeholder="Rate"
                           id="itemRate_1" tabindex="9" name="itemRate[]">
                    <input type="hidden" class="form-control input-sm changesNo rate" placeholder="Rate"
                           id="itemR_1" tabindex="-1" name="itemR[]">
                    <input type="hidden" class="form-control input-sm amount required" placeholder="itemAmt"
                           id="itemAmt_1" tabindex="9" name="itemAmt[]">
                </td>
                <td>
                    <input type="text" class="form-control input-sm changeGst amount required" placeholder="GST%"
                           id="itemGst_1" name="itemGst[]" tabindex="9" maxlength="5">
                </td>
                <td>
                    <input type="text" class="form-control input-sm amount required" placeholder="GST Amt"
                           id="itemGstAmt_1" readonly="readonly" name="itemGstAmt[]">
                </td>
                {{--<td>--}}
                {{--<input type="text" class="form-control input-sm amount required" placeholder="GST Amt"--}}
                {{--id="itemGstAmt_1" readonly="readonly" tabindex="-1" name="itemGstAmt[]">--}}
                {{--</td>--}}
                <td>
                    <input type="text" class="form-control input-sm row-total" placeholder="Amount"
                           readonly="readonly" id="itemAmount_1" tabindex="-1" name="itemAmount[]">
                </td>
            </tr>
            </tbody>
        </table>
        <p class="clearfix"></p>
        <button class="btn btn-sm btn-success addmore" tabindex="11" type="button"><span
                    class="fa fa-plus"></span>&nbsp;
        </button>
        <button class="btn btn-sm btn-danger delete" tabindex="12" type="button"><span
                    class="fa fa-minus"></span>&nbsp;
        </button>
        {{--<div class="col-md-offset-8 col-md-3 pull-left">--}}
        {{--<input type="text" class="form-control input-sm quotAmt" name="quotAmt" id="quotAmt"--}}
        {{--placeholder="Total Amount"--}}
        {{--onkeypress="return IsNumeric(event);" readonly="readonly" ondrop="return false;"--}}
        {{--onpaste="return false;">--}}
        {{--</div>--}}

    </div>

    <div class="col-md-offset-6 col-md-6">
        <div class="row">
            <div class="col-md-offset-4 col-md-3">
                <label>Total Amount:</label>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control input-sm quotAmt" name="quotAmt" id="quotAmt"
                       placeholder="Total Amount"
                       onkeypress="return IsNumeric(event);" readonly="readonly" ondrop="return false;"
                       onpaste="return false;">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="text-center">
            <div id="divMsg" style="display:none;">
                {{--                    <img src="{{url('image/loading.gif')}}" alt="Please wait.."/>--}}
                <div id="progress">Please wait...</div>
            </div>
            <br>
            {{--<button type="submit" id="btnSubmit" class="btn btn-success" onclick="placeOrder(this.form)">--}}
            {{--Submit--}}
            {{--</button>--}}
            {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
            <a class="btn btn-default" onclick="javascript:history.back();"><span
                        class=""></span>&nbsp;Back
            </a>
        </div>
        <br/>
    </div>
    {!! Form::close() !!}
    <p class="clearfix"></p>
    {{--</form>--}}
    <script>
        $(document).ready(function () {
            $('#frmStock').submit(function () {
                $('#divMsg').show();
                $('#progress').show();
                $('.btn').disable();

            });
        });
        function placeOrder(form) {
            form.submit();
        }
    </script>
    <style>
        #progress {
            display: none;
            color: green;
        }
    </style>

    <script src="{{ url('assets/js/auto_stock_info.js') }}"></script>
    <script>

        $(document).on('focus', '.auto-text', function () {
            $(this).autocomplete({
                source: '{{url('gpdetail')}}/1',
                minLength: 1,
                autoFocus: true,
                select: function (e, ui) {
//                    alert();
//                    console.log(ui);
                    id_arr = $(this).attr('id');
                    id = id_arr.split("_");
                    $('#itemId_' + id[1]).val(ui.item.id);
                    $('#itemName_' + id[1]).val(ui.item.item_name);
                    $('#itemUnit_' + id[1]).val(ui.item.UnitName);
//                    $('#itemGst_' + id[1]).val(ui.item.gst_per);
//                    $('#itemRate_' + id[1]).val(ui.item.item_rate);
//                    $('#itemR_' + id[1]).val(ui.item.item_rate);
//                    $('#quantity_' + id[1]).val(1);
//                    $('#itemUnit_' + id[1]).val(ui.item.size_unit);
                }
            });
        });

        //deletes the selected table rows
        $(".delete").on('click', function () {
            alert($('.case:checkbox:checked').parents("tr").prop('id'));
//            calculateQuotationTotal();
            calculateGrandTotal();
//            calculateVatPercent();
        });


        ///itemAmt += $('#itemAmt_' + id[1]).val((parseFloat(rate) * parseFloat(quantity)).toFixed(2));
        //        itemGstAmt += $('#itemGstAmt_' + id[1]).val((parseFloat(rate) * parseFloat(quantity) * parseFloat(gst) / 100).toFixed(2));
        //        itemAmount += $('#itemAmount_' + id[1]).val((parseFloat(rate) * parseFloat(quantity) * parseFloat(gst)) / 100 + ((parseFloat(rate) * parseFloat(quantity)).toFixed(2)));


        $(document).on('change', '.rate', function () {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            itemAmt = 0;
            itemGstAmt = 0;
            itemAmount = 0;
            rate = $('#itemR_' + id[1]).val();
            enter_rate = $('#itemRate_' + id[1]).val();
            if (parseFloat(enter_rate) < parseFloat(rate)) {
                $('#itemRate_' + id[1]).val(parseFloat(rate));
//                $('.msg').text('Enter Qty is more than available Quantity');
            } else {
                $('.msg').text('');
            }
        });
        //rate change
        $(document).on('change keyup blur', '.changesNo', function () {
            id_arr = $(this).attr('id');
            id = id_arr.split("_");
            itemAmt = 0;
            itemGstAmt = 0;
            itemAmount = 0;
            quantity = $('#quantity_' + id[1]).val();
            rate = $('#itemRate_' + id[1]).val();
            gst = $('#itemGst_' + id[1]).val();
            if (quantity != '' && rate != '') {
                itemAmt += (parseFloat(rate) * parseFloat(quantity)).toFixed(2);
                itemGstAmt += (parseFloat(itemAmt) * parseFloat(gst) / 100).toFixed(2);
                itemAmount += (parseFloat(itemGstAmt) + parseFloat(itemAmt)).toFixed(2);
                $('#itemAmt_' + id[1]).val(parseFloat(itemAmt));
                $('#itemGstAmt_' + id[1]).val(parseFloat(itemGstAmt));
                $('#itemAmount_' + id[1]).val(parseFloat(itemAmount));
            }
            calculateQuotationTotal();
//            calculateGrandTotal();
            //calculateVatPercent();

//            id_arr = $(this).attr('id');
//            id = id_arr.split("_");
//            quantity = $('#quantity_' + id[1]).val();
//            rate = $('#itemRate_' + id[1]).val();
//            if (quantity != '' && rate != '') {
//                $('#itemAmount_' + id[1]).val((parseFloat(rate) * parseFloat(quantity)).toFixed(2));
//            }
//            calculateQuotationTotal();
//            calculateGrandTotal();
//            calculateVatPercent();
        });
        //
        //        // Transportation Total calculation
        function calculateQuotationTotal() {
            quotAmt = 0;
            $('.row-total').each(function () {
                if ($(this).val() != '') quotAmt += parseFloat($(this).val());
            });
            $('#quotAmt').val(quotAmt.toFixed(2));
        }

        // VAT Amount and Grand Total calculation
        //        $(document).on('change keyup blur', '.vat_percent', function () {
        //            calculateVatPercent();
        //        });
        //
        //        function calculateVatPercent() {
        //            vat_amount = 0;
        //            grand_total = 0;
        //            vat_percent = parseFloat($('.vat_percent').val());
        //            quotAmt = $('.quotAmt').val();
        //            $('.vat_percent').each(function () {
        //                vat_amount += (quotAmt * ( parseFloat(vat_percent) / 100 ));
        //            });
        //            $('#vat_amount').val(vat_amount.toFixed(2));
        //            grand_total = parseFloat(quotAmt) + parseFloat(vat_amount);
        //            $('#grand_total').val(grand_total.toFixed(2));
        //
        //        }
        //
        //        //Grand Total calculation
        //        function calculateGrandTotal() {
        //            grand_total = 0;
        //            $('.row-total').each(function () {
        //                if ($(this).val() != '')grand_total += parseFloat($(this).val());
        //            });
        //            $('#grand_total').val(grand_total.toFixed(2));
        //        }
    </script>
    {{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}
    {{--//        $(".typeDD").select2();--}}
    {{--$(".typeDD").select2({--}}
    {{--placeholder: "Enter keywords to search...",--}}
    {{--allowClear: true--}}
    {{--});--}}
    {{--});--}}

    {{--</script>--}}
@stop
