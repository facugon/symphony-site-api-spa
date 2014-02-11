
define("View/Solicitud",[
    'jquery',
    'mustache',
    'View/CarModel',
    //'text!Template/Solicitud/car-preview.html.mustache',
    ], function($,Mustache) {

        function SolicitudView() {
        };

        SolicitudView.prototype = {
            updateBrand : function(aBrand) {
                console.log(aBrand);
            }
        }

        return SolicitudView;
    }
);
