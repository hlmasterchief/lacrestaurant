@section('body')

<table class="table table-striped">
	@foreach(Dish::all() as $dish)
	<tr>
		<td>{{ $dish->id }}</td>
		<td>{{ $dish->name }}</td>
		<td>{{ $dish->price }}</td>
        <td>{{ var_dump($dish->dishCategory) }}</td>
	</tr>
	@endforeach
</table>

@stop