/**
 * Main loader controller
 */
teckboard.controller('mainLoaderCtrl', ['$scope', '$rootScope',
    function ($scope, $rootScope) {
        $rootScope.loading = true;

        $rootScope.$on('cfpLoadingBar:completed', function(event, args){
            $rootScope.loading = false;
        })
    }
]);
