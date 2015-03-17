teckboard.config(['$routeProvider', '$locationProvider',
    function($routeProvider, $locationProvider) {
        $routeProvider
            .when('/', {
                template: '<p>HOME</p>'
            })
            .when('/board/:slug/:boardId', {
                templateUrl: '/dashboards/template/board.default',
                controller: 'boardCtrl',
                controllerAs: 'board'
            }).otherwise({
                redirectTo: '/'
            });

        $locationProvider.html5Mode(true);
    }]);