<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LAC Restaurant - Admin Page</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pure/0.4.2/pure-min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/admin.css">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="admin-navbar pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
            <a href="#" class="pure-menu-heading"><i class="fa fa-cogs"></i> LAC RESTAURANT</a>
            <ul>
                <li><a href="#"><i class="fa fa-user"></i> t3ngcu00</a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            </ul>
        </div>

        <div class="menu">
            <div class="container">
                <h5>Main Menu</h5>
                <ul>
                    <li {{ HTML::is_active("admin") }}><a href="/admin">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="text">Dashboard</span>
                    </a></li>
                    <li {{ HTML::is_active("admin/reserves") }}><a href="#">
                        <span class="icon"><i class="fa fa-phone-square"></i></span>
                        <span class="text">Manage Reservation</span>
                    </a></li>
                    <li {{ HTML::is_active("admin/dishes") }}><a href="#">                        
                        <span class="icon"><i class="fa fa-cutlery"></i></span>
                        <span class="text">Manage Dishes</span>
                    </a></li>
                    <li {{ HTML::is_active("admin/menu") }}><a href="#">                        
                        <span class="icon"><i class="fa fa-book"></i></span>
                        <span class="text">Manage Menu</span>
                    </a></li>
                    <li {{ HTML::is_active("admin/news") }}><a href="#">                        
                        <span class="icon"><i class="fa fa-rss-square"></i></span>
                        <span class="text">Manage News</span>
                    </a></li>
                    <li {{ HTML::is_active("admin/users") }}><a href="/admin/users">                        
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="text">Manage Staffs</span>
                    </a></li>
                    <li {{ HTML::is_active("admin/feedbacks") }}><a href="#">
                        <span class="icon"><i class="fa fa-comments"></i></span>
                        <span class="text">Manage Feedback</span>
                    </a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="container">
                @yield('content', 'MOTHERFUCKER')
            </div>
        </div>

        <!-- include javascript -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.15/angular.min.js"></script>
        <script src="/js/admin.js"></script>
        <script src="/js/moment.js"></script>
    </body>
</html>