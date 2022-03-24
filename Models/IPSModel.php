<?php

require_once('../../Models/Conexion/Conexion.php');

	/**
	* 
	*/
	class IPSModel
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

		public function Ver()
		{
			try{
				$stm = $this->pdo->prepare("SELECT * FROM IPS");
				$stm->execute(array());
				$r = $stm->fetch(PDO::FETCH_OBJ);

				if ($r) {
					$entity = new IPS();

					$entity->__SET('CodPrestador',$r->CodPrestador);
					$entity->__SET('Nit',$r->Nit);
					$entity->__SET('TipoNit',$r->TipoNit);
					$entity->__SET('NombreIPS',$r->NombreIPS);
					$entity->__SET('Direccion',$r->Direccion);
					$entity->__SET('Telefono',$r->Telefono);
					$entity->__SET('Departamento',$r->Departamento);
					$entity->__SET('Municipio',$r->Municipio);
					$entity->__SET('CodDpto',$r->CodDpto);
					$entity->__SET('CodMpio',$r->CodMpio);
					$entity->__SET('TipoNit2',$r->TipoNit2);
					$entity->__SET('IdEmpresa',$r->IdEmpresa);
				//	$entity->__SET('IdEmpresa',$r->IdEmpresa);
					return $entity;

				}
				return NULL;
			}catch(Exception $e){
				die($e->getMessage()." ->IPSModel->Ver()");
			}
		}
	}
	?>