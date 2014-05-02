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
                <th class="id"></th>
                <th width="23%">Username</th>
                <th width="23%">Full Name</th>
                <th width="19%" class="birthday">Birthday</th>
                <th width="35%">E-mail Address</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="id">1</td>
                <td>admin</td>
                <td>Cuong Nguyen</td>
                <td class="birthday">1993-05-04</td>
                <td>cuongnt.hn@gmail.com</td>
                <td class="action"><a href="#"><i class="fa fa-pencil-square-o"></i></a> <a href="#"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            <tr>
                <td class="id">2</td>
                <td>admin</td>
                <td>Cuong Nguyen</td>
                <td class="birthday">1993-05-04</td>
                <td>cuongnt.hn@gmail.com</td>
                <td class="action"><a href="#"><i class="fa fa-pencil-square-o"></i></a> <a href="#"><i class="fa fa-trash-o"></i></a></td>
            </tr>
        </tbody>
        </table>
        <span class="float-right"><a href="/admin/users/create" class="pure-button pure-button-primary float-right">Create Staff Account</a></span>
    </div>
</div>
</section>

@stop