
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
            queryOneServer : function(id, callback) {
            // if _resource is null validate
                Server.get(this._resource + id, {}, callback);
            },
            submitServer : function(data, callback) {
            // if _resource is null validate
                Server.post(this._resource, data, callback);
            }
        };

        Service.prototype = _.extend({}, Observable.prototype, Service.prototype);
        return Service
    }
);
