
define("View/Solicitud",[
    'jquery',
    'mustache',
    'View/CarModel',
    //'text!Template/Solicitud/car-preview.html.mustache',
    ], function($,Mustache,CarModelView) {

        var selectCarModelUI  = $('select.view-event#solicitud-model');
        var selectCarBrandUI  = $("select.view-event#solicitud-brand");
        var textareaDetailsUI = $("textarea.view-event#solicitud-details");
        var selectZoneUI      = $('select.view-event#solicitud-zone');

        var inputNombreUI     = $('input.view-event#solicitud-nombre');
        var inputApellidoUI   = $('input.view-event#solicitud-apellido');
        var inputEMailUI      = $('input.view-event#solicitud-email');
        var inputTelefonoUI   = $('input.view-event#solicitud-telefono');


        function SolicitudView(controller) {
            this._controller = controller;
            var self = this ;

            // setup view events
            $(function() {
                selectCarBrandUI.click(function() {
                    var id = $(this).val();
                    self._controller.brandSelectAction(id);
                });

                selectCarModelUI.click(function() {
                    var id = $(this).val();
                    self._controller.modelSelectAction(id);
                });

                textareaDetailsUI.change(function(){
                    var text = $(this).val();
                    self._controller.detailsChangeAction(text);
                });
            });
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
