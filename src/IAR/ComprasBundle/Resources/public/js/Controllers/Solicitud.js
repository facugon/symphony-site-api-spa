
define("Controller/Solicitud",
    ['jquery','View/Solicitud','Entity/Solicitud','Service/Brand','Service/Model'],
    function($,View,SolicitudEntity,BrandService,ModelService) {
         /**
          * CONSTRUCTOR | SETUP
          */
        function SolicitudController() {
            this._view = new View() ;
            this._solicitud = new SolicitudEntity();

            this._brandService = new BrandService();
            this._modelService = new ModelService();

            var self = this ;

            // each time a service query the server, do as follow
            this._brandService.addObserver(this,'queryOne',function(aBrand){
                self._solicitud.setBrand(aBrand);
                self._view.renderBrand(aBrand);
            });

            this._modelService.addObserver(this,'queryOne',function(aModel){
                self._solicitud.setModel(aModel);
                //self._view.renderBrand(aBrand);
            });
        }

        SolicitudController.prototype = {
            brandSelectAction : function(uiBrandSelect) {
                var id = $(uiBrandSelect).val();
                this._brandService.queryOne(id);
            },
            modelSelectAction : function(uiModelSelect) {
                var id = $(uiModelSelect).val();
                this._modelService.queryOne(id);
            }
        }

        return SolicitudController ;
    }
);
