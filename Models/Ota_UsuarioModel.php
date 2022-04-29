<?php

require_once('../../Models/Conexion/Conexion.php');

	/**
	* 
	*/
	class Ota_UsuarioModel
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
		public function Agregar($Us_Nom1, $Us_Nom2, $Us_Ape1, $Us_Ape2, $Registro, $Usuario, $Clave )
		{
			try {
				$sql = ("INSERT INTO Ota_Usuario (Us_Nom1, Us_Nom2, Us_Ape1, Us_Ape2, Registro, Usuario, Clave) VALUES (?, ?, ?, ?, ?, ?, ?)");
				$stm = $this->pdo->prepare($sql)->execute(array($Us_Nom1, $Us_Nom2, $Us_Ape1, $Us_Ape2, $Registro, $Usuario, $Clave));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_UsuarioModel->Agregar()");
			}
		}

		public function Ver($IdUsuario)
		{
			try{
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Usuario WHERE IdUsuario = ?");
				$stm->execute(array($IdUsuario));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				if ($r) {
					$entity = new Ota_Usuario();

					$entity->__SET('IdUsuario',$r->IdUsuario);
					$entity->__SET('Us_Nom1',$r->Us_Nom1);
					$entity->__SET('Us_Nom2',$r->Us_Nom2);
					$entity->__SET('Us_Ape1',$r->Us_Ape1);
					$entity->__SET('Us_Ape2',$r->Us_Ape2);
					$entity->__SET('Registro',$r->Registro);
					$entity->__SET('Usuario',$r->Usuario);
					$entity->__SET('Clave',$r->Clave);
					$entity->__SET('Id_Rol',$r->Id_Rol);
					$entity->__SET('FirmaU',$r->FirmaU);
					return $entity;

				}
				return NULL;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_UsuarioModel->Ver()");
			}
		}

		public function VerxUsuario($Usuario)
		{
			try{
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Usuario WHERE Usuario = ?");
				$stm->execute(array($Usuario));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				if ($r) {
					$entity = new Ota_Usuario();

					$entity->__SET('IdUsuario',$r->IdUsuario);
					$entity->__SET('Us_Nom1',$r->Us_Nom1);
					$entity->__SET('Us_Nom2',$r->Us_Nom2);
					$entity->__SET('Us_Ape1',$r->Us_Ape1);
					$entity->__SET('Us_Ape2',$r->Us_Ape2);
					$entity->__SET('Registro',$r->Registro);
					$entity->__SET('Usuario',$r->Usuario);
					$entity->__SET('Clave',$r->Clave);
					$entity->__SET('Id_Rol',$r->Id_Rol);
					$entity->__SET('FirmaU',$r->FirmaU);
					return $entity;

				}
				return NULL;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_UsuarioModel->Ver()");
			}
		}

		public function Listar()
		{
			try
			{
				$Array = array();
				$stm = $this->pdo->prepare("SELECT * FROM Ota_Usuario");
				$stm->execute(array());

				foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
					$entity = new Ota_Usuario();

					$entity->__SET('IdUsuario',$r->IdUsuario);
					$entity->__SET('Us_Nom1',$r->Us_Nom1);
					$entity->__SET('Us_Nom2',$r->Us_Nom2);
					$entity->__SET('Us_Ape1',$r->Us_Ape1);
					$entity->__SET('Us_Ape2',$r->Us_Ape2);
					$entity->__SET('Registro',$r->Registro);
					$entity->__SET('Usuario',$r->Usuario);
					$entity->__SET('Clave',$r->Clave);
					$entity->__SET('Id_Rol',$r->Id_Rol);
					$entity->__SET('FirmaU',$r->FirmaU);
					
					$Array[] = $entity;
				}
				return $Array;
			}catch(Exception $e){
				die($e->getMessage()." ->Ota_UsuarioModel->Listar()");
			}
		}
		
		public function Eliminar($IdUsuario) {
			try {
				$sql = $this->pdo->prepare("DELETE FROM Ota_Usuario WHERE IdUsuario = ?");
				$stm = $sql->execute(array($IdUsuario));
				if ($stm) {
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." -> Ota_UsuarioModel->Eliminar()");
			}
		}


			public function Modificar_Password ($IdU,$C_Nueva)
		{
			try {
				$sql = ("UPDATE Ota_Usuario SET Clave = ? WHERE IdUsuario = ?");
				$stm = $this->pdo->prepare($sql)->execute(array($C_Nueva, $IdU ));
				if($stm){
					return true;
				} else {
					return false;
				}
			} catch (Exception $e) {
				die($e->getMessage()." ->Ota_UsuarioModel->Modificar()");
			}
		}
		}
	
	?>