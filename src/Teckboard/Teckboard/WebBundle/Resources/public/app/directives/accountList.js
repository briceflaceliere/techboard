teckboard.directive('ngAccountList', function() {
    return {
        restrict: 'EC',
        scope: { account : '=account' },
        templateUrl: function(elem,attrs) {
            var variant = attrs.variant || 'default';
            return '/dashboards/template/account-list.variant-' + variant
        }
    };
});