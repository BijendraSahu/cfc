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
                    {!! Form::label('role', 'Menu Category*', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {{--                        {!! Form::select('ddlcat', $mainecate, null,['class' => 'typeDD','onchange'=>'getSub();']) !!}--}}
                        <select name="menu" id="menu" class="form-control " onchange="getSub(this);">
                            @foreach($mainecate as $catego)
                                <option value="{{$catego->McatID}}">{{$catego->CategoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('role', 'Menu Sub Category*', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8' id="menu_subcategory">
                        <select name="" id="menu_subcategory_id" class="form-control requiredDD">
                            <option value="">Select Sub Category</option>
                        </select>
                        {{--                        {!! Form::select('ddlcat', 'select', null,['class' => 'typeDD']) !!}--}}
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
<script>
    function getSub(dis) {
        $.ajax({
            type: "GET",
            contentType: "application/json; charset=utf-8",
            url: "{{ url('getSubCategory') }}",
            data: {menu_category: $(dis).val()},
            success: function (data) {
                $('#menu_subcategory').html(data);
            },
            error: function (xhr, status, error) {
                $('#menu_subcategory').html(xhr.responseText);
            }
        });
    }
</script>