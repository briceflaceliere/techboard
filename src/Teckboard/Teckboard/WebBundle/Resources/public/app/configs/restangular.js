teckboard.config(function(RestangularProvider){
    // Set the base url for your API endpoints
    RestangularProvider.setBaseUrl("/api");
    RestangularProvider.setRequestSuffix('.json');
    RestangularProvider.setDefaultHttpFields({ cache: true });

    // Set an interceptor in order to parse the API response
    // when getting a list of resources
    /*RestangularProvider.setResponseInterceptor(function(data, operation, what) {
        if (operation == 'getList') {
            var resp =  data._embedded[what];
            resp._links = data._links;
            return resp
        }
        return data;
    });*/

    // Using self link for self reference resources
    RestangularProvider.setRestangularFields({
        selfLink: 'self.link'
    });
});
