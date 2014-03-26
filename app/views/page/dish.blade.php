@section('body')

<h2>Dish: {{ $dish->name }} <small>Price: {{ $dish->price }}</small></h2>
<dl class="dl-horizontal">
    <dt>Category</dt>
    <dd>{{ $dish->dishCategory->name }}</dd>
    <dt>Images</dt>
    <dd>    
        <ul>
            @foreach($dish->dishImages as $image)
                <li>{{ HTML::image($image->link, $dish->name, array('style', 'width="300px"')) }}</li>
            @endforeach
        </ul>
    </dd>
    <dt>Description</dt>
    <dd>{{ $dish->description }}</dd>
</dl>


@stop