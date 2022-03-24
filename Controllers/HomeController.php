<?php 
spl_autoload_register(function($nombreClase)
{
	// require_once '../../Models/Entity/' .$nombreClase. '.php';
	require_once '../../Models/' .$nombreClase. '.php';
	// require_once '../../Models/COM.php';
});


	/**
		* Author:
		* Ing Joiner Escorcia y Juan Gómez
	*
	**/
	class HomeController
	{
		private $model;

		public function __CONSTRUCT() {
		}

		public function VerOta_Usuario($IdUsuario)
		{
			$model = new Ota_UsuarioModel();
			$var = $model->Ver($IdUsuario);
			return $var;
		}

		public function VerxUsuarioOta_Usuario($Usuario)
		{
			$model = new Ota_UsuarioModel();
			$var = $model->VerxUsuario($Usuario);
			return $var;
		}

		public function MaximoOta_Informe_Traslado()
		{
			$model = new Ota_Informe_TrasladoModel();
			$var = $model->Maximo();
			return $var;
		}

		public function ListarOta_Informe_Traslado()
		{
			$model = new Ota_Informe_TrasladoModel();
			$var = $model->Listar();
			return $var;
		}

		public function VerOta_Informe_Traslado($IdServicio)
		{
			$model = new Ota_Informe_TrasladoModel();
			$var = $model->Ver($IdServicio);
			return $var;
		}

		public function AgregarOta_Informe_Traslado($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5)
		{
			$model = new Ota_Informe_TrasladoModel();
			$var = $model->Agregar($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);
			return $var;
		}

		public function ModificarOta_Informe_Traslado($IdServicio, $Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Sv_Firma_Pte2, $En_Firma2, $Sv_Firma_Entrega2, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5)
		{
			$model = new Ota_Informe_TrasladoModel();
			$var = $model->Modificar($IdServicio, $Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Sv_Firma_Pte2, $En_Firma2, $Sv_Firma_Entrega2, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);
			return $var;
		}

		public function ListarxIdServicioOta_Informe_SignosVitales($IdServicio)
		{
			$model = new Ota_Informe_SignosVitalesModel();
			$var = $model->ListarxIdServicio($IdServicio);
			return $var;
		}

		public function AgregarOta_Informe_SignosVitales($IdServicio, $FechaHora, $TA, $FC, $FR, $Temp, $Glasgow, $SatO2)
		{
			$model = new Ota_Informe_SignosVitalesModel();
			$var = $model->Agregar($IdServicio, $FechaHora, $TA, $FC, $FR, $Temp, $Glasgow, $SatO2);
			return $var;
		}

		public function EliminarOta_Informe_SignosVitales($IdConsecutivo)
		{
			$model = new Ota_Informe_SignosVitalesModel();
			$var = $model->Eliminar($IdConsecutivo);
			return $var;
		}

		public function ListarxIdServicioOta_Informe_Liquidos($IdServicio)
		{
			$model = new Ota_Informe_LiquidosModel();
			$var = $model->ListarxIdServicio($IdServicio);
			return $var;
		}

		public function AgregarOta_Informe_Liquidos($IdServicio, $LEV, $Goteo, $Cantidad, $Inotropico, $Goteo2, $Cantidad2)
		{
			$model = new Ota_Informe_LiquidosModel();
			$var = $model->Agregar($IdServicio, $LEV, $Goteo, $Cantidad, $Inotropico, $Goteo2, $Cantidad2);
			return $var;
		}

		public function EliminarOta_Informe_Liquidos($IdConsecutivo)
		{
			$model = new Ota_Informe_LiquidosModel();
			$var = $model->Eliminar($IdConsecutivo);
			return $var;
		}

		public function VerIPS()
		{
			$model = new IPSModel();
			$var = $model->Ver();
			return $var;
		}
	}