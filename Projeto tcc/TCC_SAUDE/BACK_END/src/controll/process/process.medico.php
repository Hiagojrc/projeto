<?php

	require("../../domain/connection.php");
	require("../../domain/medico.php");

	class MedicoProcess {
		var $md;

		function doGet($arr){
			$md = new MedicoDAO();
			if ($arr["crm"] == "0") {
				$sucess = $td->readAll();
			} else {
				$sucess = $td->read($arr["crm"]);
			}
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$md = new MedicoDAO();
			$medic = new Medico();
			$medic->setCrm($arr["crm"]);
			$medic->setNome($arr["nome"]);
			$medic->setCidade($arr["cidade"]);
			$medic->setPosto_atendimento($arr["posto_atendimento"]);
			$medic->setEspecialidade($arr["especialidade"]);
			$medic->setTelefone($arr["telefone"]);
			$medic->setE_mail($arr["e_mail"]);
			$sucess = $md->create($medic);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$md = new MedicoDAO();
			$medic = new Medico();
			$medic->setCrm($arr["crm"]);
			$medic->setNome($arr["nome"]);
			$medic->setCidade($arr["cidade"]);
			$medic->setPosto_atendimento($arr["posto_atendimento"]);
			$medic->setEspecialidade($arr["especialidade"]);
			$medic->setTelefone($arr["telefone"]);
			$medic->setE_mail($arr["e_mail"]);
			$sucess = $md->update($medic);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$md = new MedicoDAO();
			$sucess = $md->delete($arr["crm"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}