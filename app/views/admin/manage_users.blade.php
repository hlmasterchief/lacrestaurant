@section('content')

<section class="header">
<div class="title">
    <h3>Manage Staff</h3>
    <small>Staffs list and manage account for staffs.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Manage Staffs</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="staff-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-users"></i> Staffs List
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
            @foreach($users as $user)
            <tr>
                <td><a href="/admin/users/edit/{{$user->id}}">{{$user->username}}</a></td>
                <td class="birthday">{{$user->birthday}}</td>
                <td class="center">{{$user->realname}}<small>{{$user->email}}</small></td>
                <td class="action"><a href="/admin/users/edit/{{$user->id}}"><i class="fa fa-pencil-square-o"></i></a> <a href="/admin/users/delete/{{$user->id}}"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="footer-data">
            <a href="/admin/users/create" class="pure-button pure-button-primary float-left">Create New Account</a>
            {{$users->links()}}
        </div>
    </div>
</div>
</section>

@stop