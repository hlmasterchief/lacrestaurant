@section('content')

<section class="header">
<div class="title">
    <h3>Dashboard</h3>
    <small>Recent activities and statistics.</small>
</div>
<div class="container">
    <span class="left"><i class="fa fa-cogs"></i> <a href="/admin">Admin</a> <span class="current">/ Dashboard</span></span>
    <span class="right"><span class="current">{{ date("D M d, Y G:i a") }}</span></span>
</div>
</section>

<section class="statistic">
<div class="pure-g">
    <div class="pure-u-1-3">
        <div class="tag tag-red">
            <div class="container">
                <div class="icon">
                <i class="fa fa-bookmark"></i>
                </div>

                <div class="text">
                    <div class="value">
                    36
                    </div>

                    <div class="title">
                    New Reserves
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pure-u-1-3">
        <div class="tag tag-green">
            <div class="container">
                <div class="icon">
                <i class="fa fa-check"></i>
                </div>

                <div class="text">                    
                    <div class="value">
                    15
                    </div>

                    <div class="title">
                    Ongoing Reserves
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pure-u-1-3">
        <div class="tag tag-blue">
            <div class="container">
                <div class="icon">
                <i class="fa fa-comments"></i>
                </div>

                <div class="text">                    
                    <div class="value">
                    {{ Contact::all()->count() }}
                    </div>

                    <div class="title">
                    New Feedbacks
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="reservation">
</section>

@stop