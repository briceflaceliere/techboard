teckboard.service('MeManager', ['Restangular', 'UsersManager', function(Restangular, UsersManager) {
    var that = this;
    that.api = UsersManager.api;
    var me = null;


    that.getMe = function() {
        if (me == null) {
            me = that.api.one('me').get();
        }
        return me;
    }
}]);