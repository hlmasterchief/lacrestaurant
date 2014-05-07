@section('body')

<h2>Reservation list</h2>

<table class="table table-striped">
    @foreach(Reservation::all() as $reservation)
    <tr>
        <td>{{ HTML::link("admin/reservation/$reservation->id", $reservation->id) }}</td>
        <td>{{ $reservation->date }}</td>
        <td>{{ $reservation->time }}</td>
        <dd>{{ $reservation->number }}</dd>
    </tr>
    @endforeach
</table>

@stop