var lacApp = angular.module(
    'lacApp', 
    ['ngSanitize'], 
    function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });