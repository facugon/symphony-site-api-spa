
define("Service/Solicitud", ['iar/Service'], function(Service) {

    function SolicitudService() {
        Service.call(this);
        this._resource = '/api/solicitud/';
        return this;
    };

    SolicitudService.prototype = {
        create : function( solicitud )
        {
            var self = this;
            this.submitServer(solicitud,function(response){
                self.notifyObservers("create",response);
            });
        }
    };

    SolicitudService.prototype = _.extend({}, Service.prototype, SolicitudService.prototype); // the order is important , http://underscorejs.org/#extend

    return SolicitudService;
});
