<?php 

	/**
		* Author:
		* Ing Alberto Rodriguez
	*
	**/
	class Ota_Paciente
	{
		private $Id;
		private $Documento;
		private $TipoDoc;
		private $Nombre1;
		private $Nombre2;
		private $Apellido1;
		private $Apellido2;
		private $Estado;
		private $Historia;
		private $FNac;
		private $Sexo;
		private $Direccion;
		private $Tel;
		private $Regimen;
		private $TipoAfiliado;
		private $Estrato;
		private $CDpto;
		private $CCiudad;
		private $Zona;
		private $GrupoPoblacion;
		

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