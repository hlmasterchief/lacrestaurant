@section('body')

<h2>Menu list</h2>
<h3>{{ HTML::link('menu/create_menu', "Create Menu") }}</h3>
<ul>
    @foreach(Menu::all() as $menu)
    <li>{{ HTML::link("menu/$menu->id", $menu->menu_date) }}</li>
    @endforeach
</ul>

@stop