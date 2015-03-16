/**
 * Side bar controller
 */
teckboard.controller('mainSideBarCtrl', ['$scope', 'MeManager', 'Restangular',
    function ($scope, MeManager, Restangular) {

        MeManager.getMe().then(function(me){
            $scope.me = me;
        });



    }
]);
