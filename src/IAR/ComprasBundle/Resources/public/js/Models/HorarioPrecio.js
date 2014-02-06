
define("Model/HorarioPrecio", ['jquery'],
	function($) {
        var HorarioPrecio = function() {
            var properties = { };

            this.get = function(name){
                return properties[name];
            }

            this.set = function(name,value){
                properties[name] = value;
                return this;
            }

            this.setAlcance = function(nombre){
                var value = $(':input[name="wop_publiradiobundle_horarioprecio[alcance' + nombre + ']"]').is(':checked') ;
                properties[ 'wop_publiradiobundle_horarioprecio[alcance' + nombre + ']' ] = value;
                return this;
            }

            this.setPrecio = function(nombre){
                var value = $(':input[name="wop_publiradiobundle_horarioprecio[precio' + nombre + ']"]').val() ;
                properties[ 'wop_publiradiobundle_horarioprecio[precio' + nombre + ']' ] = value;
                return this;
            }

            this.getProperties = function(){
                return properties;
            }

            this.compact = function(){
                return $.extend({}, properties );
            }
        }

        return HorarioPrecio ;
    }
);
