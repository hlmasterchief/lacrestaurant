@section('body')

<h2>Hello, {{{ $user->username }}}</h2>
<h3>{{ HTML::link('user/logout', 'Logout') }}</h3>
<h3>{{ HTML::link('user/admin/create_user', 'Create User') }}</h3>

@stop