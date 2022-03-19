<?php 

	/**
		* Author:
		* Ing Alberto Rodriguez
	*
	**/
	class IPS
	{
		private $CodPrestador;
		private $Nit;
		private $TipoNit;
		private $NombreIPS;
		private $Direccion;
		private $Telefono;
		private $Departamento;
		private $Municipio;
		private $CodDpto;
		private $CodMpio;
		private $TipoNit2;
		private $IdEmpresa;
		private $IdSuc;

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