teckboard.directive('ngWidget', function(WidgetManager) {
    return {
        restrict: 'E',
        scope: { widget : '=' },
        templateUrl: function(elem,attrs) {
            var variant = attrs.variant || 'default';
            return '/dashboards/template/widget.variant-' + variant
        },
        link: function(scope, element, attrs) {
            var boxBody = element.children('.grid-stack-item-content').children('.box-body');
            var iframe = boxBody.children('.widget-content').children('iframe');
            var error = boxBody.children('.widget-content').children('.error');

            var dimension = scope.widget.connector.dimension;

            if (dimension.minWidth != undefined) {
                element.attr('data-gs-min-width', dimension.minWidth);
            }
            if (dimension.maxWidth != undefined) {
                element.attr('data-gs-max-width', dimension.maxWidth);
            }
            if (dimension.minHeight != undefined) {
                element.attr('data-gs-min-height', dimension.minHeight);
            }
            if (dimension.maxHeight != undefined) {
                element.attr('data-gs-max-height', dimension.maxHeight);
            }

            boxBody.addClass('loading');

            var grid = element.parent('.grid-stack').data('gridstack');
            grid.add_widget(element, scope.widget.position_x, scope.widget.position_y, scope.widget.width, scope.widget.height, false);

            iframe.on('load', function(){
                var win =this.contentWindow;
                var doc = this.contentDocument ? this.contentDocument: win.document;

                var data = $(doc).find('body').data();

                if (data.status == 200) { //OK
                    //log widget
                    iframe.show();
                    error.hide();
                    boxBody.removeClass('loading');
                } else {
                    //log error ajax
                    error.show();
                    iframe.hide();
                    boxBody.removeClass('loading');

                    setTimeout(function(){
                        WidgetManager.getUrl(scope.widget.id).then(function(url) {
                            iframe.attr('src', url);
                        });
                    }, 1000 * 60 * 10); //reload 10 min
                }
            });

            element.find('.refresh').on('click', function(){
                boxBody.addClass('loading');

                WidgetManager.getUrl(scope.widget.id).then(function(url) {
                    iframe.attr('src', url);
                });

            });
        }
    };
});