/**
 * Side bar controller
 */
teckboard.controller('mainSideBarCtrl', ['$scope', 'Users', 'Restangular',
    function ($scope, Users, Restangular) {

        Users.one('me').get().then(function(user) {
             $scope.me = user;
        });


    }
]);
