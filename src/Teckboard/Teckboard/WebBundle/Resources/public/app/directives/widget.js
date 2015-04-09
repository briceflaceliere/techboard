teckboard.directive('ngWidget', function() {
    return {
        restrict: 'E',
        scope: { widget : '=' },
        templateUrl: function(elem,attrs) {
            var variant = attrs.variant || 'default';
            return '/dashboards/template/widget.variant-' + variant
        },
        link: function(scope, element, attrs) {


            $onResize =  function (event, ui) {
                    var grid = this;
                    var element = event.target;

                    var gridItem = $(element).children('.grid-stack-item-content');
                    var boxBody = gridItem.children('.box-body');
                    var boxHeaderHeight = gridItem.children('.box-header').outerHeight(true);
                    var widgetHeight = gridItem.innerHeight();


                    var iframeHeight = widgetHeight - boxHeaderHeight - 5;
                    boxBody.height(iframeHeight + 'px');
                    boxBody.children('iframe').height(iframeHeight + 'px');
            };

            /*element.on('resize', function (event, ui) {
                    $onResize(event, ui);
            });*/
            element.on('resizestop', function (event, ui) {
                window.setTimeout(function(){
                    $onResize(event, ui);
                }, 100);
            });


            var grid = $(element).parent('.grid-stack').data('gridstack');
            grid.add_widget(element, scope.widget.position_x, scope.widget.position_y, scope.widget.height, scope.widget.width, false);
            element.trigger('resizestop');
        }
    };
});