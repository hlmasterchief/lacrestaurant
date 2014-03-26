@section('body')

{{ Form::open(array('url'=>"dish/edit_dish/$dish->id")) }}

<h2>Edit Dish</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

<div class="form-group">
    {{ Form::text('name', $dish->name, array('class'=>'form-control', 'placeholder'=>'Name')) }}
    {{ Form::text('price', $dish->price, array('class'=>'form-control', 'placeholder'=>'Price')) }}
    {{ Form::text('new_category', null, array('class'=>'form-control', 'placeholder'=>'New Category (If needed)')) }}
    {{ Form::select('dish_category_id', DishCategory::formSelect(), $dish->id, array('class'=>'form-control')) }}
    {{ Form::textarea('description', $dish->description, array('class'=>'form-control', 'placeholder'=>'Description')) }}
</div>
{{ Form::submit('Submit', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop