<script src="{{ url('assets/js/validation.js') }}"></script>
{!! Form::open(['url' => 'order_item/'.$order_item->id.'/cancel', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
<div class="container-fluid">
    <div class="col-sm-12">
        <div class='form-group'>
            {!! Form::label('', '', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-8'>
                <p></p>
                <label for="" class="badge">Are you sure want to Mark this as cancel</label>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('role', 'Enter Remark *', ['class' => 'col-sm-2 control-label']) !!}
            <div class='col-sm-8'>
                <textarea class="form-control" row="5" column="5" placeholder="Enter Remark" name="rmk"></textarea>
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
