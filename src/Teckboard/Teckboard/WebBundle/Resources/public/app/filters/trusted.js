/**
 * Created by brice on 08/04/15.
 */
teckboard.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);