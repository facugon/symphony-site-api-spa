
define("Service/Model", ['iar/Service','Entity/Model'],
    function(Service, ModelEntity) {

        function ModelService() {
            Service.call(this);
            this._resource = '/model/';
            return this;
        };

        ModelService.prototype.queryOne = function(id) {
            var self = this;

            this.queryOneServer(id,function(r){
                var model = new ModelEntity(id,r.model);
                self.notifyObservers("queryOne",model);
            });
        };

        ModelService.prototype = _.extend({}, Service.prototype, ModelService.prototype); // merge behaviour
        return ModelService;
    }
);
