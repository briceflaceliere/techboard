teckboard.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/board/:slug/:boardId', {
                templateUrl: '/dashboards/template/board.default',
                controller: 'boardCtrl',
                controllerAs: 'board'
            }).otherwise({
                redirectTo: '/board/test/1'
            });
        $locationProvider.html5Mode(true);
    }])