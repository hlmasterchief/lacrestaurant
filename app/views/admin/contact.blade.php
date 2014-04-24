@section('body')

<h2>{{ ($contact->type)?'Feedback':'Contact' }}: {{ $contact->subject }}</h2>
<dl class="dl-horizontal">
    <dt>Name</dt>
    <dd>{{ $contact->name }}</dd>
    <dt>Email</dt>
    <dd>{{ $contact->email }}</dd>
    <dt>Comment</dt>
    <dd>{{ $contact->comment }}</dd>
</dl>


@stop