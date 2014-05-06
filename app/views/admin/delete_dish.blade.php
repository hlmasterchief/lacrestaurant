@section('content')

<section class="header">
<div class="title">
    <h3>Delete Dish</h3>
    <small>Delete dish confirmation.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/dishes">Manage Dishes</a> <span class="current">/ Delete Dish</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="staff-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-cutlery"></i> Delete Dish
    </div>
    <div class="box-content">
        <table class="data">
        <thead>
            <tr>
                <th>Dish</th>
                <th class="center price">Price</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/admin/dishes/edit/{{$dish->id}}" class="title">{{$dish->name}}</a>
                <small>{{$dish->description}}</small>
                </td>
                <td class="center">${{sprintf("%.2f",$dish->price)}}</td>
                <td class="action"><a href="/admin/dishes/edit/{{$dish->id}}"><i class="fa fa-pencil-square-o"></i></a></td>
            </tr>
        </tbody>
        </table>
        <div class="footer-data">
            {{ Form::open(array('url' => 'admin/dishes/delete/'.$dish->id, 'class' => 'pure-form pure-form-stacked')) }}
            {{ Form::submit('Delete Dish', array('class' => 'pure-button pure-button-primary float-left')) }}
            {{ Form::close() }}
            <a href="/admin/dishes" class="pure-button pure-button-primary float-left">Cancel</a>
        </div>
    </div>
</div>
</section>

@stop