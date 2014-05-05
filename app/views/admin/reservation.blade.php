@section('body')

<h2>Date: {{ $reservation->name }} Time: {{ $reservation->price }}</h2>
<dl class="dl-horizontal">
    <dt>Name</dt>
    <td>{{ $reservation->user->name }}</td>
    <dt>Number</dt>
    <dd>{{ $reservation->number }}</dd>
    <dt>Comment</dt>
    <dd>{{ $reservation->comment }}</dd>
</dl>


@stop