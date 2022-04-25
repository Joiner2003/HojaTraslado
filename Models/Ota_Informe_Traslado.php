<?php 

	/**
		* Author:
		* Ing Alberto Rodriguez
	*
	**/
	class Ota_Informe_Traslado
	{
		private $IdServicio;
		private $Fecha1;
		private $Fecha1Hora;
		private $Ficha;
		private $Pte_Ap1;
		private $Pte_Ap2;
		private $PteNom1;
		private $Pte_Nom2;
		private $Pte_TipoDoc;
		private $Pte_NumDoc;
		private $Pte_FechaNac;
		private $Pte_Edad;
		private $Pte_Regimen;
		private $Pte_Sexo;
		private $Pte_Direccion;
		private $Pte_Telefono;
		private $Aco_Nombres;
		private $Aco_Apellidos;
		private $Aco_Documento;
		private $Aco_Perentezco;
		private $Sv_Origen;
		private $Sv_Llegada;
		private $Sv_Salida;
		private $Sv_Origen1;
		private $Sv_Llegada1;
		private $Sv_Salida1;
		private $Sv_Origen2;
		private $Sv_Llegada2;
		private $Sv_Salida2;
		private $Sv_Origen3;
		private $Sv_Llegada3;
		private $Sv_Salida3;
		private $Sv_Complejidad;
		private $Sv_TipoServicio;
		private $Sv_Medico;
		private $Sv_ExamenSolicitado;
		private $Ef_Ta;
		private $Ef_Fr;
		private $Ef_Temp;
		private $Ef_Glasgow;
		private $Ef_Dx1;
		private $Ef_Dx2;
		private $Ef_HallazgoPos1;
		private $Ef_Antecedentes1;
		private $Ef_Gin1;
		private $Ef_Gin2;
		private $Ef_Gin3;
		private $Ef_Gin4;
		private $Ef_Gin5;
		private $Ef_Modo1;
		private $Ef_Modo2;
		private $Ef_Modo3;
		private $Ef_Modo4;
		private $Ef_Modo5;
		private $Ef_Modo6;
		private $Ef_Observaciones;
		private $En_Estado;
		private $En_Observaciones;
		private $En_RecibeNombre;
		private $Tp_Paramedico;
		private $Tp_Comandante;
		private $Tp_Medico;
		private $Estado_ft;
		private $Obs_entrega;

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