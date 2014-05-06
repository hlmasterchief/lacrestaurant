@section('body')

{{ Form::open(array('url'=>"admin/menu/edit_menu/$menu->id", 'autocomplete' => 'off')) }}

<h2>Edit Menu</h2>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if(Session::has('message'))
    <p class="bg-primary">{{ Session::get('message') }}</p>
@endif

<div class="form-group">
    <div class='input-group date' id='datetimepicker' data-date-format="YYYY-MM-DD">
    {{ Form::text('menu_date', $menu->menu_date, array('class'=>'form-control', 'placeholder'=>'YYYY-MM-DD')) }}
    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
    </div>

    <h4>Choose dishes</h4>
    <ul>
        @foreach(Dish::all() as $dish)
        <li><label>
            {{ Form::checkbox('dishes[]', $dish->id, $menu->hasDish($dish->id)) }} {{ $dish->name }}
        </label></li>
        @endforeach
    </ul>

    <br/>
    {{ Form::textarea('recommendation', $menu->recommendation->recommendation, array('class'=>'form-control', 'placeholder'=>'Recommend menu today')) }}

</div>
{{ Form::submit('Update', array('class'=>'btn btn-primary'))}}

{{ Form::close() }}

@stop

@section('js')
<script language="javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            pickTime: false
        });
    });
</script>
@stop