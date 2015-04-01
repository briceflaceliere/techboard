teckboard.directive('ngWidget', function() {
    return {
        restrict: 'E',
        scope: { widget : '=' },
        templateUrl: function(elem,attrs) {
            var variant = attrs.variant || 'default';
            return '/dashboards/template/widget.variant-' + variant
        },
        link: function(scope, element, attrs) {
            var grid = $(element).parent('.grid-stack').data('gridstack');
            grid.add_widget(element, scope.widget.position_x, scope.widget.position_y, scope.widget.height, scope.widget.width, false);
        }
    };
});