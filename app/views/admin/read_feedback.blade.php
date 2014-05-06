@section('content')

<section class="header">
<div class="title">
    <h3>Feedback</h3>
    <small>Customer feedback.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/feedback">Manage Feedback</a> <span class="current">/ Feedback</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="read-feedback">
<div class="box">
    <div class="box-header">
        <i class="fa fa-user"></i> Feedback
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
                <td><a href="/admin/feedback/{{$feedback->id}}" class="title">{{$feedback->subject}}</a><small>Created Date: {{$feedback->getCreatedDateAttribute()}}</small></td>
                <td class="center">{{$feedback->getType()}}</td>
                <td class="center">{{$feedback->name}}<small>{{$feedback->email}}</small></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">{{$feedback->comment}}</td>
            </tr>
        </tfoot>
        </table>
        <div class="footer-data">
            <a href="/admin/feedback/delete/{{$feedback->id}}" class="pure-button pure-button-primary float-left">Delete Feedback</a>
        </div>
    </div>
</div>
</section>

@stop