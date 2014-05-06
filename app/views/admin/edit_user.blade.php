@section('content')

<section class="header">
<div class="title">
    <h3>Edit Staff Account</h3>
    <small>Edit a staff account information.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/users">Manage Staff</a> <span class="current">/ Edit Staff Account</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="create-staff">
<div class="box">
    <div class="box-header">
        <i class="fa fa-user"></i> Edit Staff Account
    </div>
    <div class="box-content">
        @if(Session::has('message'))
        <div class="message">
            <span class="info">{{ Session::get('message') }}</span>
            @foreach($errors->all() as $error)
            <span class="info error">{{ $error }}</span>
            @endforeach
        </div>
        @endif

        <div class="form-container">
        {{ Form::open(array('url' => 'admin/users/edit/'.$user->id, 'class' => 'pure-form pure-form-stacked')) }}
            <div class="pure-g">
            <div class="pure-u-1-2">
            {{ Form::text('username', $user->username, array('class'=>'form-control', 'placeholder'=>'Username', 'readonly'=>'')) }}
            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
            {{ Form::email('email', $user->email, array('class'=>'form-control', 'placeholder'=>'E-mail Address')) }}
            </div>
            <div class="pure-u-1-2">
            {{ Form::text('realname', $user->realname, array('class'=>'form-control', 'placeholder'=>'Full Name')) }}
            {{ Form::text('birthday', $user->birthday, array('class'=>'form-control', 'placeholder'=>'Birthday')) }}
            {{ Form::submit('Edit Account', array('class' => 'pure-button pure-button-primary')) }}
            </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>
</div>
</section>

@stop