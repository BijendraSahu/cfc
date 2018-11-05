@extends('layout.master.master')

@section('title','Create Menu Ingredients')

@section('content')
    <a href="{{url('Ingredient')}}" class="btn btn-sm bg-danger btnSet btn-primary pull-right">
        <span class="fa fa-eye"></span>MenuIngredients List</a>
    <h3 class="heading">Create MenusIngredient</h3>
    <hr/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    {!! Form::open(['url' => 'Ingredient', 'class' => 'form-horizontal', 'id'=>'ingredient']) !!}
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-sm-6">

                <div class='form-group'>
                    {!! Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlmenu', $menu, null,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('item', 'Item Name *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlitem', $item, null,['class' => 'typeDD']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('role', 'Unit *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::select('ddlunit', $unt, null,['class' => 'form-control requiredDD']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('qty', 'Quantity *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('qty', null, ['class' => 'form-control input-sm qty amount required',  'id'=>'quantity','placeholder'=>'Qty']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class='form-group'>
                    {!! Form::label('rate', 'Rate *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('rate', null, ['class' => 'form-control input-sm amount required', 'placeholder'=>'Rate']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('yield_rate', 'Yield Rate *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('yield_rate', null, ['class' => 'form-control input-sm amount required', 'id'=>'yRate','placeholder'=>'Yield Rate']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('amount', 'Amount *', ['class' => 'col-sm-4 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::label('0.0', '', ['class' => 'AMT control-label']) !!}
                        {!! Form::text('amount', null, ['class' => 'form-control hidden input-sm amount required', 'id'=>'itemAmt', 'placeholder'=>'Amount']) !!}
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
    <script>
        $(document).on('change keyup blur', '.qty', function () {
            calculateTotal();
        });

        $(document).on('change keyup blur', '#yRate', function () {
            calculateTotal();
        });
        function calculateTotal() {
            itemAmount = 0;
            quantity = $('#quantity').val();
            yRate = $('#yRate').val();
            if (quantity != '' && yRate != '') {
                itemAmount += (parseFloat(yRate) * parseFloat(quantity)).toFixed(2);
                $('#itemAmt').val(parseFloat(itemAmount));
                $('.AMT').html(parseFloat(itemAmount));
            }
        }
    </script>
@stop
