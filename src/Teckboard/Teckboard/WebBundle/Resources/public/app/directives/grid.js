teckboard.directive('ngGrid', function() {
    return {
        restrict: 'C',
        transclude: true,
        scope: {},
        template: '<ng-transclude></ng-transclude>',
        link: function(scope, element, attrs) {
            var options = {
                height: 80,
                margin: 10
            };
            $(element).gridstack(options);
        }
    };
});