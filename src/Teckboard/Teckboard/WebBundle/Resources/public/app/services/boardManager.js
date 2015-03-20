teckboard.service('BoardManager', ['Restangular', function(Restangular) {
    var that = this;
    that.api = Restangular.service('boards');

    that.get = function(id) {
        return that.api.one(id).get();
    }

}]);