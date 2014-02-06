
define("Controller/Horario", [
    'jquery',
    'Model/Horario',
    'Model/Programa',
    'View/Horario'
    ], function($,Horario,Programa,View) {
        var self = {};
        var programa = new Programa();

        function getInput() {
            var input = {};
            $("div#horario-input form :input").each(
                function(){
                    var ui = $(this);
                    var name = ui.attr("name");
                    input[ name ] = ui.val();
                }
            );

            return input;
        }

        self.newItemAction = function(){
            var input = getInput();
            var horario = new Horario() ;

            horario.setProperties(input);
            var index = programa.addHorario(horario);
            horario.setIndex("horario_" + index);
            View.newItemRender(horario);
        };

        self.removeItemAction = function(id){
            programa.removeHorario(id);
            View.removeItemRender(id);
            console.log(programa.compact());
        };

        return self ;
    }
);
