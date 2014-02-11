
define("Service/Brand",
    ['jquery','iar/Server','iar/Observable','Entity/Brand'],
    function($,Server,Observable,Brand) {

        function BrandService() {
            Observable.call(this);
            this._resource = '/brand/';
            return this;
        };

        BrandService.prototype = Object.create( Observable.prototype ) ;

        BrandService.prototype.getResource = function() {
            return this._resource;
        };

        BrandService.prototype.queryOneServer = function(id,callback) {
            Server.get(this._resource + id, {}, callback);
        };

        BrandService.prototype.queryOne = function(id) {
            var self = this;

            this.queryOneServer(id,function(r){
                var brand = new Brand(id,r.brand);
                self.notifyObservers("queryOne",brand);
            });
        };

        return BrandService; // return an object instance of Oservable-Service
    }
);
