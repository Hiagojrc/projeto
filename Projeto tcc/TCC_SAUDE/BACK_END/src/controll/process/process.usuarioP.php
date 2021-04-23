<?php

	require("../../domain/connection.php");
	require("../../domain/usuariop.php");

	class UsuarioPProcess {
		var $ud;

		function doGet($arr){
			$ud = new UsuarioPDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}


		function doPost($arr){
			$ud = new UsuarioPDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}


		function doPut($arr){
			$ud = new UsuarioPDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}


		function doDelete($arr){
			$ud = new UsuarioPDAO();
			$result = "use to result to DAO";
			http_response_code(200);
			echo json_encode($result);
		}
	}