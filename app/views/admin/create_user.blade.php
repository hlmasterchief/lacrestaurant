@section('body')

{{ Form::open(array('url'=>'user/admin/create_user', 'autocomplete' => 'off')) }}

<h2>Create User</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

@if(Session::has('user'))
    <p class="bg-info">{{ Session::get('user') }}</p>
@endif

<div class="form-group">
    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    {{ Form::select('group_id', Group::formSelect(), null, array('class'=>'form-control')) }}
    {{ Form::select('room_id', Room::formSelect(), null, array('class'=>'form-control')) }}
</div>
{{ Form::submit('Create', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop