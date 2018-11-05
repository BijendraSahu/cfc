@extends('layout.master.master')

@section('title','Table Settlement')

@section('content')
    <script src="{{ url('assets/js/validation.js') }}"></script>
    {{--<script src="/assets/js/validation.js" type="text/javascript"></script>--}}
    {{--<a href="{{url('bill_list')}}" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">--}}
    {{--<span class="fa fa-eye"></span>&nbsp;Go To Bill List</a>--}}

    {{--<a href="{{url('stock')}}" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">--}}
    {{--<span class="fa fa-eye"></span>&nbsp;Go Back</a>--}}
    <h3 class="heading bg-success">Shift Open/close</h3>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    {!! Form::open(['url' => 'shift', 'class' => 'form-horizontal', 'id'=>'shift']) !!}
    <div class="light bordered">

    {{--<form action="/administrator/stock" method="post" id="frmStock" enctype="multipart/form-data">--}}
    {{--<input type="hidden" name="_token" value="{{ csrf_token()}}"/>--}}
    <!-- Begin page content -->
        <div class="container-fluid">
            {{-- invoice details --}}
            <div class="grid simple">

                <div>
                    <p class="clearfix"></p>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Shift Date<b class="star">* </b></label>
                                {{ $user->opening_date != null ? date_format(date_create($user->opening_date), "d-M-Y h:i A") : "-"}}
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <br>
                                {{ $user->opening_date != null ? Form::submit('Close Shift', ['class' => 'btn btn-sm btn-primary']) : Form::submit('Open Shift', ['class' => 'btn btn-sm btn-primary']) }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@stop
