@section('body')

<h2>Contact: {{ $contact->subject }}</h2>
<dl class="dl-horizontal">
    <dt>Name</dt>
    <dd>{{ $contact->name }}</dd>
    <dt>Email</dt>
    <dd>{{ $contact->email }}</dd>
    <dt>Type</dt>
    <dd>{{ $contact->type }}</dd>
    <dt>Comment</dt>
    <dd>{{ $contact->comment }}</dd>
</dl>


@stop