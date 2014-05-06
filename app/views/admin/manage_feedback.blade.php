@section('content')

<section class="header">
<div class="title">
    <h3>Manage Feedback</h3>
    <small>Manage customer feedback and contacts.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Manage Feedback</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="dishes-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-comments"></i> Feedback List
    </div>
    <div class="box-content">
        <table class="data">
        <thead>
            <tr>
                <th>Subject</th>
                <th width="96px" class="center">Type</th>
                <th width="200px" class="center">Customer</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
            <tr>
                <td><a href="/admin/feedback/{{$feedback->id}}" class="title">{{$feedback->subject}}</a><small>Created Date: {{$feedback->getCreatedDateAttribute()}}</small></td>
                <td class="center">{{$feedback->getType()}}</td>
                <td class="center">{{$feedback->name}}<small>{{$feedback->email}}</small></td>
                <td class="action"><a href="/admin/feedback/delete/{{$feedback->id}}"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="footer-data">
            {{$feedbacks->links()}}
        </div>
    </div>
</div>
</section>

@stop