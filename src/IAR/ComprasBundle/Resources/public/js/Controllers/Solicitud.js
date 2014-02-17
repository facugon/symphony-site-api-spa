var view ;

define("Controller/Solicitud", [
        'jquery',
        'View/Solicitud',
        'Service/Brand',
        'Service/Model'
    ], function($, SolicitudView, BrandService, ModelService) {
         /**
          * CONSTRUCTOR | SETUP
          */
        function SolicitudController()
        {
            this._view      = new SolicitudView(this);
			view = this._view;

            this._brandService = new BrandService();
            this._modelService = new ModelService();

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
        }

        SolicitudController.prototype = {
            brandSelectedAction : function(brandId) {
                this._brandService.queryOne(brandId);
            },
            modelSelectedAction : function(modelId) {
                this._modelService.queryOne(modelId);
            }
        }

        return SolicitudController ;
    }
);
