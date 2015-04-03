teckboard.service('BoardManager', ['Restangular', function(Restangular) {
    var that = this;
    that.api = Restangular.service('boards');

    that.get = function(id) {
        return that.api.one(id).get();
    };

    that.changeWidgetPosition = function(board) {
        var widgetPosition = new Array();
        $.each(board.widgets, function() {
            widgetPosition.push({ id: this.id,
                                  position_x: this.position_x,
                                  position_y: this.position_y,
                                  width: this.width,
                                  height: this.height });
        });

        that.api.one(board.id).customPUT({boardWidgets : {widgets : widgetPosition}}, "widgets/positions");
    };
}]);