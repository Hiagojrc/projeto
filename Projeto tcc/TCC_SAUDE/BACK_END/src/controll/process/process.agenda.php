<?php

	require("../../domain/connection.php");
	require("../../domain/agenda.php");

	class AgendaProcess {
		var $ad;

		function doGet($arr){
			$ad = new AgendaDAO();
			$sucess = array();
	
			if(isset($arr["id"])){
				if ($arr["id"] == "0") {
					$sucess = $ad->readAll();
				} else {
					$sucess = $ad->read($arr["id"]);
				}
				http_response_code(200);	
			} else {
				$sucess["erro"] = "Requisições GET necessitam do campo id";
			}
			echo json_encode($sucess);
		}

	     function doPost($arr){
		    $sucess = array();
		    if(isset($arr["acao"])){
			switch($arr["acao"]){
				case "create";
					$ad = new AgendaDAO();
					$age = new Agenda();
					$age->setId_medico($arr["id_medico"]);
					$age->setId_paciente($arr["id_paciente"]);
					$age->setData_hora($arr["data_hora"]);
					$age->setId_status($arr["id_status"]);
					$sucess = $ad->create($age);
					http_response_code(200);
				break;
				case "update";
					$ad = new AgendaDAO();
					$age = new Agenda();
					$age->setId($arr["id"]);
					$age->setData_hora($arr["data_hora"]);
					$age->setId_status($arr["id_status"]);
					$sucess = $ad->update($age);
					http_response_code(200);
				break;
				case "delete";
					$ad = new AgendaDAO();
					$sucess = $ad->delete($arr["id"]);
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