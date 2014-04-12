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
    console.log(angular.element($("body")).scope().notAbout = false);
});

// MenuController
lacApp.controller("MenuController", function($scope, $http) {
    console.log(angular.element($("body")).scope().notAbout = true);
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
        .when('/menu2', {
            templateUrl : 'template/menu2.html',
            controller  : 'MainController'
        })
        .when('/menu3', {
            templateUrl : 'template/menu3.html',
            controller  : 'MainController'
        })

        // redirect if route not found
        .otherwise({
            redirectTo: '/'
        });

    $locationProvider.html5Mode(true);
});