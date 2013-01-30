<?php

class Helpers
{

	public static function FormatearMonto( $val ){
		return number_format($val, 2, ',', '.');
	}

}
