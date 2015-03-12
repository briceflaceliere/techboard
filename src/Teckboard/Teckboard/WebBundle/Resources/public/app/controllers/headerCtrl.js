/**
 * Side bar controller
 */
teckboard.controller('headerCtrl', ['$scope', 'Users',
    function ($scope, Users) {

        Users.one('me').get().then(function(users){
            $scope.me = users;
        })

    }
]);
