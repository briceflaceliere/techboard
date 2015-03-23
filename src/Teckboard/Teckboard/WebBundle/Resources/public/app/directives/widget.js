teckboard.directive('ngWidget', function() {
    return {
        require: '^ngGrid',
        restrict: 'E',
        scope: { widget : '=' },
        templateUrl: function(elem,attrs) {
            var variant = attrs.variant || 'default';
            return '/dashboards/template/widget.variant-' + variant
        },
        link: function(scope, element, attrs) {
            var grid = $(element).parent('#ng-grid').data('gridstack');
            grid.add_widget(element, 0, scope.widget.position, 3, 2, true);
        }
    };
});