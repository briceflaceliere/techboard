/**
 * Created by brice on 08/04/15.
 */
teckboard.directive('ngIframe', [function(){
return {
    restrict: 'A',
    link: function(scope, element, attrs){

        element.on('error', function(){
            console.log('error');
        });
        element.on('load', function(){
            /*console.log('load');*/
            /* Set the dimensions here,
             I think that you were trying to do something like this: */
            /*var iFrameHeight = element[0].contentWindow.document.body.scrollHeight + 'px';
            element.css('height', iFrameHeight);
            console.log(iFrameHeight);*/
        })
    }
}}]);