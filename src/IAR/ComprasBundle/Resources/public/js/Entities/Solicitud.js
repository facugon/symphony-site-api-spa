
define("Model/Solicitud", [], function() {
    var Solicitud = function() {
        var brand = null;
        var model = null;

        this.getBrand = function() {
            return brand;
        }

        this.getModel = function() {
            return model;
        }

        this.setBrand = function(id) {
            brand = id;
            return this;
        }

        this.setModel = function(id) {
            model = id;
            return this;
        }

        this.compact = function(){
            var compact = new Array();
            return compact;
        }
    };

    return Solicitud ;
});
