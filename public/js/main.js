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
    $scope.notAvailable = false;
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
        $scope.url = "ajax/menu/" + datadate;
        $(".overlay-ajax").fadeIn(200, function() {
            $http({method: "GET", url: $scope.url}).
                success(function(data, status) {
                    $scope.notAvailable = false;
                    $scope.dishes = data;
                    $(".overlay-ajax").fadeOut(100);
                }).
                error(function(data, status) {
                    if (status == 404) {
                        $scope.notAvailable = true;
                    }
                    $scope.dishes = {};
                    $(".overlay-ajax").fadeOut(100);
                });
        });
    };
    angular.element($("#menu")).scope().fetch($date);
});

// ContactController
lacApp.controller("ContactController", function($scope, $http) {
    $scope.msg = null;
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
    $scope.reservation = {};
    $scope.message = null;
    $scope.error = null;
    $scope.msg = null;
    $scope.reservation.datadate = moment().format("DD/MM/YYYY"); 
    $scope.reservation.time = "19:00";
    $scope.reservation.datanumbers = "2 People";

    // print time list
    for (var i = 0; i < 14; i++) {
        var time = i + 8;
        $("div.time > ul").append("<li>" + time + ":00</li>");
        $("div.time > ul > li:nth-child(12)").addClass("active");
    } 

    // datepicker
    $( "#datepicker" ).datepicker({
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        onSelect: function(date, obj) {
            $("#reservedate").val(date);
        },
        dateFormat: "dd/mm/yy"
    });

    // form action
    d = 0; t = 0; p = 0; key = 0;

    $("#reservedate").click(function(){
        d = 1;
    });

    $("#datepicker").click(function(){
        key = 1;
    });

    $("#time").click(function() {
        t = 1;
    });
    $("#people").click(function() {
        p = 1;
    });
    $(".maincontainer").click(function() {
        change();
    });

    function change() {
        if (($("#datepicker").css("display") == "none") && (d == 1)) {
            $("#datepicker").show();
            $("div.number-list").hide();
            d = 0;
        }
        else if (($("div.time").css("display") == "none") && (t == 1)) {
            $("div.time").show();
            $("div.people").hide();
            t = 0;
        }
        else if (($("div.people").css("display") == "none") && (p == 1)) {
            $("div.people").show();
            $("div.time").hide();
            p = 0;
        }
        else if (key) {
            $("#datepicker").show();
            key = 0;
        }
        else {
            $("#datepicker").hide();
            $("div.number-list").hide();
            d = 0; t = 0; p = 0;
        }
    } 
    
    $("div.time > ul > li").click(function(){
        $("#time").val($(this).text());

        $("div.time > ul > li").each(function() {
            $(this).attr("class","inactive");
        });
        $(this).attr("class","active");
    });

    $("div.people > ul > li").click(function(){
        $("#people").val($(this).text());

        $("div.people > ul > li").each(function() {
            $(this).attr("class","inactive");
        });
        $(this).attr("class","active");
    }); 

    // ajax post
    $scope.post = function() {
        var datadate = $scope.reservation.datadate.split("/");
        $scope.reservation.user_id = $scope.user_id;
        $scope.reservation.date = datadate[2] + "-" + datadate[1] + "-" + datadate[0];
        $scope.reservation.numbers = parseInt($scope.reservation.datanumbers);

        $("#msg").addClass("animated fadeIn");
        $(".overlay-ajax").fadeIn(200, function() {

            $http({method: "POST", url: 'ajax/reserve', data: $scope.reservation}).
                success(function(data, status) {
                    $scope.msg = data.message;
                    $scope.reservation = {};
                    $scope.reservation.datadate = moment().format("DD/MM/YYYY"); 
                    $scope.reservation.time = "19:00";
                    $scope.reservation.datanumbers = "2 People";
                    $(".overlay-ajax").fadeOut(100);
                }).
                error(function(data, status) {
                    $scope.msg = data.message;
                    $(".overlay-ajax").fadeOut(100);
                });
        });
    };


    // login
    $scope.user_id = 0;
    $scope.login = {};
    $scope.vlogin = true;
    $scope.vreserve = false;

    $scope.getLogin = function(callback) {
        $http({method: "GET", url: 'ajax/login'}).
            success(function(data, status) {
                $scope.message = data.message;
                $scope.user_id = data.user_id;
                callback(status);
            }).
            error(function(data, status) {
                $scope.message = data.message;
                $scope.user_id = data.user_id;
                callback(status);
            });
    };

    $scope.getIndex = function() {
        $(".overlay-ajax").fadeIn(200, function() {
            $scope.getLogin(function(status) {
                if (status == 401) {
                    $scope.vlogin = true;
                    $scope.vreserve = false;
                    $(".overlay-ajax").fadeOut(100);
                } else if (status == 200) {
                    $scope.vlogin = false;
                    $scope.vreserve = true;
                    $(".overlay-ajax").fadeOut(100);
                }
            });
        });
    };

    $scope.postLogin = function() {
        $http({method: "POST", url: 'ajax/login', data: $scope.login}).
            success(function(data, status) {
                $scope.message = data.message;
                $scope.user_id = data.user_id;
                $scope.login = {};
                $scope.getIndex();
            }).
            error(function(data, status) {
                $scope.message = data.message;
            });
    };

    $scope.getLogout = function() {
        $http({method: "GET", url: 'ajax/logout'}).
            success(function(data, status) {
                $scope.message = data.message;
                $scope.user_id = 0;
                // $location.path('/');
                $scope.getIndex();
                console.log($scope.message);
            }).
            error(function(data, status) {
                $scope.message = 'Fail';
            });
    };

    $scope.getIndex();
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
        .when('/reserve', {
            templateUrl : 'template/reserve.html',
            controller  : 'ReserveController'
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