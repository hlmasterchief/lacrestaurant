@section('body')

<table class="table table-striped">
	@foreach(Dish::all() as $dish)
	<tr>
		<td>{{ $dish->id }}</td>
		<td>{{ $dish->name }}</td>
		<td>{{ $dish->price }}</td>
        <td>{{ $dish->dishCategory->name }}</td>
        <td>
            <ul>
                @foreach($dish->dishImages as $image)
                    <li>{{ $image->link }}</li>
                @endforeach
            </ul>
        </td>
	</tr>
	@endforeach
</table>

@stop