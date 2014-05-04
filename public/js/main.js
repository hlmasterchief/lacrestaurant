var lacApp = angular.module(
    'lacApp', 
    ['ngRoute'], 
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

// MainController
lacApp.controller("MainController", function($scope, $http) {
    $scope.notAbout = false;
});

// HomeController
lacApp.controller("HomeController", function($scope, $http) {
    
});

// MenuController
lacApp.controller("MenuController", function($scope, $http) {
    $scope.dishes = null;
    $scope.msg = "";
    $date = moment();

    $(".content.right").css("width", $(window).width() - 320);

    $scope.previousday = function() {
        $date = $date.add("day", -1);
        angular.element($("#menu")).scope().fetch($date);
    };

    $scope.nextday = function() {
        $date = $date.add("day", 1);
        angular.element($("#menu")).scope().fetch($date);
    };

    $scope.fetch = function(getdate) {
        $scope.date = getdate.format("DD - MM - YYYY");
        var datadate = getdate.format("YYYY-MM-DD");
        $scope.url = "date_menu/" + datadate;

        $(".overlay-ajax").fadeIn(200, function() {
            $http({method: "GET", url: $scope.url}).
                success(function(data, status) {
                    $scope.dishes = data;
                    $(".overlay-ajax").fadeOut(100);
                }).
                error(function(data, status) {
                    $scope.msg = "Cannot show menu.";
                    $(".overlay-ajax").fadeOut(100);
                });
        });
    };
    angular.element($("#menu")).scope().fetch($date);
});

// ContactController
lacApp.controller("ContactController", function($scope, $http) {
    $scope.msg = "";
    $scope.contact = {};
    $scope.contact.type = 0;

    $scope.post = function() {
        $("#msg").addClass("animated fadeIn");
        $(".overlay-ajax").fadeIn(200, function() {
            $http({method: "POST", url: 'admin/contact', data: $scope.contact}).
                success(function(data, status) {
                    $scope.msg = data.message;
                    $scope.contact = {};
                    $scope.contact.type = 0;
                    $(".overlay-ajax").fadeOut(100);
                }).
                error(function(data, status) {
                    $scope.msg = data.message;
                    $(".overlay-ajax").fadeOut(100);
                });
        });
    };
});

// ReserveController
lacApp.controller("ReserveController", function($scope, $http) {

    // js for form
    jQuery('#datetimepicker1').datetimepicker({
        timepicker: false,
        format:'d.m.Y'
    });
    jQuery('#datetimepicker2').datetimepicker({
        datepicker:false,
        format:'H:i'
    });

    k = 0;
    $("#people").click(function() {
        k = 1;
    });
    $(".maincontainer").click(function() {
        change();
    });

    function change() {
        if (($("div.number-list").css("display") == "none") && (k == 1)) $("div.number-list").show();
        else {
            $("div.number-list").hide();
            k = 0;
        }
    }

    // effect
    if ($(window).width() > 1150) {
        $("#recommendation").html($scope.recommendation);
    }

// route setting
lacApp.config(function($routeProvider, $locationProvider) {
    $routeProvider
        // route for the home page
        .when('/', {
            templateUrl : 'template/about.html',
            controller  : 'HomeController'
        })
        .when('/menu', {
            templateUrl : 'template/menu.html',
            controller  : 'MenuController'
        })
        .when('/contact', {
            templateUrl : 'template/contact.html',
            controller  : 'ContactController'
        })
        .when('/reserve', {
            templateUrl : 'template/reserve.html',
            controller  : 'ReserveController'
        })

        // redirect if route not found
        .otherwise({
            redirectTo: '/'
        });

    $locationProvider.html5Mode(true);
});

// style
$(function() {

});

// resize
$(window).resize(function() {
    $(".content.right").css("width", $(window).width() - 320);
});