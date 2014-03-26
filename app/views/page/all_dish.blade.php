@section('body')

<h2>Dish list</h2>
<h3>{{ HTML::link('dish/create_dish', "Create Dish") }}</h3>

<table class="table table-striped">
    @foreach(Dish::all() as $dish)
    <tr>
        <td>{{ $dish->id }}</td>
        <td>{{ HTML::link("dish/$dish->id", $dish->name) }}</td>
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