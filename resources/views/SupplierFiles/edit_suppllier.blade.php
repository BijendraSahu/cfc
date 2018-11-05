<script src="{{ url('assets/js/validation.js') }}"></script>
@if(!is_null($sup))
    {!! Form::open(['url' => 'Supplier/'.$sup->SID, 'class' => 'form-horizontal', 'id'=>'edit', 'method'=>'put', 'files'=>true]) !!}

    <div class="container-fluid">
        <div class="container-fluid">

            <div class="col-sm-12">

                <div class="form-group">
                    {!! Form::label('role', 'Name *', ['class' => 'col-sm-2 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('name', $sup->S_Name, ['class' => 'form-control input-sm required', 'placeholder'=>'Suppler Name']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('at', 'Address *', ['class' => 'col-sm-2 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('address', $sup->Addr, ['class' => 'form-control input-sm required', 'placeholder'=>'Address']) !!}
                    </div>
                </div>
                <div class='form-group'>
                    {!! Form::label('sp', 'Contact No ', ['class' => 'col-sm-2 control-label']) !!}
                    <div class='col-sm-8'>
                        {!! Form::text('contact', $sup->Contact, ['class' => 'form-control input-sm contact', 'placeholder'=>'Contact']) !!}
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
    <h4>Supplier not found !</h4>
@endif