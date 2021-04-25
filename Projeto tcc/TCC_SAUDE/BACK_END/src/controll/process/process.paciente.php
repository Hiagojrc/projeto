<?php

	require("../../domain/connection.php");
	require("../../domain/paciente.php");

	class PacienteProcess {
		var $pd;

		
		function doGet($arr){
			$pd = new PacienteDAO();
			if ($arr["cpf"] == "0"){
				$sucess = $pd->readAll();
			}else { 
				$sucess = $pd->read($arr["cpf"]);
			}
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$pd = new PacienteDAO();
			$paciente = new Paciente();
			$paciente->setNome($arr["nome"]);
			$paciente->setCidade($arr["cidade"]);
			$paciente->setTipo_sanguineo($arr["tipo_sanguineo"]);
			$paciente->setData_de_nascimento($arr["data_de_nascimento"]);
			$paciente->setTelefone($arr["telefone"]);
			$paciente->setE_mail($arr["e_mail"]);
			$sucess = $pd->create($paciente);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$pd = new PacienteDAO();
			$paciente = new Paciente();
			$paciente->setCpf($arr["cpf"]);
			$paciente->setNome($arr["nome"]);
			$paciente->setCidade($arr["cidade"]);
			$paciente->setTipo_sanguineo($arr["tipo_sanguineo"]);
			$paciente->setData_de_nascimento($arr["data_de_nascimento"]);
			$paciente->setTelefone($arr["telefone"]);
			$paciente->setE_mail($arr["e_mail"]);
			$sucess = $pd->update($paciente);
			http_response_code(200);
			echo json_encode($result);
		}


		function doDelete($arr){
			$pd = new PacienteDAO();
			$sucess = $pd->delete($arr["cpf"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}