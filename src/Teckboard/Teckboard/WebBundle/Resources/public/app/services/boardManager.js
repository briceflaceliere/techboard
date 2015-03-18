teckboard.service('BoardManager', ['Restangular', function(Restangular) {
    var that = this;
    that.api = Restangular.service('board');
    var boards = [];


    that.get = function(id) {
        if (boards[id] === undefined) {
            boards[id] = that.api.one(id).get();
        }
        return boards[id];
    }

}]);