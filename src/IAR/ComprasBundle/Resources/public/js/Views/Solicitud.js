
define("View/Solicitud",[
    'jquery',
    'mustache',
    'View/CarModel',
    //'text!Template/Solicitud/car-preview.html.mustache',
    ], function($,Mustache,CarModelView) {

        var selectCarModelUI = $('select.controller-action#solicitud-model');

        function SolicitudView() {
        };

        SolicitudView.prototype = {
            renderBrand : function(aBrand) {
                var modelView = new CarModelView();
                modelView.combo( selectCarModelUI, aBrand.getModels() );
            },
            renderSelectionPreview : function() {
                // nothing by now ...
            }
        }

        return SolicitudView;
    }
);
