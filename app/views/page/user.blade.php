@section('body')

<h2>Hello, {{{ $user->username }}}</h2>
<h3>{{ HTML::link('admin/user/logout', 'Logout') }}</h3>
<h3>{{ HTML::link('admin/create_user', 'Create User') }}</h3>

@stop