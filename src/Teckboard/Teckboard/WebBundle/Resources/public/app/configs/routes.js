teckboard.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/board/:slug/:boardId', {
                templateUrl: '/dashboards/template/board.default',
                controller: 'boardCtrl',
                controllerAs: 'board'
            }).otherwise({
                redirectTo: defaultBoardUrl
            });

        $locationProvider.html5Mode(true);
    }]);