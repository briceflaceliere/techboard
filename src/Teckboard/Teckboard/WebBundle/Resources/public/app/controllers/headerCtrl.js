/**
 * Side bar controller
 */
teckboard.controller('headerCtrl', ['$scope', 'Users',
    function ($scope, Users) {
        Users.one('me').get().then(function(user) {
            console.log(user);
            $scope.me = user;
        });
    }
]);
