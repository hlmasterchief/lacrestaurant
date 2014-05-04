@section('content')

<section class="header">
<div class="title">
    <h3>Manage Menu</h3>
    <small>Manage daily menu dishes.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Manage Menu</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="daily-menu">
<div class="box">
    <div class="box-header">
        <i class="fa fa-book"></i> Daily Menu
    </div>
    <div class="box-content">
        <div id="datepicker" class="lac-skin"></div>
    </div>
</div>
</section>

@stop