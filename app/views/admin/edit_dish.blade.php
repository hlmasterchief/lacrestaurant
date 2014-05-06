@section('content')

<section class="header">
<div class="title">
    <h3>Edit Dish</h3>
    <small>Edit a dish information.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/dishes">Manage Dishes</a> <span class="current">/ Edit Dish</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="create-dish">
<div class="box">
    <div class="box-header">
        <i class="fa fa-cutlery"></i> Edit Dish
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
        {{ Form::open(array('url' => 'admin/dishes/edit/'.$dish->id, 'class' => 'pure-form pure-form-stacked', 'files' => true)) }}
        <table class="data">
        <thead>
            <tr>
                <th>Dish</th>
                <th class="center" width="72px">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ Form::text('name', $dish->name, array('class'=>'form-control', 'placeholder'=>'Dish Name')) }}</td>
                <td class="center"><span class="dollar">$</span>{{ Form::text('price', sprintf("%.2f",$dish->price), array('class'=>'form-control price', 'placeholder'=>'Price')) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">{{ Form::textarea('description', $dish->description, array('class'=>'form-control', 'placeholder'=>'Dish description', 'rows'=>'4')) }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="message">
                        <div id="demo-img" class="img-wrapper">
                        <img src="{{$dish->dishImageLink()}}" />
                        </div>
                    </div>
                    <div class="file-button">
                    <button id="select-img" class="pure-button pure-button-primary">Select New Image</button>
                    {{Form::file('image', array('id'=>'input-img', 'class'=>'lac-file'))}}
                    </div>
                </td>
            </tr>
        </tfoot>
        </table>
        <div class="footer-data">
            {{ Form::submit('Edit Dish', array('class' => 'pure-button pure-button-primary float-left')) }}
        </div>
        {{ Form::close() }}
    </div>
</div>
</section>

@stop