<?php

	class UsuarioP {
		var $cpf;
		var $senha;

		function getCpf(){
			return $this->cpf;
		}
		function setCpf($cpf){
			$this->cpf = $cpf;
		}

		function getSenha(){
			return $this->senha;
		}
		function setSenha($senha){
			$this->senha = $senha;
		}
	}

	class UsuarioPDAO {
		function create($usuarioP){
			$result = array(); 
			$cpf = $usuarioP->getCpf();
			$senha = $usuarioP->getSenha();
		
            
            try{
				$query = "INSERT INTO usuarios VALUES ($cpf, md5('$senha')";

                $con = new Connection();
                if(Connection::getInstance()->exec($query) >= 1){
                    $result = $usuarioP;
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
			$usuarioP = [];
	
			try{
				$query = "SELECT * FROM usuarioP";
				
				$con = new Connection();
				$resultSet = Connection::getInstance()->query($query);
				while($linha = $resultSet->fetchObject()){
					$usuarioP = new usuarioP();
					$usuarioP->setCpf($linha->cpf);
					$usuarioP->setSenha($linha->senha);
					$result[] = $usuarioP;
				}
				$con = null;
			}catch(PDOException $e){
				$usuarioP["erro"] = "Erro ao conectar ao BD";
			}
			return $usuarioP;
		}

		function read($cpf){
			$usuarioP = [];
			
			try{
				$query = "SELECT * FROM usuarioP WHERE cpf = '$cpf'";
				$con = new Connection();
				$resultSet = Connection::getInstance()->query($query);
				while($linha = $resultSet->fetchObject()){
					$usuarioP = new usuarioP();
					$usuarioP->setCpf($linha->cpf);
					$usuarioP->setSenha($linha->senha);
					$result[] = $usuarioP;
					
				}
				$con = null;
			}catch(PDOException $e){
				$usuarioP["erro"] = "Erro ao conectar ao BD";
			}
			return $usuarioP;
		}

		function update($usuarioP){
			$result = [];
			$cpf = $usuarioP->getCpf();
			$senha = $usuarioP->getSenha();
			$query = "UPDATE usuarioP SET senha = md5('$senha') WHERE cpf = '$cpf' ";
			try{
                $con = new Connection();
				$status = Connection::getInstance()->prepare($query);
				if($status->execute()){
					$result[] = $usuarioP;
				}
				$con = null;
			}catch(PDOException $e){
				$result["erro"] = "Erro ao conectar ao BD";	
			}
			return $result;
		}

		function del($cpf){
			$result = [];
		
			try{
				$query = "DELETE FROM usuarioP WHERE cpf= '$cpf' ";
				$con = new Connection();
				if(Connection::getInstance()->exec($query)>=1){
					$result["msg"] = "Usuário Paciente removido com sucesso";
				}
				$con = null;
			}catch(PDOException $e){
				$result["erro"] = "Erro ao conectar ao BD";	
			}
			return $result;
		}
	}
