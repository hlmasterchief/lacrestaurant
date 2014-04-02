<!DOCTYPE html>
<html lang="en" ng-app="lacApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Restaurant</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/main.css">
        <base href="/" />

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div id="views" ng-view></div>
        </div>

        <!-- include javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
        <script src="http://code.angularjs.org/1.2.15/angular-route.min.js"></script>
        <script src="http://code.angularjs.org/1.2.15/angular-animate.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>