
define("Service/Brand",
    ['iar/Service','Entity/Brand'],
    function(Service, BrandEntity) {

        function BrandService() {
            Service.call(this);
            this._resource = '/api/brand/';
            return this;
        };

        BrandService.prototype = {
            queryOne : function(id) {
                var self = this;

                this.queryOneServer(id,function(r){
                    var brand = new BrandEntity(id,r.brand);
                    self.notifyObservers("queryOne",brand);
                });
            }
        };

        BrandService.prototype = _.extend({}, Service.prototype, BrandService.prototype); // the order is important , http://underscorejs.org/#extend
        return BrandService;
    }
);
