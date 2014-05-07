@section('content')

<section class="header">
<div class="title">
    <h3>Edit Menu</h3>
    <small>Edit daily menu.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/menu">Manage Menu</a> <span class="current">/ Edit Menu</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="edit-menu">
<div class="box">
    <div class="box-header">
        <i class="fa fa-book"></i> Edit Menu
    </div>
    <div class="box-content">
        @if(Session::has('message'))
        <div class="message">
            <span class="info">{{ Session::get('message') }}</span>
            @foreach($errors->all() as $error)
            <span class="info error">{{ $error }}</span>
            @endforeach
        </div>
        @endif
        {{ Form::open(array('url' => 'admin/menu/edit/'.$menu->menu_date, 'class' => 'pure-form pure-form-stacked')) }}
        <table class="data">
        <thead>
            <tr>
                <th>{{date("F j, Y",strtotime($menu->menu_date))}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                <div class="pure-g-r">
                @foreach(Dish::all() as $dish)
                <div class="pure-u-1-2">
                    <div class="dish-choice">
                    {{Form::checkbox('dishes[]', $dish->id, $menu->hasDish($dish->id), array('id'=>"dish-$dish->id"))}}
                    <div class="label">
                    {{Form::label("dish-$dish->id", $dish->name)}}
                    </div>
                    </div>
                </div>
                @endforeach 
                </div>
                </td>
            </tr>
        </tbody>
        </table>
        <div class="footer-data">
            {{ Form::submit('Edit Menu', array('class' => 'pure-button pure-button-primary float-left')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
</section>

@stop