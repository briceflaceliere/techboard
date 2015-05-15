teckboard.service('WidgetManager', ['Restangular', '$q', function(Restangular, $q) {
    var that = this;
    that.api = Restangular.service('widgets');

    that.getUrl = function(id) {
        return that.api.one(id).customGET('url');
    };

}]);