App.Helpers.Mensaje = function(opt){
	var output  = "",
		opt     = opt || {},
		mensaje = opt.mensaje || "",
		tipo    = opt.tipo    || "";

	if( tipo == "success_true"){
		output = "<div class=\"alert alert-success\">" +
              	 	"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>" +
              	 	"<strong>Información! </strong> " + mensaje + "" +
            	 "</div>";
	}else if( tipo == "error"){
		output = "<div class=\"alert alert-error\">" +
              	 	"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>" +
              	 	"<strong>Error! </strong> " + mensaje + "" +
            	 "</div>";
	}else if( tipo == "informacion"){
		output = "<div class=\"alert alert-info\">" +
              	 	"<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>" +
              	 	"<strong>Error! </strong> " + mensaje + "" +
            	 "</div>";
	}
	return output;
}

App.Helpers.MensajeNotificacion = function(opt){
	var selector = opt.selector || "#mensaje-notificacion";
	$(selector).html( App.Helpers.Mensaje( opt ) );
}


App.Helpers.RedondearNumero = function( valor ){
	return valor.toFixed(2);
}

App.Helpers.FormatearNumero = function( moneda ){
	return accounting.formatNumber(moneda,2,'.',',');
}

App.Helpers.getFechaByTimeTamp = function( feTimeTamp ){
 	var sFecha = moment(feTimeTamp).format( App.Param.FormatoFecha );
	return sFecha
}