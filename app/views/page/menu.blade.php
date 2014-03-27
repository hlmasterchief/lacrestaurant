@section('body')

<h2>Menu {{ $menu->menu_date }}</h2>
<h3>{{ HTML::link("menu/edit_menu/$menu->id", "Edit Menu") }}</h3>
<ul>
    @foreach($menu->dishes as $dish)
    <li>{{ HTML::link("dish/$dish->id", $dish->name) }}</li>
    @endforeach
</ul>

<div>
{{ Form::button('Recommendation', $recommendation->recommendation) }}
</div>

@stop