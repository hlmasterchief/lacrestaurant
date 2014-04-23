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
                $scope.msg = "Cannot show menu.";
            });
    };
    angular.element($("#menu")).scope().fetch($date);
});

<<<<<<< HEAD
// AboutController
lacApp.controller("ContactController", function($scope, $http) {
    $scope.submit = function() {
        $("div.input").html("The form has sent");
    }; 
=======
// ContactController
lacApp.controller("ContactController", function($scope, $http) {
    $scope.msg = "";

    $scope.post = function() {
        $http({method: "POST", url: '/contact'}).
            success(function(data, status) {
                $scope.msg = "Success!"
            }).
            error(function(data, status) {
                $scope.msg = data;
            });
    };
>>>>>>> 2c4e104eee565920836cbc414a897a5766d71a0f
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