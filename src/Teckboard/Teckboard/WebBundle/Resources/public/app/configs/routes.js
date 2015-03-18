teckboard.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/dashboards', {
                template: '<p>HOME</p>'
            })
            .when('/dashboards/board/:slug/:boardId', {
                templateUrl: '/dashboards/template/board.default',
                controller: 'boardCtrl',
                controllerAs: 'board'
            }).otherwise({
                redirectTo: '/dashboards'
            });

        $locationProvider.html5Mode(true);
    }]);