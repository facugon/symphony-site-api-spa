
define("View/Horario",[
    'jquery',
    'mustache',
    'text!Template/Horario/row.html.mustache',
    'text!Template/Horario/table.html.mustache'
    ], function($, Mustache, rowTpl, tableTpl) {

        var self = {};

        var horariosContainer = $("div#horario-list div#horarios");

        self.newItemRender = function(horario){
            var table = horariosContainer.find("table").length;
            if( table == 0 ){
                var newTable = Mustache.render(tableTpl);
                horariosContainer.append(newTable);
            }

            var newRow = Mustache.render(rowTpl,horario.compact());
            horariosContainer.find("table tbody").append(newRow);
            horariosContainer.find("table").fadeIn();
        };
        
        self.removeItemRender = function(id){
            horariosContainer.find("table tr.horario#" + id).remove();
        }

        return {
            'newItemRender' : self.newItemRender,
            'removeItemRender' : self.removeItemRender,
        }
    }
);
