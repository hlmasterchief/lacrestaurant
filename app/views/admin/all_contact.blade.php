@section('body')

<h2>Contact/Feedback list</h2>

<table class="table table-striped">
    @foreach(Contact::all() as $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ HTML::link("admin/contact/$contact->id", $contact->subject) }}</td>
        <td>{{ ($contact->type)?'Feedback':'Contact' }}</td>
        <td>{{ $contact->name }}</td>
    </tr>
    @endforeach
</table>

@stop