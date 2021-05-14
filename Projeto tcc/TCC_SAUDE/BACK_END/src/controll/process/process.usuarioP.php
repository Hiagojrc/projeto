<?php

    require("../../domain/connection.php");
    require("../../domain/usuarioP.php");
	header("Content-type: application/json"); 

	class UsuarioPProcess {

		var $ud;
	
		function doGet($arr){
			$ud = new UsuarioPDAO();
			$sucess = array();
	
			if(isset($arr["cpf"])){
				if ($arr["cpf"] == "0") {
					$sucess = $ud->readAll();
				} else {
					$sucess = $ud->read($arr["cpf"]);
				}
				http_response_code(200);	
			} else {
				$sucess["erro"] = "Requisições GET necessitam do campo cpf";
			}
			echo json_encode($sucess);
		}
	
		function doPost($arr){
			$sucess = array();
			if(isset($arr["acao"])){
				switch($arr["acao"]){
					case "create";
						$ud = new UsuarioPDAO();
						$usuarioP = new UsuarioP();
						$usuarioP->setCpf($arr["cpf"]);
						$usuarioP->setSenha($arr["senha"]);
						$sucess = $ud->create($usuarioP);
						http_response_code(200);
					break;
					case "update";
						$ud = new UsuarioPDAO();
						$usuarioP = new UsuarioP();
						$usuarioP->setCpf($arr["cpf"]);
						$usuarioP->setSenha($arr["senha"]);
						$sucess = $ud->update($usuarioP);
						http_response_code(200);
					break;
					case "delete";
						$ud = new UsuarioPDAO();
						$sucess = $ud->delete($arr["cpf"]);
						http_response_code(200);
					break;
					default;
						$sucess["erro"] = "O campo acao deve ser preenchido com 'create, update ou delete'";
						http_response_code(400);
					break;
				}
			}else{
				$sucess["erro"] = "Este servidor não possui suporte REST FUll, para processar sua requisição POST envie a acao='create, update ou delete'";
				http_response_code(400);
			}
			echo json_encode($sucess);
		}
	}

?>
