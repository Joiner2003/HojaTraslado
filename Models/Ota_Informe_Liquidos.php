<?php 

	/**
		* Author:
		* Ing Alberto Rodriguez
	*
	**/
	class Ota_Informe_Liquidos
	{
		private $IdConsecutivo;
		private $IdServicio;
		private $LEV;
		private $Goteo;
		private $Cantidad;
		private $Inotropico;
		private $Goteo2;
		private $Cantidad2;

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