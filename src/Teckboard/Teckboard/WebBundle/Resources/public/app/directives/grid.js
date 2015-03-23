teckboard.directive('ngGrid', function() {
    return {
        restrict: 'E',
        transclude: true,
        scope: {},
        link: function(scope, element, attrs) {
            var options = {
                height: 80,
                margin: 10
            };
            $(element).gridstack(options);
        }
    };
});