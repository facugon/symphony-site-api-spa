
define("View/CarModel",[
	'jquery',
	'mustache',
	//'text!Template/Solicitud/car-preview.html.mustache',
	], function($,Mustache) {

		function CarModelView() {
		};

		CarModelView.prototype = {
			combo : function(ui,models) {
                ui.empty();
                $.each(models,function(){
                    var option = $('<option value="' + this.id + '">' + this.name + '</option>');
                    ui.append( option );
                })
			}
		}

		return CarModelView;
	}
);
