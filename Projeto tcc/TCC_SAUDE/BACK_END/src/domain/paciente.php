<?php

	class Paciente {
		var $cpf;
		var $nome;
		var $cidade;
		var $tipo_sanguineo;
		var $data_de_nascimento;
		var $telefone;
		var $e_mail;

		function getCpf(){
			return $this->cpf;
		}
		function setCpf($cpf){
			$this->cpf = $cpf;
		}

		function getNome(){
			return $this->nome;
		}
		function setNome($nome){
			$this->nome = $nome;
		}

		function getCidade(){
			return $this->cidade;
		}
		function setCidade($cidade){
			$this->cidade = $cidade;
		}

		function getTipo_sanguineo(){
			return $this->tipo_sanguineo;
		}
		function setTipo_sanguineo($tipo_sanguineo){
			$this->tipo_sanguineo = $tipo_sanguineo;
		}

		function getData_de_nascimento(){
			return $this->data_de_nascimento;
		}
		function setData_de_nascimento($data_de_nascimento){
			$this->data_de_nascimento = $data_de_nascimento;
		}

		function getTelefone(){
			return $this->telefone;
		}
		function setTelefone($telefone){
			$this->telefone = $telefone;
		}

		function getE_mail(){
			return $this->e_mail;
		}
		function setE_mail($e_mail){
			$this->e_mail = $e_mail;
		}
	}

	class PacienteDAO {
		function create($paciente) {
			$result = array();

			try {
				$query = "INSERT INTO table_name (column1, column2) VALUES (value1, value2)";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function read() {
			$result = array();

			try {
				$query = "SELECT column1, column2 FROM table_name WHERE condition";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function update() {
			$result = array();

			try {
				$query = "UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete() {
			$result = array();

			try {
				$query = "DELETE FROM table_name WHERE condition";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}
