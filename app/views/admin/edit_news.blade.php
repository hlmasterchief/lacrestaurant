@section('body')

{{ Form::open(array('url'=>"admin/news/edit_news/$news->id")) }}

<h2>Edit News</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

<div class="form-group">
    {{ Form::text('title', $news->title, array('class'=>'form-control', 'placeholder'=>'The Title')) }}
    </br>
    {{ Form::textarea('description', $news->description, array('class'=>'form-control', 'placeholder'=>'Post content')) }}
</div>
{{ Form::submit('Post News', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop