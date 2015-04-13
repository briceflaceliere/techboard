teckboard.service('BoardManager', ['Restangular', '$q', function(Restangular, $q) {
    var that = this;
    that.api = Restangular.service('boards');

    that.get = function(id) {
        return that.api.one(id).get();
    };


    var boardDefer = [];
    that.changeWidgetsPosition = function(board) {
        var widgetPosition = {};
        $.each(board.widgets, function() {
            widgetPosition[this.id] = ({position_x: this.position_x,
                                        position_y: this.position_y,
                                        width: this.width,
                                        height: this.height });
        });

        if (boardDefer[board.id] != undefined) {
            boardDefer[board.id].resolve();
            delete boardDefer[board.id];
        }
        boardDefer[board.id] = $q.defer();
        return that.api.one(board.id).withHttpConfig({timeout: boardDefer[board.id].promise}).customPUT({widgets : widgetPosition}, "widgets/positions");
    };

}]);