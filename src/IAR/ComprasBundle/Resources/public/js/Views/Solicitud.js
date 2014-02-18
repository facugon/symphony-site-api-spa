
define("View/Solicitud",[
    'jquery',
    'alertify',
    'mustache',
    'View/CarModel',
    'Entity/Solicitud',
    //'text!Template/Solicitud/car-preview.html.mustache',
    'jvalidate'
    ], function($, Alertify, Mustache, CarModelView, SolicitudEntity) {

        // solicitud form elements events
        var selectCarModelUI  = $('div.form-container select.view-event#solicitud-model');
        var selectCarBrandUI  = $('div.form-container select.view-event#solicitud-brand');
        var textareaDetailsUI = $('div.form-container textarea.view-event#solicitud-details');
        var selectZoneUI      = $('div.form-container select.view-event#solicitud-zone');
        var inputNombreUI     = $('div.form-container input.view-event#solicitud-nombre');
        var inputApellidoUI   = $('div.form-container input.view-event#solicitud-apellido');
        var inputEMailUI      = $('div.form-container input.view-event#solicitud-email');
        var inputTelefonoUI   = $('div.form-container input.view-event#solicitud-telefono');
        var buttonSubmit      = $('div.form-container button.view-event#solicitud-submit');

        function SolicitudView(controller)
        {
            this._controller = controller;
            this._solicitud = new SolicitudEntity();

            var self = this ;

            // setup view events
            $(function() {

                buttonSubmit.click(function(event){
                    event.preventDefault(); // use jQuery Validate, not the built-in browser HTML5 validations

                    var validator = $("div.form-container form").validate();

                    if( validator.form() ) {
                        self._controller.submitAction({ 'solicitud' : self._solicitud.getAttributes() });
                    }
                });

                selectCarBrandUI.click(function(){
                    var brand = $(this).val();
                    if( brand != 0 ) { 
                        self._controller.brandSelectedAction( brand );
                    }
                });

                selectCarModelUI.click(function(){
                    var model = $(this).val() ;
                    if( model != 0 ) {
                        self._controller.modelSelectedAction( model );
                    }
                });

                textareaDetailsUI.change(function(){ self._solicitud.set('details',$(this).val()); });
                selectZoneUI.change(function(){ 
                    var zona = $(this).val();
                    if( zona != 0 ) { 
                        self._solicitud.set('zona',zona);
                    }
                });
                inputNombreUI.change(function(){ self._solicitud.set('nombre',$(this).val()); });
                inputApellidoUI.change(function(){ self._solicitud.set('apellido',$(this).val()); });
                inputEMailUI.change(function(){ self._solicitud.set('email',$(this).val()); });
                inputTelefonoUI.change(function(){ self._solicitud.set('telefono',$(this).val()); });
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
            },
            showSubmitResponse : function(response) {
                console.log(response);
                Alertify.alert('Gracias por confiar en Compremosjuntos! Pronto nos pondremos en contacto.',
                    function(){
                        window.location = '/' ;
                    }
                );
            }
        }

        return SolicitudView;
    }
);
