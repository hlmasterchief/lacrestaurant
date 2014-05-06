@section('body')

<h2>Menu list</h2>
<h3>{{ HTML::link('admin/menu/create_menu', "Create Menu") }}</h3>
<ul>
    @foreach(Menu::all() as $menu)
    <li>{{ HTML::link("admin/menu/$menu->id", $menu->menu_date) }}</li>
    @endforeach
</ul>

@stop