@section('body')

<h2>Contact list</h2>

<table class="table table-striped">
    @foreach(Contact::all() as $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ HTML::link("contact/$contact->id", $contact->subject) }}</td>
        <td>{{ $contact->type }}</td>
        <td>{{ $contact->name }}</td>
    </tr>
    @endforeach
</table>

@stop