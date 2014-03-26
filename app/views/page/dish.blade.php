@section('body')

<table>
	@foreach(Dish::all() as $dish)
	<tr>
		<td>{{ $dish->id }}</td>
		<td>{{ $dish->name }}</td>
		<td>{{ $dish->price }}</td>
	</tr>
	@endforeach
</table>

@stop