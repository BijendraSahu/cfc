@extends('layout.master.master')

@section('title','KOT List')

@section('content')
    <script src="{{ url('assets/js/validation.js') }}"></script>
    {{--<script src="/assets/js/validation.js" type="text/javascript"></script>--}}
    {{--<a href="{{url('bill_list')}}" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">--}}
    {{--<span class="fa fa-eye"></span>&nbsp;Go To Bill List</a>--}}
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    {{--<a href="{{url('stock')}}" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">--}}
    {{--<span class="fa fa-eye"></span>&nbsp;Go Back</a>--}}
    <h3 class="heading bg-success">KOT List with Tables</h3>
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
                            <label for="">Booked Table List<b class="star">*</b></label>
                            {!! Form::select('table_id', $booked_tables, null,['class' => 'form-control table_id input-sm requiredDD']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- invoice details --}}
        <p class="clearfix"></p>
        <div id="msg" class="alert-danger"></div>
        <h3>Item List</h3>
        <p class="msg bg-primary"></p>
        {{--<input type="text" name="item_arr" class="form-control input-sm" id="item_arr" value="{{json_encode($item_arr)}}">--}}
        <div id="table_list" class="container-fluid">

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
                {{--                {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}--}}
                {{--<button style="display:none;" type="button" onclick="submitChange();" class="btn btn-primary"--}}
                        {{--id="btnConfirm">Save--}}
                    {{--Bill--}}
                {{--</button>--}}
                {{--<a class="btn btn-default" onclick="javascript:history.back();"><span--}}
                {{--class=""></span>&nbsp;Back--}}
                {{--</a>--}}
                <p id="err"></p>
            </div>
            <br/>
        </div>
        {!! Form::close() !!}
        <p class="clearfix"></p>
        {{--</form>--}}
    </div>
    <script>

        $('.table_id').change(function () {
            $('#table_list').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            var tableId = $('.table_id').val();
//            alert(tableId);
            if (tableId == 0) {
                alert('Please Select Table');
                $('.table_id').focus();
                $('#btnConfirm').hide();
                return false;
            }
            $('#btnConfirm').show();
            var send_to_url = '{{ url('/') }}' + "/kot/" + tableId + "/filter";
//            alert(send_to_url);
            $.ajax({
                type: "POST",
                contentType: "application/json; charset=utf-8",
                url: send_to_url,
                success: function (data) {
                    $("#table_list").html(data);
                },
                error: function (xhr, status, error) {
                    //alert('Error occurred');
                    $("#table_list").html(xhr.responseText);
                }
            });
        });

        function submitChange() {
//        var cpassword = $('#cpswd').val();
            var table_id = $('.table_id').val();
//            alert(table_id);
            var formData = '_token=' + $('.token').val();
            if (table_id == '0') {
//            alert('Please enter your rc.');
//            $('.rcode').focus();
                $('#btnConfirm').hide();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    url: "{{ url('print_bill') }}",
//                data: '{"data":"' + endid + '"}',
                    data: '{"formData":"' + formData + '", "table_id":"' + table_id + '"}',
                    success: function (data) {
//                        if (data == 'ok') {
                        console.log(data);
                        $('#table_id').val('0');
                        var yourDOCTYPE = "<!DOCTYPE html>"; // your doctype declaration
                        var printPreview = window.open('about:blank', 'print_preview', "resizable=yes,scrollbars=yes,status=yes");
                        var printDocument = printPreview.document;
                        printDocument.open();
                        printDocument.write(yourDOCTYPE +
                            "<html>" +
                            data +
                            "</html>");
                        printDocument.close();

//                        $('.statusMsg').html('<span style="color:green;">Password changed successfully</p>');
//                        } else if (data == 'Incorrect') {
//                            $('#txtChange_previousPsd').val('');
//                            $('.statusMsg').html('<span style="color:red;">Incorrect current password</span>');
//                        }
                    },
                    error: function (xhr, status, error) {
//                    alert('xhr.responseText');
                        $('#err').html(xhr.responseText);
                    }
                });
            }
        }

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
@stop
