@section('content')

<section class="header">
<div class="title">
    <h3>Delete Feedback</h3>
    <small>Delete feedback confirmation.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/feedback">Manage Feedback</a> <span class="current">/ Delete Feedback</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="staff-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-users"></i> Delete Feedback
    </div>
    <div class="box-content">
        <table class="data">
        <thead>
            <tr>
                <th>Subject</th>
                <th width="96px" class="center">Type</th>
                <th width="200px" class="center">Customer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="#" class="title">{{$feedback->subject}}</a><small>Created Date: {{$feedback->getCreatedDateAttribute()}}</small></td>
                <td class="center">{{$feedback->getType()}}</td>
                <td class="center">{{$feedback->name}}<small>{{$feedback->email}}</small></td>
            </tr>
        </tbody>
        </table>
        <div class="footer-data">
            {{ Form::open(array('url' => 'admin/feedback/delete/'.$feedback->id, 'class' => 'pure-form pure-form-stacked')) }}
            {{ Form::submit('Delete Feedback', array('class' => 'pure-button pure-button-primary float-left')) }}
            {{ Form::close() }}
            <a href="/admin/feedback" class="pure-button pure-button-primary float-left">Cancel</a>
        </div>
    </div>
</div>
</section>

@stop