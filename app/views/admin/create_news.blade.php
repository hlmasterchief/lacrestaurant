@section('body')

{{ Form::open(array('url'=>'admin/news/create_news')) }}

<h2>Add News</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

@if(Session::has('news'))
    <p class="bg-info">{{ Session::get('news') }}</p>
@endif

<div class="form-group">
    {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'The Title')) }}
    </br>
    {{ Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Post content')) }}
</div>
{{ Form::submit('Post News', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop