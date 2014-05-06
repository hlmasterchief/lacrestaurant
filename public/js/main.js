var lacApp = angular.module(
    'lacApp', 
    ['ngRoute', 'ngSanitize', 'ngAnimate'], 
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
                    $scope.msg = data.message;
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

// NewsController
lacApp.controller("NewsController", function($scope, $http) {
    $scope.news = {};
    $scope.message = "";

    $scope.fetch = function() {
        $(".overlay-ajax").fadeIn(200, function() {
            $http({method: "GET", url: 'ajax/news', params: {'_request': 'ajax'}}).
                success(function(data, status) {
                    $scope.news = data.sort(function(a,b) {
                        return b.id > a.id;
                    });

                    for (var index in $scope.news) {
                        $scope.news[index].status = 1;             
                    }

                    $(".overlay-ajax").fadeOut(100);
                }).
                error(function(data, status) {
                    $scope.message = "Cannot fetch news.";
                    $(".overlay-ajax").fadeOut(100);
                });
        });
    };

    $scope.change = function() {

        if (this.info.status == 1) {
            $("#" + this.info.id).slideDown(700);
            this.info.status = 0;

        } else if (this.info.status == 0) {
            $("#" + this.info.id).slideUp(500);
            this.info.status = 1;
        }

    };
});

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
        .when('/news', {
            templateUrl : 'template/news.html',
            controller  : 'NewsController'
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