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
        <table class="data">
        <thead>
            <tr>
                <th>Dish</th>
                <th class="center price">Price</th>
                <th class="action">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dishes as $dish)
            <tr>
                <td><a href="#" class="title">{{$dish->name}}</a>
                <small>{{$dish->description}}</small>
                </td>
                <td class="center">${{sprintf("%.2f",$dish->price)}}</td>
                <td class="action"><a href="#"><i class="fa fa-pencil-square-o"></i></a> <a href="#"><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="footer-data">
            <a href="/admin/dishes/create" class="pure-button pure-button-primary float-left">Create New Dish</a>
            {{$dishes->links()}}
        </div>
    </div>
</div>
</section>

@stop