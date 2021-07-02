<?php

require("../../domain/connection.php");
require("../../domain/usuarioM.php");
header("Content-type: application/json"); 

class UsuarioMProcess {

	var $ud;

	function doGet($arr){
		$ud = new UsuarioMDAO();
		$sucess = array();
		
		if(isset($arr["crm"])){
			if ($arr["crm"] == "0") {
				$sucess = $ud->readAll();
			} else {
				$sucess = $ud->read($arr["crm"]);
			}
			http_response_code(200);	
		} else {
			$sucess["erro"] = "Requisições GET necessitam do campo crm";
		}
		echo json_encode($sucess);
	}

	function doPost($arr){
		$sucess = array();
		if(isset($arr["acao"])){
			switch($arr["acao"]){
				case "create";
					$ud = new UsuarioMDAO();
					$usuarioM = new UsuarioM();
					$usuarioM->setCrm($arr["crm"]);
					$usuarioM->setSenha($arr["senha"]);
					$sucess = $ud->create($usuarioM);
					http_response_code(200);
				break;
				case "update";
					$ud = new UsuarioMDAO();
					$usuarioM = new UsuarioM();
					$usuarioM->setCrm($arr["crm"]);
					$usuarioM->setSenha($arr["senha"]);
					$sucess = $ud->update($usuarioM);
					http_response_code(200);
				break;
				case "delete";
					$ud = new UsuarioMDAO();
					$sucess = $ud->delete($arr["crm"]);
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