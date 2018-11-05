@extends('layout.master.master')

@section('title','List of Menu Items')

@section('content')
    <a href="{{url('Menu')}}" class="btn btn-sm bg-danger btnSet btn-primary pull-right">
        <span class="fa fa-eye"></span>Menu List</a>
    <h3 class="heading">Create Menus</h3>
    <hr/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    {!! Form::open(['url' => 'Menu', 'class' => 'form-horizontal', 'id'=>'Menus', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">

                <div class='form-group'>
                    {!! Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Menu Name']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('Description', 'Description', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('description', null, ['class' => 'form-control input-sm  ', 'placeholder'=>'Description']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('Percent', 'Tax Percent*', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('percent_id', $percent, null,['class' => 'typeDD']) !!}
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
                    {!! Form::label('role', 'Sub Category*', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlcat', $cate, null,['class' => 'typeDD']) !!}
                    </div>
                </div>


                <div class='form-group'>
                    {!! Form::label('at', 'Act Price *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('actprice', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Actual Price']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('sp', 'Sale Price *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('saleprice', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Sale Price']) !!}
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