@section('body')

<h2>News {{ $news->title }}</h2>
<h3>{{ HTML::link("admin/news/edit_news/$news->id", "Edit News") }}</h3>
<h3>News content</h3>
{{ $news->description }}

@stop