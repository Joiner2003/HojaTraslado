<?php

require_once('../../Models/Conexion/Conexion.php');

	/**
	* 
	*/
	class Ota_Informe_SignosVitalesModel
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

		public function Agregar( $FechaHora, $TA, $FC, $FR, $Temp, $Glasgow, $SatO2)
		{
			try {
				$sql = ("INSERT INTO Ota_Informe_SignosVitales (FechaHora, TA, FC, FR, Temp, Glasgow, SatO2) VALUES (?, ?, ?, ?, ?, ?, ?)");
				$stm = $this->pdo->prepare($sql)->execute(array($FechaHora, $TA, $FC, $FR, $Temp, $Glasgow, $SatO2));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_Informe_SignosVitalesModel->Agregar()");
			}
		}

		public function ListarxIdServicio($IdServicio)
		{
			try
			{
				$Array = array();
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Informe_SignosVitales WHERE IdServicio = ? ORDER BY FechaHora ASC");
				$stm->execute(array($IdServicio));

				foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
					$entity = new Ota_Informe_SignosVitales();

					$entity->__SET('IdConsecutivo',$r->IdConsecutivo);
					$entity->__SET('IdServicio',$r->IdServicio);
					$entity->__SET('FechaHora',$r->FechaHora);
					$entity->__SET('TA',$r->TA);
					$entity->__SET('FC',$r->FC);
					$entity->__SET('FR',$r->FR);
					$entity->__SET('Temp',$r->Temp);
					$entity->__SET('Glasgow',$r->Glasgow);
					$entity->__SET('SatO2',$r->SatO2);
					
					$Array[] = $entity;
				}
				return $Array;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_Informe_SignosVitalesModel->Listar()");
			}
		}
		
		public function Eliminar($IdConsecutivo) {
			try {
				$sql = $this->pdo->prepare("DELETE FROM Ota_Informe_SignosVitales WHERE IdConsecutivo = ?");
				$stm = $sql->execute(array($IdConsecutivo));
				if ($stm) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." -> Ota_Informe_SignosVitalesModel->Eliminar()");
			}
		}
	}
	?>