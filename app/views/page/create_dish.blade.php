@section('body')

{{ Form::open(array('url'=>'dish/create_dish')) }}

<h2>Add New Dish</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
	<p class="bg-primary">{{ Session::get('message') }}</p>
@endif

<div class="form-group">
	{{ Form::text('name', array('class'=>'form-control', 'placeholder'=>'Name')) }}
	{{ Form::text('price', array('class'=>'form-control', 'placeholder'=>'Price')) }}
	{{ Form::textarea('description', array('class'=>'form-control', 'placeholder'=>'Description')) }}
</div>
{{ Form::submit('Submit', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop