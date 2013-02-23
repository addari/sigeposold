<?php
$items = array();

if( !$form->isNew() ){

foreach ( $factura->AdmTrDocsDetalleR  as $filas){
    $items[] = array(
      "id"              		=> $filas->getId(),
      "producto_id"     		=> $filas->getIdItems(),
      "descripcion"     		=> $filas->getDescripcion(),
      "cantidad"        		=> (int)$filas->getCantidad(),
      "precio"          		=> $filas->getPrecio(),
      "costo"          		    => $filas->getCosto(),
      "monto_impuesto"    		=> $filas->getMontoImpuesto(),
      "_porc_impuesto"			=> $filas->AdmMaItems->AdmMaTax->getPorcentaje(),
      "alias_impuesto"          => $filas->getAliasImpuesto()
      );
}
}
$renglones  = json_encode ( $items );

?>
<script type="text/javascript">

agregarItem = function(opt){
	var model = new App.Facturacion.Model.Items();

	model.set({
  	    producto_id          : opt.producto_id    || "",
		descripcion          : opt.descripcion    || "",
		cantidad             : opt.cantidad       || 1,
		precio               : opt.precio         || 0,
		costo                : opt.costo          || 0,
		alias_impuesto       : opt.impuesto       || "",
		monto_impuesto	     : opt.monto_impuesto || 0,
		_porc_impuesto	     : opt.porc_impuesto  || 0
	});	

	App.Facturacion.Collection.Items_Collection.add ( model );
	
};

buscarContacto = function () {
	esEventoLimpiarSeleccion = ($(".buscar-contacto").find("i").is(".icon-trash")) ? true : false;
	
	if( esEventoLimpiarSeleccion ) {
		$(".buscar-contacto").find("i").addClass("icon-search")
		$(".buscar-contacto").find("i").removeClass("icon-trash");
		$("#factura_id_contacto").val("");
		$("#factura_contacto").val("");
		$("#factura_exonerado").val("");
	}else{
		window.showModalDialog("<?= url_for('adm_ma_contact/buscarContactoFactura') ?>","", "dialogWidth:800px; dialogHeight:480px; center:yes");	
	}
}

agregarContacto = function( contacto ) {
	
    $("#factura_id_contacto").val(contacto.id_contacto);
    $("#factura_contacto").val(contacto.nombre);
    $("#factura_exonerado").val(contacto.exonerado);

	$(".buscar-contacto").removeClass("icon-search");
	$(".buscar-contacto").find("i").addClass("icon-trash");
	$(".mensaje").html("");
}


//Model de objeto ( items )
App.Facturacion.Model.Items = Backbone.Model.extend({
	defaults:{
		id  				 : null,
		producto_id          : "",
		descripcion          : "",
		cantidad             : 1,
		precio               : 0,
		monto_impuesto	     : 0,
		alias_impuesto       : "",
		//---- valores internos
		_porc_impuesto	     : 0,
		_total_renglon		 : 0
	}
});

//Collection de objetos ( items - model )
App.Facturacion.Collection.ItemsCollection = Backbone.Collection.extend({
	model: App.Facturacion.Model.Items
});

//Instancia de collection de objetos ( items )
App.Facturacion.Collection.Items_Collection = new App.Facturacion.Collection.ItemsCollection(<?= $renglones ?>);
App.Facturacion.Collection.ItemRemove_Collection = new App.Facturacion.Collection.ItemsCollection();

//view de filas de la tabla ( tr )
App.Facturacion.View.ContenedorBodyTabla = Backbone.View.extend({

	tagName: "tr",

	events:{
		"click a.eliminar" : "eliminarItem",
		"change input"     : "actualizarModel"
	},

	template: _.template($("#template-item").html()),

	initialize: function(){
	},
	
	eliminarItem: function(e){
		e.preventDefault();
		App.Facturacion.Collection.ItemRemove_Collection.add ( this.model );
		this.collection.remove(this.model);
	},

	actualizarModel: function(e){
		var input = $(e.target),
			params = {},
			tipo_campo = input.data("field");

		if ( tipo_campo == "entero" ){
			value = parseInt( input.val() );
		}else if ( tipo_campo == "flotante" ){
			value = parseFloat( input.val() );
		}else {
			value = input.val();
		}

		switch( input.attr("name") ){
			case "descripcion": 
				this.model.set("descripcion", value);
				break;
			case "cantidad": 
				if( _.isNaN(value) ){
					value = 1;
					input.val(value);
				}
				var total_renglon = this.model.get("precio") * value,
					params = {
						"cantidad": value,
						"_total_renglon": total_renglon
					};
				this.model.set(params);
				break;
			case "precio": 
				if( _.isNaN(value) ){
					value = 0;
					input.val(value);
				}
				var total_renglon = value * this.model.get("cantidad"),
					params = {
						"precio": value,
						"_total_renglon": total_renglon
					};
				this.model.set(params);
				break;		
		}
	},

	render: function(){

		var precio          = parseFloat(this.model.get("precio")), 
			cantidad 		= parseFloat(this.model.get("cantidad")),
			porc_impuesto	= parseFloat(this.model.get("_porc_impuesto")),
			total_renglon 	= monto_impuesto = 0,
			esExonerado = ( $("#factura_exonerado").val() == 1 ) ? true : false;


		precio   = ( _.isNaN(precio) ) ? 0 : precio;
		cantidad = ( _.isNaN(cantidad) ) ? 0 : cantidad;
		
		total_renglon = precio * cantidad;

		if ( esExonerado ){
			monto_impuesto = 0;
		}else{
			monto_impuesto = total_renglon * ( porc_impuesto / 100 );
		}

		this.model.set({
			_total_renglon: total_renglon,
			monto_impuesto: monto_impuesto
		},{silent:true});


		this.$el.html( this.template( this.model.toJSON() ) );
		return this;
	}

});

//view de tabla de items ( table )
App.Facturacion.View.ContenedorTabla = Backbone.View.extend({

	template: _.template($("#template-tabla").html()),

	initialize: function(){
		var that = this;
		this.collection.bind("add change remove",this.render, this);
	},

	_calcularTotales: function(){

		var totales = {},
			that = this,
			esExonerado = ( $("#factura_exonerado").val() == 1 ) ? true : false;

		_.extend(totales, {
			getSubTotal: function(){
				var sumSubTotal = 0;
				_.each( that.collection.models, function(model){
					var total_renglon = parseFloat(model.get("_total_renglon"));
					sumSubTotal += total_renglon;
				});
				return sumSubTotal.toFixed(2);
			},
			getImpuestos: function(){
				var sumImpuesto = 0;
				_.each( that.collection.models, function(model){ 
					var monto_impuesto = parseFloat(model.get("monto_impuesto"));
					if ( esExonerado ){
						sumImpuesto += 0;
					}else{
						sumImpuesto += monto_impuesto;
					}
				});
				return sumImpuesto;
			},
			getTotal: function(){
				var sumTotal = 0;
				_.each( that.collection.models, function(model){ 
					var total_renglon  = parseFloat(model.get("_total_renglon")),
						monto_impuesto  = parseFloat(model.get("monto_impuesto")),
						total = impuesto = 0;
					if ( esExonerado ){
						impuesto = 0;
					}else{
						impuesto = monto_impuesto;
					}
					total = total_renglon + impuesto;
					sumTotal += total;
				});
				return sumTotal;
			}		
		});
	
		this.$el.find("span.sub-total").text(App.Helpers.FormatearNumero(totales.getSubTotal()));
		this.$el.find("span.monto-impuestos").text(App.Helpers.FormatearNumero(totales.getImpuestos()));
		this.$el.find("span.monto-total").text( App.Helpers.FormatearNumero(totales.getTotal() ));

		$("#factura_items").val(JSON.stringify( App.Facturacion.Collection.Items_Collection ));
		$("#factura_remove_items").val(JSON.stringify( App.Facturacion.Collection.ItemRemove_Collection ));
		
	},
	render: function(){


		this.$el.html( this.template );

		//iterar items
		_.each( this.collection.models, function( model ){
			this.$el.find("table tbody").append ( new App.Facturacion.View.ContenedorBodyTabla({model: model, collection: this.collection }).render().el  )
		}, this);
		
		this._calcularTotales();

		return this;
	}
});

//view contenedor de tabla de items
App.Facturacion.View.ContenedorFactura = Backbone.View.extend({

	template: _.template($("#template-contenedor").html()),

	events:{
		"click .add-item": "showModalItems"
	},

	initialize: function(){},

	showModalItems: function(event){
		event.preventDefault();
			id_contacto = $("#factura_id_contacto").val();
			
		if ( _.str.isBlank(id_contacto) ) {
			App.Helpers.MensajeNotificacion ({ tipo: 'error', 
											   mensaje: "Debe seleccionar los datos del cliente.",
											   selector: '.mensaje' });
		}else{
			window.showModalDialog("<?= url_for('adm_ma_items/buscarItemFactura') ?>","", "dialogWidth:800px; dialogHeight:480px; center:yes");
		}
	},

	render: function(){
		var tabla_factura = new App.Facturacion.View.ContenedorTabla({collection: this.collection});
		this.$el.html( this.template );
		this.$el.find("#contenedor-tabla").html( tabla_factura.render().el );
		return this;
	}
});


$(function(){
	//Ejecución de funcionalidad de vista
	var contenedor_facturacion  = new App.Facturacion.View.ContenedorFactura({collection: App.Facturacion.Collection.Items_Collection});
	$("#contenedor-items").html( contenedor_facturacion.render().el );

	$("#factura_fecha_emision")
		.datepicker()
		.on('changeDate', function(ev){
			var fechaSeleccion = App.Helpers.getFechaByTimeTamp( ev.date.getTime() );

			$("#factura_fecha_vencimiento").val( fechaSeleccion );

			var sfechaFinal  = $("#factura_fecha_vencimiento").val(),
				fechaFinal   = new Date(moment(sfechaFinal, App.Param.FormatoFecha)).getTime();
				fechaInicio  = ev.date.valueOf();

			if ( fechaInicio > fechaFinal){
				App.Helpers.MensajeNotificacion ({ tipo: 'error', 
								   mensaje: "Rango de fecha invalido.",
								   selector: '.mensaje' });
			}else{
				$(".mensaje").html ("");
			}
	        $("#factura_fecha_emision").datepicker('hide');
    	});
	$("#factura_fecha_vencimiento")
		.datepicker()
		.on('changeDate', function(ev){
	    	var sfechaInicio  = $("#factura_fecha_emision").val(),
			fechaInicio   = new Date(moment(sfechaInicio, App.Param.FormatoFecha)).getTime();
			fechaFinal  = ev.date.valueOf(),

			App.Helpers.MensajeNotificacion ({ tipo: 'error', 
											   mensaje: "Rango de fecha invalido.",
											   selector: '.mensaje' });

        	if ( fechaFinal < fechaInicio ){
				App.Helpers.MensajeNotificacion ({ tipo: 'error', 
												   mensaje: "Rango de fecha invalido.",
												   selector: '.mensaje' });
			}else{
				$(".mensaje").html ("");
			}
	        $("#factura_fecha_vencimiento").datepicker('hide');
    });

	$("button[type='submit']").click(function(){
		var sfechaInicio  = $("#factura_fecha_emision").val(),
			fechaInicio   = new Date(moment(sfechaInicio, App.Param.FormatoFecha)).getTime(),
		    sfechaFinal  = $("#factura_fecha_vencimiento").val(),
		    fechaFinal   = new Date(moment(sfechaFinal, App.Param.FormatoFecha)).getTime(),
		    id_contacto = $("#factura_id_contacto").val();
			
		
		if ( _.str.isBlank(id_contacto) ) {
			App.Helpers.MensajeNotificacion ({ tipo: 'error', 
											   mensaje: "Debe seleccionar los datos del cliente.",
											   selector: '.mensaje' });
			return false;
		}else if ( fechaFinal < fechaInicio ){
			App.Helpers.MensajeNotificacion ({ tipo: 'error', 
											   mensaje: "Rango de fecha invalido.",
											   selector: '.mensaje' });
			return false;
		}else {
			$(".mensaje").html ("");
			return true;
		}		    		    
	});
  
});
</script>