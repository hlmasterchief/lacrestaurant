@section('body')

<h2>Menu {{ $menu->menu_date }}</h2>
<h3>{{ HTML::link("admin/menu/edit_menu/$menu->id", "Edit Menu") }}</h3>
<ul>
    @foreach($menu->dishes as $dish)
    <li>{{ HTML::link("admin/dish/$dish->id", $dish->name) }}</li>
    @endforeach
</ul>

<div>
    <h3>Recommendations</h3>
    {{ $menu->recommendation->recommendation }}
</div>

@stop