
define('iar/Service',
    ['jquery','iar/Model','iar/Server'],
    function($,Model,Server,Observable) {

        function Service (resource) {

            this._resource = resource;
            return this;
        }

        Service.prototype = Object.create( Observable.prototype ); // service also is observable
        Service.prototype = {
        }

        return Service;
    }
);
