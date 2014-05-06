@section('content')

<section class="header">
<div class="title">
    <h3>Edit News</h3>
    <small>Edit news information and details.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/news">Manage News</a> <span class="current">/ Edit News</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="edit-news">
<div class="box">
    <div class="box-header">
        <i class="fa fa-rss-square"></i> Edit News
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
        {{ Form::open(array('url' => 'admin/news/edit/'.$new->id, 'class' => 'pure-form pure-form-stacked')) }}
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
                <td>{{ Form::text('title', $new->title, array('class'=>'form-control', 'placeholder'=>'Title')) }}<small>Created Date: {{$new->getCreatedDateAttribute()}}</small></td>
                <td class="center"><a href="/admin/users/edit/{{$new->user->id}}">{{$new->user->realname}}</a><small>{{$new->user->email}}</small></td>
                <td class="action"><a href="/admin/news/delete/{{$new->id}}"><i class="fa fa-trash-o"></i></a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">{{ Form::textarea('description', $new->br2nl(), array('class'=>'form-control', 'placeholder'=>'News Contents')) }}</td>
            </tr>
        </tfoot>
        </table>
        <div class="footer-data">
            {{ Form::submit('Edit News', array('class' => 'pure-button pure-button-primary float-left')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
</section>

@stop