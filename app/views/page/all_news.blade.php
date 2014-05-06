@section('body')

<h2>News list</h2>
<h3>{{ HTML::link('admin/news/create_news', "Create News") }}</h3>
<ul>
    @foreach(News::all() as $news)
    <li>{{ HTML::link("admin/news/$news->id", $news->title) }}</li>
    @endforeach
</ul>

@stop