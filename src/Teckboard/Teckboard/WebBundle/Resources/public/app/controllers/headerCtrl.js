/**
 * Side bar controller
 */
teckboard.controller('headerCtrl', ['$scope',
    function ($scope) {
        MeManager.getMe().then(function(me){
            $scope.me = me;
        });
    }
]);
