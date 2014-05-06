@section('content')

<section class="header">
<div class="title">
    <h3>Create News</h3>
    <small>Post news onto front page.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/news">Manage News</a> <span class="current">/ Create News</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="edit-news">
<div class="box">
    <div class="box-header">
        <i class="fa fa-rss-square"></i> Create News
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
        {{ Form::open(array('url' => 'admin/news/create', 'class' => 'pure-form pure-form-stacked')) }}
        <table class="data">
        <thead>
            <tr>
                <th>News</th>
                <th class="creator center">Creator</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Title')) }}</td>
                <td class="center"><a href="/admin/users/edit/{{Auth::user()->id}}">{{Auth::user()->realname}}</a><small>{{Auth::user()->email}}</small></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">{{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'News Contents')) }}</td>
            </tr>
        </tfoot>
        </table>
        <div class="footer-data">
            {{ Form::submit('Post News', array('class' => 'pure-button pure-button-primary float-left')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
</section>

@stop