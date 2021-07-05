<?php

	class Agenda {
		var $id;
		var $id_medico;
		var $nomeMedico;
		var $especialidade;
		var $id_paciente;
		var $nomePaciente;
		var $data_hora;
		var $id_status;

		function getId(){
			return $this->id;
		}
		function setId($id){
			$this->id = $id;
		}

		function getId_medico(){
			return $this->id_medico;
		}
		function setId_medico($id_medico){
			$this->id_medico = $id_medico;
		}

		function getNomeMedico(){
			return $this->nomeMedico;
		}
		function setNomeMedico($nomeMedico){
			$this->nomeMedico = $nomeMedico;
		}

		function getEspecialidade(){
			return $this->especialidade;
		}
		function setEspecialidade($especialidade){
			$this->especialidade = $especialidade;
		}

		function getId_paciente(){
			return $this->id_paciente;
		}
		function setId_paciente($id_paciente){
			$this->id_paciente = $id_paciente;
		}

		function getNomePaciente(){
			return $this->nomePaciente;
		}
		function setNomePaciente($nomePaciente){
			$this->nomePaciente = $nomePaciente;
		}

		function getData_hora(){
			return $this->data_hora;
		}
		function setData_hora($data_hora){
			$this->data_hora = $data_hora;
		}

		function getId_status(){
			return $this->id_status;
		}
		function setId_status($id_status){
			$this->id_status = $id_status;
		}
	}

	class AgendaDAO {
		function create($age) {
			$result = array();
			$medico = $age->getId_medico();
			$paciente = $age->getId_paciente();
			$dadahora = $age->getData_hora();
			$status = $age->getId_status();
		
			try {
				$query = "INSERT INTO agenda VALUES(default, $medico, '$paciente', '$dadahora', $status)";
				
				$con = new Connection();
				if(Connection::getInstance()->exec($query) >= 1){
					$result = $age;
				} else {
					$result["erro"] = "Erro ao cadastrar!";
				}
				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}
			return $result;
				
		}

		function readAll() {
			$result = array();

			try {
				$query = "SELECT * FROM vw_agenda";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$age = new Agenda();
					$age->setId($row->id);
					$age->setId_medico($row->id_medico);
					$age->setNomeMedico($row->nomemedico);
					$age->setEspecialidade($row->especialidade);
					$age->setId_paciente($row->id_paciente);
					$age->setNomePaciente($row->nomepaciente);
					$age->setData_hora($row->data_hora);
					$age->setId_status($row->id_status);
					$result[] = $age;
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function read($id) {
			$result = array();

			try {
				$query = "SELECT * FROM vw_agenda WHERE id = $id";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$age = new Agenda();
					$age->setId($row->id);
					$age->setId_medico($row->id_medico);
					$age->setNomeMedico($row->nomeMedico);
					$age->setEspecialidade($row->especialidade);
					$age->setId_paciente($row->id_paciente);
					$age->setNomePaciente($row->nomePaciente);
					$age->setData_hora($row->data_hora);
					$age->setId_status($row->id_status);
					$result[] = $age;
				}

				$con = null;
			 }catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function update($age) {
			$result = array();

			$id = $age->getId();
			$dadahora = $age->getData_hora();
			$status = $age->getId_status();

			try {
				$query = "UPDATE agenda SET  data_hora = '$dadahora', id_status = $status WHERE id = $id";
				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
					$result = $age;
				} else {
					$result["erro"] = "Não foi possível atualizar os dados!";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete($id) {
			$result = array();

			try {
				$query = "DELETE FROM agenda WHERE id = $id";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["msg"] = "Agenda removido com sucesso! ";
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
