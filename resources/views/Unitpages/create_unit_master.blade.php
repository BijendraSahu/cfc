<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'Unit', 'class' => 'form-horizontal', 'id'=>'unitmaster']) !!}
<div class="container-fluid">
    <div class="container-fluid">
        <div class="col-sm-6">
            <h3 class="bg-danger text-center">Unit Info</h3>

            <div class='form-group'>
                {!! Form::label('name', 'Unit Name *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Unit Name']) !!}
                </div>
            </div>
            <div class='form-group'>
                {!! Form::label('contact', 'Minor Value *', ['class' => 'col-sm-4 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('valueunit', null, ['class' => 'form-control input-sm ', 'placeholder'=>'Minor value']) !!}
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
