@section('body')

{{ Form::open(array('url'=>'admin/dish/create_dish')) }}

<h2>Add New Dish</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

@if(Session::has('dish'))
    <p class="bg-info">{{ Session::get('dish') }}</p>
@endif

<div class="form-group">
    {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Name')) }}
    {{ Form::text('price', null, array('class'=>'form-control', 'placeholder'=>'Price')) }}
    {{ Form::text('new_category', null, array('class'=>'form-control', 'placeholder'=>'New Category (If needed)')) }}
    {{ Form::select('dish_category_id', DishCategory::formSelect(), null, array('class'=>'form-control')) }}
    {{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Description')) }}
</div>
{{ Form::submit('Submit', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop