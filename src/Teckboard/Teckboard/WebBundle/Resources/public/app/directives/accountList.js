teckboard.directive('ngAccountList', function() {
    return {
        restrict: 'E',
        scope: { account : '=account' },
        templateUrl: function(elem,attrs) {
            var variant = attrs.variant || 'dafault';
            return 'template/account-list/variant-' + variant
        }
    };
});