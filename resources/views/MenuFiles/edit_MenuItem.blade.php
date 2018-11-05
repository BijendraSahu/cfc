@extends('layout.master.master')

@section('title','Edit Menu Items')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="{{url('Menu')}}" class="btn btn-sm bg-danger btnSet btn-primary pull-right">
        <span class="fa fa-eye"></span>Menu List</a>
    <h3 class="heading">Edit Menus</h3>
    <hr/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if(!is_null($Menus))
        {!! Form::open(['url' => 'Menu/'.$Menus->MID, 'class' => 'form-horizontal', 'id'=>'menuedit', 'method'=>'put', 'files'=>true]) !!}
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div class='form-group'>
                        {!! Form::label('user_no', 'Menu No#', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            <p></p>
                            <label for="" class="badge">MnuID-{{$Menus->MID}}</label>
                        </div>
                    </div>
                    <div class='form-group'>
                        {!! Form::label('name', 'Menu Name*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            {!! Form::text('name', $Menus->M_Name, ['class' => 'form-control input-sm required','placeholder'=>'Name']) !!}
                        </div>
                    </div>

                    <div class='form-group'>
                        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            {!! Form::text('description', $Menus->Descriptions, ['class' => 'form-control input-sm', 'placeholder'=>'Description']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Percent', 'Tax Percent*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            {!! Form::select('percent_id', $percent, $Menus->percent_id,['class' => 'typeDD']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tour_image', 'Menu Image*',  ['class' => 'col-sm-4 control-label', 'type'=>'file', 'accept'=>'image/*']) !!}
                        <div class="col-sm-8">
                            {!! Form::file('menu_img', null, ['class' => 'control-label input-sm required', 'type'=>'file', 'accept'=>'image/*']) !!}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">

                        {!! Form::label('role', 'Sub Category*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            {!! Form::select('ddlcat', $cate, $Menus->MCID,['class' => 'typeDD']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ap', 'Act Price*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            {!! Form::text('actprice', $Menus->Act_Price, ['class' => 'form-control amount input-sm required', 'placeholder'=>'Act Price']) !!}
                        </div>
                    </div>
                    <div class='form-group'>
                        {!! Form::label('sp', 'Sale Price*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class='col-sm-8'>
                            {!! Form::text('saleprice', $Menus->Sale_Price, ['class' => 'form-control amount input-sm required', 'placeholder'=>'Sale Price']) !!}
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-8'>
                            {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    @else
        <h4>UserMaster not found !</h4>
    @endif
@stop
