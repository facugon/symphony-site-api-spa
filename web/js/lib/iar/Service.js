
define("iar/Service", ['underscore','iar/Server','iar/Observable'],
    function(_, Server, Observable) {

        function Service() {
            Observable.call(this);
            this._resource = null;
            return this;
        };

        Service.prototype = {
            getResource : function() {
                return this._resource;
            },
            queryOneServer : function(id,callback) {
                Server.get(this._resource + id, {}, callback);
            }
        };

        Service.prototype = _.extend({}, Observable.prototype, Service.prototype);
        return Service
    }
);
