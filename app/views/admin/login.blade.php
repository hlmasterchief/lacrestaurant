@section('content')
<div class="login-box">
    <div class="container">
    @if(Session::has('message'))
    <div class="message">
        <span class="info">{{ Session::get('message') }}</span>
    </div>
    @endif
    {{ Form::open(array('url' => 'admin/login', 'class' => 'pure-form pure-form-stacked')) }}
    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    {{ Form::submit('Sign In', array('class' => 'pure-button pure-button-primary')) }}
    {{ Form::close() }}
    </div>
</div>
@stop