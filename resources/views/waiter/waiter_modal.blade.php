<script src="{{ url('assets/js/validation.js') }}"></script>
@if($errors->any())
    <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
@endif
{!! Form::open(['url' => 'home', 'class' => 'form-horizontal', 'id'=>'user_master']) !!}
<div class="logindiv">
    {!! Form::text('username', $user->username, ['class' => 'form-control hidden input-sm required', 'placeholder'=>'Username']) !!}
    {{--                    {!! Form::text('password', null, ['class' => 'form-control input-sm required', 'placeholder'=>'Password', 'type'=>'password']) !!}--}}
    <input name="password" type="password" class="form-control password_txt" placeholder="Password" id="txtpassword"
           autocomplete="off" data-validate="TT_btnpassword">
    <div class="password_icon mdi mdi-lock-outline mdi-16px"></div>
    <p class="clearfix"></p>
    {!! Form::submit('Submit', ['class' => 'btn btn-sm btn-primary ']) !!}
</div>
{!! Form::close() !!}
