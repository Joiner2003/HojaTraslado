<?php 

	/**
		* Author:
		* Juan Gomez
		* Joiner Escorcia
	*
	**/
	class Ota_Usuario
	{
		private $IdUsuario;
		private $Us_Nom1;
		private $Us_Nom2;
		private $Us_Ape1;
		private $Us_Ape2;
		private $Documento;
		private $Usuario;
		private $Clave;
		private $Id_Rol;
		private $Tipo_U;
		


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