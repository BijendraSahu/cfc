<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'MCATE', 'class' => 'form-horizontal', 'id'=>'Mcategory']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-6">
            <h3 class="bg-danger text-center">Category</h3>

            <div class='form-group'>
                {!! Form::label('name', 'Menu Category *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Menu Category']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('name', 'Discription', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('Discription', null, ['class' => 'form-control input-sm', 'placeholder'=>'Discription']) !!}
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
