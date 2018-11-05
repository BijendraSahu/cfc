@extends('layout.master.master')

@section('title','Stock Report')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <h3 class="heading">Sale Report</h3>
    <hr/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    <div class="container-fluid">
        {!! Form::open(['url' => 'all_report', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
        <div class="col-sm-6">
            <div class='form-group'>
                {!! Form::label('contact', 'Start Date *', ['class' => 'col-sm-3 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('start_date', null, ['class' => 'form-control start input-sm dtp required', 'placeholder'=>'Start Date']) !!}
                </div>
            </div>

        </div>
        <div class="col-sm-6">
            <div class='form-group'>
                {!! Form::label('contact', 'End Date *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('end_date', null, ['class' => 'form-control end input-sm dtp required', 'placeholder'=>'End Date']) !!}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-4 col-sm-8'>
                    {!! Form::button('Search', ['class' => 'btn btn-sm btn-primary btnnew']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="row fa-border">
        <div class="container-fluid" id="sale">

        </div>
    </div>
    <br/>
    <script>
        $(".btn-primary").click(function () {
            var start = $('.start').val();
            var end = $('.end').val();
            if (start.trim() == '') {
                alert('Please select start date');
                return false;
            } else if (end.trim() == '') {
                alert('Please select start date');
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    url: '{{ url('/') }}' + "/search_sale",
                    data: '{"start":"' + start + '", "end":"' + end + '"}',
                    success: function (data) {
                        console.log(data);
                        $("#sale").html(data);
                    },
                    error: function (xhr, status, error) {
                        //alert('Error occurred');
                        $("#sale").html(xhr.responseText);
                    }
                });
            }

        });


    </script>

@stop
