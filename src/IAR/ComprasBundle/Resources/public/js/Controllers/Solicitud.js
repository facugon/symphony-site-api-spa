
define("Controller/Solicitud", 
    ['jquery','Service/Brand','View/Solicitud'],
    function($,BrandService,View) {

        function SolicitudController() {
            this._view = new View() ;
            this._brandService = new BrandService();

            var self = this ;
            // each time brand is updated from server query , the view should be updated
            this._brandService.addObserver(this,'queryOne',function(aBrand){
                self._view.updateBrand(aBrand);
            });
        }

        SolicitudController.prototype = {

            brandSelectAction : function(uiBrandSelect) {
                var id = $(uiBrandSelect).val();
                this._brandService.queryOne(id);
            }

        }

        return SolicitudController ;
    }
);
