@section('content')

<section class="header">
<div class="title">
    <h3>Read Reservation</h3>
    <small>Read customer reservations.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> / <a href="/admin/reserve">Manage Reservation</a> <span class="current">/ Read Reservation</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="dishes-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-book"></i> Read Reservation
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
        <table class="data">
        <thead>
            <tr>
                <th>Room Code</th>
                <th width="60px" class="center">Status</th>
                <th width="120px" class="center">Datetime</th>
                <th width="120px" class="center">Person Number</th>
                <th width="136px" class="center">Contact</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="/admin/reserve/{{$reserve->id}}" class="title">Room {{$reserve->user->room->room_code}}</a>
                </td>
                <td class="center">{{$reserve->getType()}}</td>
                <td class="center">{{$reserve->date}}<small>{{$reserve->time}}</small></td>
                <td class="center">{{$reserve->numbers}}</td>
                <td class="center">{{$reserve->user->realname}}<small>{{$reserve->phonenumber}}</small></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">{{$reserve->requirements}}</td>
            </tr>
        </tfoot>
        </table>
        <div class="footer-data">
            @if($reserve->status == 0)
            <a href="/admin/reserve/ongoing/{{$reserve->id}}" class="pure-button pure-button-primary float-left">Confirm Reservation</a>
            @elseif($reserve->status == 1)
            <a href="/admin/reserve/close/{{$reserve->id}}" class="pure-button pure-button-primary float-left">Close Reservation</a>
            @endif
        </div>
    </div>
</div>
</section>

@stop
