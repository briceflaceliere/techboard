teckboard.service('UsersManager', ['Restangular', function(Restangular) {
    this.api = Restangular.service('users');
    var users = [];
}]);