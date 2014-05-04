@section('content')

<section class="header">
<div class="title">
    <h3>Manage Dishes</h3>
    <small>Manage dishes list, allow create, edit and delete dish.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Manage Dishes</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="dishes-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-cutlery"></i> Dishes List
    </div>
    <div class="box-content">
        <div class="pure-g">
        @foreach($dishes as $dish)
        <div class="pure-u-1-2">
            <div class="tag">
            <span class="title">{{ $dish->name }}</span>
            <span class="action"><a href="#"><i class="fa fa-pencil-square-o"></i></a> <a href="#"><i class="fa fa-trash-o"></i></a></span>
            </div>
        </div>
        @endforeach
        </div>
        <div class="footer-data">
            <a href="/admin/dishes/create" class="pure-button pure-button-primary float-left">Create New Dish</a>
            {{$dishes->links()}}
        </div>
    </div>
</div>
</section>

@stop