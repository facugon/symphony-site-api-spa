var view ;

define("Controller/Solicitud", [
        'jquery',
        'View/Solicitud',
        'Service/Solicitud',
        'Service/Brand',
        'Service/Model'
    ], function($, SolicitudView, SolicitudService, BrandService, ModelService) {
         /**
          * CONSTRUCTOR|SETUP
          */
        function SolicitudController()
        {
            this._view = new SolicitudView(this);
			view = this._view;

            this._brandService = new BrandService();
            this._modelService = new ModelService();
            this._solicitudService = new SolicitudService();

            var self = this ;

            // each time a service query the server, do something
            // the controller observe the services so it can update view
            this._brandService.addObserver(this,'queryOne',function(aBrand){
                self._view.updateBrand(aBrand);
            });

            this._modelService.addObserver(this,'queryOne',function(aModel){
                // do something else after model updated?
				self._view.updateModel(aModel);
            });

            this._solicitudService.addObserver(this,'create',function(response){
                // do something with the submit response?
                self._view.showSubmitResponse(response);
            });
        }

        SolicitudController.prototype = {
            brandSelectedAction : function(brandId) {
                this._brandService.queryOne(brandId);
            },
            modelSelectedAction : function(modelId) {
                this._modelService.queryOne(modelId);
            },
            submitAction : function( solicitud ) { // llega por parametro una entidad solicitud
                this._solicitudService.create( solicitud );
            }
        }

        return SolicitudController ;
    }
);
