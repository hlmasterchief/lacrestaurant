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

        $http({method: "GET", url: $scope.url}).
            success(function(data, status) {
                $scope.dishes = data;
            }).
            error(function(data, status) {
                $scope.msg = data.message;
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
        $("strong").addClass("animated fadeIn");

        $http({method: "POST", url: 'admin/contact', data: $scope.contact}).
            success(function(data, status) {
                $scope.msg = data.message;
            }).
            error(function(data, status) {
                $scope.msg = data.message;
            });
    };
});

// NewsController
lacApp.controller("NewsController", function($scope, $http) {
    $scope.news = {};
    $scope.message = "";

    $scope.fetch = function() {
        $http({method: "GET", url: 'admin/news', params: {'_request': 'ajax'}}).
            success(function(data, status) {
                $scope.news = data.sort(function(a,b) {
                    return b.id > a.id;
                });

                for (var index in $scope.news) {
                    $scope.news[index].status = 1; 
                }
            }).
            error(function(data, status) {
                $scope.message = "Cannot fetch news.";
            });
    };

    $scope.change = function() {
        this.info.shortId = "#short" + this.info.id;
        this.info.fullId  = "#full" + this.info.id;

        if (this.info.status == 1) {
            $(this.info.shortId).hide();
            $(this.info.fullId).show();
            this.info.status = 0;

        } else if (this.info.status == 0) {
            $(this.info.shortId).show();
            $(this.info.fullId).hide();
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