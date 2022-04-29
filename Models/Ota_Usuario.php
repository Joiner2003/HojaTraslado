<?php 

	/**
		* Author:
		* Ing Alberto Rodriguez
	*
	**/
	class Ota_Usuario
	{
		private $IdUsuario;
		private $Us_Nom1;
		private $Us_Nom2;
		private $Us_Ape1;
		private $Us_Ape2;
		private $Registro;
		private $Usuario;
		private $Clave;
		private $Id_Rol;

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