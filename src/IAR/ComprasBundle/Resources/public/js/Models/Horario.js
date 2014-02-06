
define("Model/Horario", ['jquery','Model/HorarioPrecio'],
    function($,Precio) {

        var Horario = function() {
            var rangoHorarioContainer = 'wop_publiradiobundle_horario_rangoHorario' ;
            var recargoContainer      = 'wop_publiradiobundle_horario_recargo' ;

            var properties = {};
            var precio = new Precio() ;

            this.get = function(name){
                return properties[name];
            }

            this.getProperties = function(){
                return properties;
            }

            this.setIndex = function(index){
                properties.horario_index = index;
                return this;
            }

            this.setPrecio = function(p){
                precio = p;
            }

            this.setRangoHorario = function(){
                var input = $(':input[name="wop_publiradiobundle_horario[rangoHorario]"] :selected') ;
                var rango = {
                    id: input.val(),
                    name: input.text()
                } ;
                properties["wop_publiradiobundle_horario[rangoHorario]"] = rango ;
                return this;
            }

            this.setRecargo = function(){
                var input = $(':input[name="wop_publiradiobundle_horario[recargo]"] :selected') ;
                var recargo = {
                    id: input.val(),
                    name: input.text()
                } ;
                properties["wop_publiradiobundle_horario[recargo]"] = recargo ;
                return this;
            }

            this.setProperty = function(name,value){
                switch(name){
                    case "wop_publiradiobundle_horario[rangoHorario]":
                        this.setRangoHorario();
                        break;
                    case "wop_publiradiobundle_horario[recargo]":
                        this.setRecargo();
                        break;
                    case "wop_publiradiobundle_horarioprecio[alcanceNacional]":
                        precio.setAlcance("Nacional");
                        break;
                    case "wop_publiradiobundle_horarioprecio[precioNacional]":
                        precio.setPrecio("Nacional");
                        break;
                    case "wop_publiradiobundle_horarioprecio[alcanceComunidadAutonoma]":
                        precio.setAlcance("ComunidadAutonoma");
                        break;
                    case "wop_publiradiobundle_horarioprecio[precioComunidadAutonoma]":
                        precio.setPrecio("ComunidadAutonoma");
                        break;
                    case "wop_publiradiobundle_horarioprecio[alcanceProvincial]":
                        precio.setAlcance("Provincial");
                        break;
                    case "wop_publiradiobundle_horarioprecio[precioProvincial]":
                        precio.setPrecio("Provincial");
                        break;
                    case "wop_publiradiobundle_horarioprecio[alcanceLocal]":
                        precio.setAlcance("Local");
                        break;
                    case "wop_publiradiobundle_horarioprecio[precioLocal]":
                        precio.setPrecio("Local");
                        break;
                    default:
                        break;
                }
            }

            this.setProperties = function(input){
                for(var i in input){
                    this.setProperty(i,input[i]);
                }
                return this;
            }

            this.compact = function() {
                return $.extend({}, properties, precio.compact() ) ;
            }
        }

        return Horario ;
    }
);
