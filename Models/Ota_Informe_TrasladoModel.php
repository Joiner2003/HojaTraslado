<?php

require_once('../../Models/Conexion/Conexion.php');

	/**
	* 
	*/
	class Ota_Informe_TrasladoModel
	{
		private $pdo;

		public function __CONSTRUCT()
		{
			try {
				$this->pdo = Conexion::Conectar();
			} catch(Exception $e) {
				die($e->getMessage());
			}
		}

		public function Agregar($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5,)
		{
			try {
				$sql = ("INSERT INTO Ota_Informe_Traslado (Fecha1, Fecha2, Pte_NumDoc, Pte_TipoDoc, Pte_FechaNac, Pte_Edad, Pte_Ap1, Pte_Ap2, PteNom1, Pte_Nom2, Aco_Nombres, Aco_Apellidos, Aco_Documento, Aco_Perentezco, Sv_Origen, Sv_Origen1, Sv_Origen2, Sv_Origen3, Sv_Llegada, Sv_Llegada1, Sv_Llegada2, Sv_Llegada3, Sv_Salida, Sv_Salida1, Sv_Salida2, Sv_Salida3, Sv_Complejidad, Sv_TipoServicio, Sv_ExamenSolicitado, Ef_Ta, Ef_Fr, Ef_Temp, Ef_Glasgow, Ef_Dx1, Ef_Dx2, Ef_HallazgoPos1, Ef_Antecedentes1, Ef_Gin1, Ef_Gin2, Ef_Gin3, Ef_Gin4, Ef_Gin5) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$stm = $this->pdo->prepare($sql)->execute(array($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_Informe_TrasladoModel->Agregar()");
			}
		}

		public function Modificar($IdServicio, $Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Sv_Firma_Pte2, $En_Firma2, $Sv_Firma_Entrega2, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5)
		{
			try {
				$sql = ("UPDATE Ota_Informe_Traslado SET Fecha1 = ?, Fecha2 = ?, Pte_NumDoc = ?, Pte_TipoDoc = ?, Pte_FechaNac = ?, Pte_Edad = ?, Pte_Ap1 = ?, Pte_Ap2 = ?, PteNom1 = ?, Pte_Nom2 = ?, Aco_Nombres = ?, Aco_Apellidos = ?, Aco_Documento = ?, Aco_Perentezco = ?, Sv_Origen = ?, Sv_Origen1 = ?, Sv_Origen2 = ?, Sv_Origen3 = ?, Sv_Llegada = ?, Sv_Llegada1 = ?, Sv_Llegada2 = ?, Sv_Llegada3 = ?, Sv_Salida = ?, Sv_Salida1 = ?, Sv_Salida2 = ?, Sv_Salida3 = ?, Sv_Complejidad = ?, Sv_TipoServicio = ?, Sv_ExamenSolicitado = ?, Sv_Firma_Pte2 = ?, En_Firma2 = ?, Sv_Firma_Entrega2 = ?, Ef_Ta = ?, Ef_Fr = ?, Ef_Temp = ?, Ef_Glasgow = ?, Ef_Dx1 = ?, Ef_Dx2 = ?, Ef_HallazgoPos1 = ?, Ef_Antecedentes1 = ?, Ef_Gin1 = ?, Ef_Gin2 = ?, Ef_Gin3 = ?, Ef_Gin4 = ?, Ef_Gin5 = ? WHERE IdServicio = ?");
				$stm = $this->pdo->prepare($sql)->execute(array($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Sv_Firma_Pte2, $En_Firma2, $Sv_Firma_Entrega2, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5, $IdServicio));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_Informe_TrasladoModel->Modificar()");
			}
		}

		public function Listar()
		{
			try
			{
				$Array = array();
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Informe_Traslado ORDER BY Fecha1 DESC");
				$stm->execute(array());

				foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
					$entity = new Ota_Informe_Traslado();

					$entity->__SET('IdServicio',$r->IdServicio);
					$entity->__SET('Fecha1',$r->Fecha1);
					$entity->__SET('Fecha2',$r->Fecha2);
					$entity->__SET('Pte_Ap1',$r->Pte_Ap1);
					$entity->__SET('Pte_Ap2',$r->Pte_Ap2);
					$entity->__SET('PteNom1',$r->PteNom1);
					$entity->__SET('Pte_Nom2',$r->Pte_Nom2);
					$entity->__SET('Pte_TipoDoc',$r->Pte_TipoDoc);
					$entity->__SET('Pte_NumDoc',$r->Pte_NumDoc);
					$entity->__SET('Pte_FechaNac',$r->Pte_FechaNac);
					$entity->__SET('Pte_Edad',$r->Pte_Edad);
					$entity->__SET('Pte_Regimen',$r->Pte_Regimen);
					$entity->__SET('Pte_Sexo',$r->Pte_Sexo);
					$entity->__SET('Pte_Direccion',$r->Pte_Direccion);
					$entity->__SET('Pte_Telefono',$r->Pte_Telefono);
					$entity->__SET('Aco_Nombres',$r->Aco_Nombres);
					$entity->__SET('Aco_Apellidos',$r->Aco_Apellidos);
					$entity->__SET('Aco_Documento',$r->Aco_Documento);
					$entity->__SET('Aco_Perentezco',$r->Aco_Perentezco);
					$entity->__SET('Sv_Origen',$r->Sv_Origen);
					$entity->__SET('Sv_Llegada',$r->Sv_Llegada);
					$entity->__SET('Sv_Salida',$r->Sv_Salida);
					$entity->__SET('Sv_Origen1',$r->Sv_Origen1);
					$entity->__SET('Sv_Llegada1',$r->Sv_Llegada1);
					$entity->__SET('Sv_Salida1',$r->Sv_Salida1);
					$entity->__SET('Sv_Origen2',$r->Sv_Origen2);
					$entity->__SET('Sv_Llegada2',$r->Sv_Llegada2);
					$entity->__SET('Sv_Salida2',$r->Sv_Salida2);
					$entity->__SET('Sv_Origen3',$r->Sv_Origen3);
					$entity->__SET('Sv_Llegada3',$r->Sv_Llegada3);
					$entity->__SET('Sv_Salida3',$r->Sv_Salida3);
					$entity->__SET('Sv_Complejidad',$r->Sv_Complejidad);
					$entity->__SET('Sv_TipoServicio',$r->Sv_TipoServicio);
					$entity->__SET('Sv_Medico',$r->Sv_Medico);
					$entity->__SET('Sv_ExamenSolicitado',$r->Sv_ExamenSolicitado);
					
					$entity->__SET('Ef_Ta',$r->Ef_Ta);
					$entity->__SET('Ef_Fr',$r->Ef_Fr);
					$entity->__SET('Ef_Temp',$r->Ef_Temp);
					$entity->__SET('Ef_Glasgow',$r->Ef_Glasgow);
					$entity->__SET('Ef_Dx1',$r->Ef_Dx1);
					$entity->__SET('Ef_Dx2',$r->Ef_Dx2);
					$entity->__SET('Ef_HallazgoPos1',$r->Ef_HallazgoPos1);
					$entity->__SET('Ef_Antecedentes1',$r->Ef_Antecedentes1);
					$entity->__SET('Ef_Gin1',$r->Ef_Gin1);
					$entity->__SET('Ef_Gin2',$r->Ef_Gin2);
					$entity->__SET('Ef_Gin3',$r->Ef_Gin3);
					$entity->__SET('Ef_Gin4',$r->Ef_Gin4);
					$entity->__SET('Ef_Gin5',$r->Ef_Gin5);
					$entity->__SET('Ef_Modo1',$r->Ef_Modo1);
					$entity->__SET('Ef_Modo2',$r->Ef_Modo2);
					$entity->__SET('Ef_Modo3',$r->Ef_Modo3);
					$entity->__SET('Ef_Modo4',$r->Ef_Modo4);
					$entity->__SET('Ef_Modo5',$r->Ef_Modo5);
					$entity->__SET('Ef_Modo6',$r->Ef_Modo6);
					$entity->__SET('Ef_Observaciones',$r->Ef_Observaciones);
					$entity->__SET('En_Estado',$r->En_Estado);
					$entity->__SET('En_Observaciones',$r->En_Observaciones);
					$entity->__SET('En_RecibeNombre',$r->En_RecibeNombre);
					$entity->__SET('Tp_Paramedico',$r->Tp_Paramedico);
					$entity->__SET('Tp_Comandante',$r->Tp_Comandante);
					$entity->__SET('Tp_Medico',$r->Tp_Medico);
					
					$Array[] = $entity;
				}
				return $Array;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_Informe_TrasladoModel->Listar()");
			}
		}

		public function Ver($IdServicio)
		{
			try{
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Informe_Traslado WHERE IdServicio = ?");
				$stm->execute(array($IdServicio));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				if ($r) {
					$entity = new Ota_Informe_Traslado();

					$entity->__SET('IdServicio',$r->IdServicio);
					$entity->__SET('Fecha1',$r->Fecha1);
				//	$entity->__SET('Fecha1Hora',$r->Fecha1Hora);
					$entity->__SET('Fecha2',$r->Fecha2);
				//	$entity->__SET('Fecha2Hora',$r->Fecha2Hora);
					$entity->__SET('Pte_Ap1',$r->Pte_Ap1);
					$entity->__SET('Pte_Ap2',$r->Pte_Ap2);
					$entity->__SET('PteNom1',$r->PteNom1);
					$entity->__SET('Pte_Nom2',$r->Pte_Nom2);
					$entity->__SET('Pte_TipoDoc',$r->Pte_TipoDoc);
					$entity->__SET('Pte_NumDoc',$r->Pte_NumDoc);
					$entity->__SET('Pte_FechaNac',$r->Pte_FechaNac);
					$entity->__SET('Pte_Edad',$r->Pte_Edad);
					$entity->__SET('Pte_Regimen',$r->Pte_Regimen);
					$entity->__SET('Pte_Sexo',$r->Pte_Sexo);
					$entity->__SET('Pte_Direccion',$r->Pte_Direccion);
					$entity->__SET('Pte_Telefono',$r->Pte_Telefono);
					$entity->__SET('Aco_Nombres',$r->Aco_Nombres);
					$entity->__SET('Aco_Apellidos',$r->Aco_Apellidos);
					$entity->__SET('Aco_Documento',$r->Aco_Documento);
					$entity->__SET('Aco_Perentezco',$r->Aco_Perentezco);
					$entity->__SET('Sv_Origen',$r->Sv_Origen);
					$entity->__SET('Sv_Llegada',$r->Sv_Llegada);
					$entity->__SET('Sv_Salida',$r->Sv_Salida);
					$entity->__SET('Sv_Origen1',$r->Sv_Origen1);
					$entity->__SET('Sv_Llegada1',$r->Sv_Llegada1);
					$entity->__SET('Sv_Salida1',$r->Sv_Salida1);
					$entity->__SET('Sv_Origen2',$r->Sv_Origen2);
					$entity->__SET('Sv_Llegada2',$r->Sv_Llegada2);
					$entity->__SET('Sv_Salida2',$r->Sv_Salida2);
					$entity->__SET('Sv_Origen3',$r->Sv_Origen3);
					$entity->__SET('Sv_Llegada3',$r->Sv_Llegada3);
					$entity->__SET('Sv_Salida3',$r->Sv_Salida3);
					$entity->__SET('Sv_Complejidad',$r->Sv_Complejidad);
					$entity->__SET('Sv_TipoServicio',$r->Sv_TipoServicio);
					$entity->__SET('Sv_Medico',$r->Sv_Medico);
					$entity->__SET('Sv_ExamenSolicitado',$r->Sv_ExamenSolicitado);
					
					$entity->__SET('Ef_Ta',$r->Ef_Ta);
					$entity->__SET('Ef_Fr',$r->Ef_Fr);
					$entity->__SET('Ef_Temp',$r->Ef_Temp);
					$entity->__SET('Ef_Glasgow',$r->Ef_Glasgow);
					$entity->__SET('Ef_Dx1',$r->Ef_Dx1);
					$entity->__SET('Ef_Dx2',$r->Ef_Dx2);
					$entity->__SET('Ef_HallazgoPos1',$r->Ef_HallazgoPos1);
					$entity->__SET('Ef_Antecedentes1',$r->Ef_Antecedentes1);
					$entity->__SET('Ef_Gin1',$r->Ef_Gin1);
					$entity->__SET('Ef_Gin2',$r->Ef_Gin2);
					$entity->__SET('Ef_Gin3',$r->Ef_Gin3);
					$entity->__SET('Ef_Gin4',$r->Ef_Gin4);
					$entity->__SET('Ef_Gin5',$r->Ef_Gin5);
					$entity->__SET('Ef_Modo1',$r->Ef_Modo1);
					$entity->__SET('Ef_Modo2',$r->Ef_Modo2);
					$entity->__SET('Ef_Modo3',$r->Ef_Modo3);
					$entity->__SET('Ef_Modo4',$r->Ef_Modo4);
					$entity->__SET('Ef_Modo5',$r->Ef_Modo5);
					$entity->__SET('Ef_Modo6',$r->Ef_Modo6);
					$entity->__SET('Ef_Observaciones',$r->Ef_Observaciones);
					$entity->__SET('En_Estado',$r->En_Estado);
					$entity->__SET('En_Observaciones',$r->En_Observaciones);
					$entity->__SET('En_RecibeNombre',$r->En_RecibeNombre);
					$entity->__SET('Firma1',$r->Firma1);
					$entity->__SET('Firma2',$r->Firma2);
					$entity->__SET('Tp_Paramedico',$r->Tp_Paramedico);
					$entity->__SET('Tp_Comandante',$r->Tp_Comandante);
					$entity->__SET('Tp_Medico',$r->Tp_Medico);
					$entity->__SET('Estado_ft',$r->Estado_ft);
					$entity->__SET('Obs_entrega',$r->Obs_entrega);
					return $entity;

				}
				return NULL;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_Informe_TrasladoModel->Ver()");
			}
		}

		public function Maximo()
		{
			try
			{
				$stm = $this->pdo->prepare("SELECT MAX(IdServicio) AS IdServicio FROM Ota_Informe_Traslado");
				$stm->execute(array());
				$r = $stm->fetch(PDO::FETCH_OBJ);

				if ($r) {
					$entity = new Ota_Informe_Traslado();

					$entity->__SET('IdServicio', $r->IdServicio);
					return $entity;
				}
				return NULL;
			}catch(Exception $e)
			{
				die($e->getMessage()." -> Ota_Informe_TrasladoModel->Maximo()");
			}
		}
		public function AgregarEstPac($IdServicio, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5, $Estado_ft, $Obs_entrega ){
			try {
				$sql = ("UPDATE Ota_Informe_Traslado SET Ef_Ta = ?, Ef_Fr = ?, Ef_Temp= ?, Ef_Glasgow = ?, Ef_Dx1 = ?, Ef_Dx2 = ?, Ef_HallazgoPos1 = ?, Ef_Antecedentes1 = ?, Ef_Gin1 = ?, Ef_Gin2 = ?, Ef_Gin3 = ?, Ef_Gin4 = ?, Ef_Gin5 = ?, Estado_ft = ?, Obs_entrega = ? WHERE IdServicio = ?");
				$stm = $this->pdo->prepare($sql)->execute(array($Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5, $Estado_ft, $Obs_entrega,$IdServicio ));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_Informe_TrasladoModel->Modificar()");
			} 
		}
		// public function Eliminar($IdFormapago) {
		// 	try {
		// 		$sql = $this->pdo->prepare("DELETE FROM Ota_Informe_Traslado WHERE IdFormapago = ?");
		// 		$stm = $sql->execute(array($IdFormapago));
		// 		if ($stm) {
		// 			return true;
		// 		} else {
		// 			return false;
		// 		}
		// 	} catch (Exception $e) {
		// 		die($e->getMessage()." -> Ota_Informe_TrasladoModel->Eliminar()");

		// 	}
		// }
	}
	?>