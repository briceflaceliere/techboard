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
        console.log($scope.board.widgets[0].position_x, $scope.board.widgets[0].position_y, $scope.board.widgets[0].width, $scope.board.widgets[0].height);
    };
}])