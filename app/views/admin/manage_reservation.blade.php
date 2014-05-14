@section('content')

<section class="header">
<div class="title">
    <h3>Manage Reservation</h3>
    <small>Manage customer reservations.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Manage Reservation</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="dishes-list">
<div class="box">
    <div class="box-header">
        <i class="fa fa-book"></i> Reservation List
    </div>
    <div class="box-content">
        <table class="data">
        <thead>
            <tr>
                <th>Room Code</th>
                <th width="64px" class="center">Status</th>
                <th width="120px" class="center">Datetime</th>
                <th width="120px" class="center">Person Number</th>
                <th width="136px" class="center">Contact</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reserves as $reserve)
            <tr>
                <td><a href="/admin/reserve/{{$reserve->id}}" class="title">Room {{$reserve->user->room->room_code}}</a>
                </td>
                <td class="center">{{$reserve->getType()}}</td>
                <td class="center">{{$reserve->date}}<small>{{$reserve->time}}</small></td>
                <td class="center">{{$reserve->numbers}}</td>
                <td class="center">{{$reserve->user->realname}}<small>{{$reserve->phonenumber}}</small></td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <div class="footer-data">
            {{$reserves->links()}}
        </div>
    </div>
</div>
</section>

@stop
