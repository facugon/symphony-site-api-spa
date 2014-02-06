
define("Model/Programa", ['jquery'],
    function($) {
        var Programa = function(){
            var horarios = new Array();

            this.getHorarios = function(){
                return horarios;
            }

            this.addHorario = function(horario){
                var index = horarios.push(horario) - 1;
                return index;
            }

            this.removeHorario = function(id){
                var index = id.split("_")[1];
                var item = horarios[index];
                horarios[index] = null;
                return item;
            }

            this.compact = function(){
                var compact = new Array();
                $.each(horarios,function(i,v){
                    if( v != null )
                        compact.push( horarios[i].compact() );
                });
                return compact;
            }
        }

        return Programa ;
    }
);
