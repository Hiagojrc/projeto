<?php

	class UsuarioM {
		var $crm;
		var $senha;

		function getCrm(){
			return $this->crm;
		}
		function setCrm($crm){
			$this->crm = $crm;
		}
		function getSenha(){
			return $this->senha;
		}
		function setSenha($senha){
			$this->senha = $senha;
		}
	}

	class UsuarioMDAO {
		function create($usuarioM){
			$result = array(); 
			$crm = $usuarioM->getCrm();
			$senha = $usuarioM->getSenha();
		  
            try{
				$query = "INSERT INTO usuarioM VALUES ($crm, md5('$senha'))";
				//var_dump($query);
                $con = new Connection();
                if(Connection::getInstance()->exec($query) >= 1){
                    $result = $usuarioM;
                }else{
					$result["erro"] = "Erro criar usuário Medico";
				}
                $con = null;
            } catch (PDOException $e) {
                $result["erro"] = "Erro ao conectar ao BD";
            }
            return $result;
		}
		
		function readAll(){
			$result = array();
			
			try{
				$query = "SELECT * FROM usuarioM";

				$con = new Connection();
				$resultSet = Connection::getInstance()->query($query);
				while($linha = $resultSet->fetchObject()){
					$usuarioM = new UsuarioM();
					$usuarioM->setCrm($linha->crm);
					$usuarioM->setSenha($linha->senha);
					$result[] = $usuarioM;
				}
				$con = null;
			}catch(PDOException $e){
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
		
		function read($crm){
			$result = array();
			
			try{
				$query = "SELECT * FROM usuarioM WHERE crm = $crm";

				$con = new Connection();
				$resultSet = Connection::getInstance()->query($query);
				while($linha = $resultSet->fetchObject()){
					$usuarioM = new UsuarioM();
					$usuarioM->setCrm($linha->crm);
					$usuarioM->setSenha($linha->senha);
					$result[] = $usuarioM;
				}
				$con = null;
			}catch(PDOException $e){
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function update($usuarioM){
			$result = array();
			$crm = $usuarioM->getCrm();
			$senha = $usuarioM->getSenha();
			
			try{
				$query = "UPDATE usuarioM SET senha = md5('$senha') WHERE crm = $crm";

                $con = new Connection();
				$status = Connection::getInstance()->prepare($query);
				if($status->execute()){
					$result[] = $usuarioM;
				}else {
					$result["erro"] = "Não foi possível atualizar os dados!";
				}

				$con = null;
			}catch(PDOException $e){
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
		function delete($crm) {
			$result = array();

			try {
				$query = "DELETE FROM usuarioM WHERE crm = $crm";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["msg"] = "Usuário medico removido com sucesso! ";
				}else {
					$result["erro"] = "Falha ao excluir!";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}
