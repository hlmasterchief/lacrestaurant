@section('body')

<h2>Menu list</h2>
<ul>
    @foreach(Menu::all() as $menu)
    <li>{{ HTML::link("menu/$menu->id", $menu->menu_date) }}</li>
    @endforeach
</ul>

@stop