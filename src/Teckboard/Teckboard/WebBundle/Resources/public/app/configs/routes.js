teckboard.config(['$routeProvider', '$locationProvider', '$compileProvider',
    function($routeProvider, $locationProvider, $compileProvider) {
        $routeProvider
            .when('/', {
                template: '<p>HOME</p>'
            })
            .when('/board/:boardId', {
                templateUrl: '/dashboards/template/board.default',
                controller: 'boardCtrl',
                controllerAs: 'board'
            })
            .when('/board/:slugName/:boardId', {
                templateUrl: '/dashboards/template/board.default',
                controller: 'boardCtrl',
                controllerAs: 'board'
            }).otherwise({
                redirectTo: '/'
            });

        $locationProvider.html5Mode(true);
        $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|chrome-extension):/);
    }]);