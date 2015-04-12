teckboard.directive('ngGrid', function() {
    return {
        restrict: 'C',
        scope: { board : '='},
        template: '',
        link: function(scope, element, attrs) {
            var options = {
                height: 80,
                margin: 10,
                handle: '.grid-stack-item-header'
            };

            $(element).gridstack(options)
                    .on('change', function (e, items) {
                        $(items).each(function(item) {
                            this.el.find('.ng-loader').addClass('loading');

                            scope = angular.element(this.el).scope();
                            scope.widget.position_x = this.x;
                            scope.widget.position_y = this.y;
                            scope.widget.height = this.height;
                            scope.widget.width = this.width;
                            scope.$digest();
                        });
                        $(this).scope().changeWidgetsPosition();
                    });
        }
    };
});