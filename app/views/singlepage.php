<!DOCTYPE html>
<html lang="en" ng-app="lacApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restaurant</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pure/0.4.2/pure-min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.0/animate.min.css">
        <link rel="stylesheet" href="css/main.css">

        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/contact.css">

        <script type="text/ng-template" src="template/menubar.html"></script>

        <base href="/" />

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body ng-controller="MainController">
        <div id="content" class="animated fadeIn">
            <div id="background" class="background">
                <div ng-include="'template/menubar.html'"></div>
                <div id="views" ng-view></div>
            </div>
        </div>
        <div class="overlay-ajax">
            <div class="ajax-loading">
                <div class="ajax-text">PLEASE WAIT...</div>
            </div>
        </div>

        <!-- include javascript -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.15/angular.min.js"></script>
        <script src="js/angular-route.min.js"></script>
        <script src="js/angular-animate.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/moment.js"></script>
    </body>
</html>