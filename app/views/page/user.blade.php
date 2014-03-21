@section('body')

<h2>Hello, {{{ $user->username }}}</h2>
<h3>{{ HTML::link('user/logout', 'Logout') }}</h3>

@stop