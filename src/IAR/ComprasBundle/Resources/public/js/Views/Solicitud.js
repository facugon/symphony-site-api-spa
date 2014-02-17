
define("View/Solicitud",[
    'jquery',
    'mustache',
    'View/CarModel',
    'Entity/Solicitud',
    //'text!Template/Solicitud/car-preview.html.mustache',
    ], function($, Mustache, CarModelView, SolicitudEntity) {

        // solicitud form elements events
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
            this._solicitud = new SolicitudEntity();

            var self = this ;

            // setup view events
            $(function() {
                selectCarBrandUI.click(function() {
                    var id = $(this).val();
                    self._controller.brandSelectedAction(id);
                });

                selectCarModelUI.click(function() {
                    var id = $(this).val();
                    self._controller.modelSelectedAction(id);
                });

                textareaDetailsUI.change(function(){
                    var text = $(this).val();
                    self._solicitud.set('details',text);
                });

                selectZoneUI.change(function(){
                    var zoneId = $(this).val();
                    self._solicitud.set('zone',zoneId);
                });

                inputNombreUI.change(function(){
                var nombre = $(this).val();
                    self._solicitud.set('nombre',nombre);
                });

                inputApellidoUI.change(function(){
                var apellido = $(this).val();
                    self._solicitud.set('apellido',apellido);
                });

                inputEMailUI.change(function(){
                var email = $(this).val();
                    self._solicitud.set('email',email);
                });

                inputTelefonoUI.change(function(){
                var telefono = $(this).val();
                    self._solicitud.set('telefono',telefono);
                });
            });
        };

        SolicitudView.prototype = {
            updateBrand : function(aBrand) {
                this._solicitud.set('brand',aBrand);

                var modelView = new CarModelView();
                modelView.combo( selectCarModelUI, aBrand.getModels() );
            },
            updateModel : function(aModel) {
                this._solicitud.set('model',aModel);
                // do something else on the view ?
            },
            renderSelectionPreview : function() {
                // nothing by now ...
            }
        }

        return SolicitudView;
    }
);
