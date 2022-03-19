<?php

require_once('../../Models/Conexion/Conexion.php');

	/**
	* 
	*/
	class Ota_Informe_LiquidosModel
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

		public function Agregar($IdServicio, $LEV, $Goteo, $Cantidad, $Inotropico, $Goteo2, $Cantidad2)
		{
			try {
				$sql = ("INSERT INTO Ota_Informe_Liquidos (IdServicio, LEV, Goteo, Cantidad, Inotropico, Goteo2, Cantidad2) VALUES (?, ?, ?, ?, ?, ?, ?)");
				$stm = $this->pdo->prepare($sql)->execute(array($IdServicio, $LEV, $Goteo, $Cantidad, $Inotropico, $Goteo2, $Cantidad2));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_Informe_LiquidosModel->Agregar()");
			}
		}

		public function ListarxIdServicio($IdServicio)
		{
			try
			{
				$Array = array();
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Informe_Liquidos WHERE IdServicio = ? ORDER BY IdConsecutivo");
				$stm->execute(array($IdServicio));

				foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
					$entity = new Ota_Informe_Liquidos();

					$entity->__SET('IdConsecutivo',$r->IdConsecutivo);
					$entity->__SET('IdServicio',$r->IdServicio);
					$entity->__SET('LEV',$r->LEV);
					$entity->__SET('Goteo',$r->Goteo);
					$entity->__SET('Cantidad',$r->Cantidad);
					$entity->__SET('Inotropico',$r->Inotropico);
					$entity->__SET('Goteo2',$r->Goteo2);
					$entity->__SET('Cantidad2',$r->Cantidad2);
					
					$Array[] = $entity;
				}
				return $Array;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_Informe_LiquidosModel->Listar()");
			}
		}
		
		public function Eliminar($IdConsecutivo) {
			try {
				$sql = $this->pdo->prepare("DELETE FROM Ota_Informe_Liquidos WHERE IdConsecutivo = ?");
				$stm = $sql->execute(array($IdConsecutivo));
				if ($stm) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." -> Ota_Informe_LiquidosModel->Eliminar()");
			}
		}
	}
	?>