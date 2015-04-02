teckboard.controller('boardCtrl', ['$scope', '$rootScope', '$routeParams', 'BoardManager',  function($scope, $rootScope, $routeParams,BoardManager) {
    BoardManager.get($routeParams.boardId).then(function(board){
        $scope.board = board;

        $rootScope.page = {
            title: $scope.board.name,
            subTitle: $scope.board.account.name,
            picture: $scope.board.account.picture
            };
    });


    $scope.changeWidgetPosition = function() {
        BoardManager.changeWidgetPosition($scope.board);
    };

}])