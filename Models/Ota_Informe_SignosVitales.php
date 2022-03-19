<?php 

	/**
		* Author:
		* Ing Alberto Rodriguez
	*
	**/
	class Ota_Informe_SignosVitales
	{
		private $IdConsecutivo;
		private $IdServicio;
		private $FechaHora;
		private $TA;
		private $FC;
		private $FR;
		private $Temp;
		private $Glasgow;
		private $SatO2;

		public function __GET($k)
		{
			return $this->$k;
		}

		public function __SET($k,$v)
		{
			return $this->$k = $v;
		}
	}
	?>