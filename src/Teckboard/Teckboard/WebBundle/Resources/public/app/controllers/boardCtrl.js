teckboard.controller('boardCtrl', ['$scope', '$rootScope', '$routeParams', '$route', 'BoardManager',  function($scope, $rootScope, $routeParams, $route, BoardManager) {
    $rootScope.loadingContent = true;

    var loadBoard = function (boardId) {
        BoardManager.get(boardId).then(function (board) {
            $scope.board = board;

            $rootScope.page = {
                title: $scope.board.name,
                subTitle: $scope.board.account.name,
                picture: $scope.board.account.picture
            };

            $rootScope.loadingContent = false;
        });
    };
    loadBoard($routeParams.boardId);


    $scope.changeWidgetsPosition = function() {
        BoardManager.changeWidgetsPosition($scope.board).catch(function(error) {
            if (error.status != 0) {
                $route.reload();
            }
        });
    };

}])