@section('content')

<section class="header">
<div class="title">
    <h3>Manage News</h3>
    <small>Manage news list, allow create, edit and delete news.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Manage News</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="dishes-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-rss-square"></i> News List
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
            @foreach($news as $new)
            <tr>
                <td><a href="/admin/news/edit/{{$new->id}}" class="title">{{$new->title}}</a><small>Created Date: {{$new->getCreatedDateAttribute()}}</small></td>
                <td class="center"><a href="/admin/users/edit/{{$new->user->id}}">{{$new->user->realname}}</a><small>{{$new->user->email}}</small></td>
                <td class="action"><a href="/admin/news/edit/{{$new->id}}"><i class="fa fa-pencil-square-o"></i></a> <a href="/admin/news/delete/{{$new->id}}"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="footer-data">
            <a href="/admin/news/create" class="pure-button pure-button-primary float-left">Post News</a>
            {{$news->links()}}
        </div>
    </div>
</div>
</section>

@stop