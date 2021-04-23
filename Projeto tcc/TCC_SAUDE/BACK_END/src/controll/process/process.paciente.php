<?php

	require("../../domain/connection.php");
	require("../../domain/paciente.php");

	class PacienteProcess {
		var $pd;

		function doGet($arr){
			$pd = new PacienteDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}


		function doPost($arr){
			$pd = new PacienteDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}


		function doPut($arr){
			$pd = new PacienteDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}


		function doDelete($arr){
			$pd = new PacienteDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}
	}