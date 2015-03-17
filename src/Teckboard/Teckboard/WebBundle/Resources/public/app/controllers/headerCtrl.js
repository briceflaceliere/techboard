/**
 * Side bar controller
 */
teckboard.controller('headerCtrl', ['$scope', 'MeManager',
    function ($scope, MeManager) {
        MeManager.getMe().then(function(me){
            $scope.me = me;
        });
    }
]);
