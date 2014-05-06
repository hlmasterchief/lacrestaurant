@section('content')

<section class="header">
<div class="title">
    <h3>Delete Account</h3>
    <small>Delete account confirmation.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/users">Manage Staff</a> <span class="current">/ Delete Staff Account</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="staff-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-users"></i> Delete Account
    </div>
    <div class="box-content">
        <table class="data">
        <thead>
            <tr>
                <th>Username</th>
                <th width="96px" class="birthday">Birthday</th>
                <th width="200px" class="center">Contact Details</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->username}}</td>
                <td class="birthday">{{$user->birthday}}</td>
                <td class="center">{{$user->realname}}<small>{{$user->email}}</small></td>
                <td class="action"><a href="/admin/users/edit/{{$user->id}}"><i class="fa fa-pencil-square-o"></i></a></td>
            </tr>
        </tbody>
        </table>
        <div class="footer-data">
            {{ Form::open(array('url' => 'admin/users/delete/'.$user->id, 'class' => 'pure-form pure-form-stacked')) }}
            {{ Form::submit('Delete Account', array('class' => 'pure-button pure-button-primary float-left')) }}
            {{ Form::close() }}
            <a href="/admin/users" class="pure-button pure-button-primary float-left">Cancel</a>
        </div>
    </div>
</div>
</section>

@stop