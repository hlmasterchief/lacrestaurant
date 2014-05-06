@section('content')

<section class="header">
<div class="title">
    <h3>Delete News</h3>
    <small>Delete news confirmation.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/news">Manage News</a> <span class="current">/ Delete News</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="staff-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-rss-square"></i> Delete News
    </div>
    <div class="box-content">
        <table class="data">
        <thead>
            <tr>
                <th>News</th>
                <th class="creator center">Creator</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/admin/news/edit/{{$new->id}}" class="title">{{$new->title}}</a><small>Created Date: {{$new->getCreatedDateAttribute()}}</small></td>
                <td class="center"><a href="/admin/users/edit/{{$new->user->id}}">{{$new->user->realname}}</a><small>{{$new->user->email}}</small></td>
                <td class="action"><a href="/admin/news/edit/{{$new->id}}"><i class="fa fa-pencil-square-o"></i></a></td>
            </tr>
        </tbody>
        </table>
        <div class="footer-data">
            {{ Form::open(array('url' => 'admin/news/delete/'.$new->id, 'class' => 'pure-form pure-form-stacked')) }}
            {{ Form::submit('Delete News', array('class' => 'pure-button pure-button-primary float-left')) }}
            {{ Form::close() }}
            <a href="/admin/news" class="pure-button pure-button-primary float-left">Cancel</a>
        </div>
    </div>
</div>
</section>

@stop