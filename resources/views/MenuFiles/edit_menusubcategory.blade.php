<script src="{{ url('assets/js/validation.js') }}"></script>

@if(!is_null($MenuCategory))
    {!! Form::open(['url' => 'subcategory/'.$MenuCategory->McatID, 'class' => 'form-horizontal', 'id'=>'Emptype', 'method'=>'put', 'files'=>true]) !!}
    <div class="container-fluid">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::label('role', 'Sub Category*', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::select('ddlcat', $cate, $MenuCategory->category_id,['class' => 'form-control requiredDD']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('role', 'SubCategory*', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('name', $MenuCategory->CategoryName, ['class' => 'form-control input-sm required','placeholder'=>'SubCategory']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Discription', ['class' => 'col-sm-2 control-label']) !!}
                <div class='col-sm-8'>
                    {!! Form::text('Discription', $MenuCategory->Discriptions, ['class' => 'form-control input-sm ','placeholder'=>'Name']) !!}
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-8'>
                    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
@else
    <h4>Subcategory not found !</h4>
@endif
