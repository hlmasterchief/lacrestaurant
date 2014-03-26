@section('body')

{{ Form::open(array('url'=>'user/login', 'autocomplete' => 'off')) }}

<h2>Please Login</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

<div class="form-group">
    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
</div>
{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop