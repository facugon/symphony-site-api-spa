
define("Controller/Solicitud",
    [
        'jquery',
        'View/Solicitud',
        'Entity/Solicitud',
        'Service/Brand',
        'Service/Model'
    ],
    function($, SolicitudView, SolicitudEntity, BrandService, ModelService) {
         /**
          * CONSTRUCTOR | SETUP
          */
        function SolicitudController()
        {
            this._view      = new SolicitudView(this);
            this._solicitud = new SolicitudEntity();

            this._brandService = new BrandService();
            this._modelService = new ModelService();

            var self = this ;

            // each time a service query the server, do something
            // the controller observe the services so it can update view
            this._brandService.addObserver(this,'queryOne',function(aBrand){
                self._solicitud.setBrand(aBrand);
                self._view.renderBrand(aBrand);
            });

            this._modelService.addObserver(this,'queryOne',function(aModel){
                self._solicitud.setModel(aModel);
                // do something else after model updated?
            });
        }

        SolicitudController.prototype = {
            brandSelectAction : function(brandId) {
                this._brandService.queryOne(brandId);
            },
            modelSelectAction : function(modelId) {
                this._modelService.queryOne(modelId);
            },
            detailsChangeAction : function(text) {
                this._solicitud.setDetails(text);
            }
        }

        return SolicitudController ;
    }
);
