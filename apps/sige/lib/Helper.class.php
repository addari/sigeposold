<?php

class Helpers
{

	public static function FormatearMonto ( $val ) {
		return number_format($val, 2, ',', '.');
	}

	public static function getFormatoFechaSQL ( $val ) {
		if($val == "") return "";
		list($dia,$mes,$anio ) = explode("/",$val);
		$fecha = $anio."-".$mes."-".$dia;
		return $fecha;
	}

}
