/**
 * Side bar controller
 */
teckboard.controller('mainSideBarCtrl', ['$scope',
    function ($scope) {
        $scope.accounts = [{
            active : true,
            name : 'Flaceliere Brice',
            picture : null,
            boards : [
                { name : 'Board 1', active : true },
                { name : 'Board 2', active : false }
            ]
        },
        {
            active : false,
            name : 'Ecolutis',
            picture : null,
            boards : [
                { name : 'Board 3' }
            ]
        }];
    }
]);
