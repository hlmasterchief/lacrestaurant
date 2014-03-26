@section('body')

<h2>Menu {{ $menu->menu_date }}</h2>
<ul>
    @foreach($menu->dishes as $dish)
    <li>{{ HTML::link("dish/$dish->id", $dish->name) }}</li>
    @endforeach
</ul>

@stop