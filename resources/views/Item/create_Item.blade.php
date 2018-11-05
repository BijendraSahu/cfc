<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'Item', 'class' => 'form-horizontal', 'id'=>'items']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-6">

            <div class="form-group">
                {!! Form::label('role', 'Category *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::select('ddlcat', $Icate, null,['class' => 'form-control requiredDD']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('name', 'Menu Name *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Menu Name']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Unit *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::select('ddlunit', $unt, null,['class' => 'form-control requiredDD']) !!}
                </div>
            </div>


        </div>
        <div class="col-sm-6">
            <div class='form-group'>
                {!! Form::label('name', 'Item Code', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('itemcode', null, ['class' => 'form-control input-sm  ', 'placeholder'=>'Item Code']) !!}
                </div>
            </div>

            <div class='form-group'>
                {!! Form::label('at', 'Description', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('description', null, ['class' => 'form-control input-sm', 'placeholder'=>'Description']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('sp', 'R.O.L', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('rol', null, ['class' => 'form-control input-sm ', 'placeholder'=>'Reorder Level']) !!}
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
