<?php
 
require("../../domain/connection.php");
require("../../domain/paciente.php");
 
class PacienteProcess {​​​​​​​​
var $pd;
 

	functiondoGet($arr){​​​​​​​​
				$pd =newPacienteDAO();
				$sucess =array();
	if(isset($arr["cpf"])){​​​​​​​​
	if ($arr["cpf"] =="0"){​​​​​​​​
						$sucess = $pd->readAll();
					}​​​​​​​​else {​​​​​​​​ 
						$sucess = $pd->read($arr["cpf"]);
					}​​​​​​​​
	http_response_code(200);
				}​​​​​​​​ else {​​​​​​​​
					$sucess["erro"] ="É necessario que voce digite um 'cpf'";
	http_response_code(400);
				}​​​​​​​​
	echojson_encode($sucess);
			}​​​​​​​​
	
	functiondoPost($arr){​​​​​​​​
				$pd =newPacienteDAO();
				$sucess =array();
	if(isset($arr["acao"])){​​​​​​​​
	switch($arr["acao"]){​​​​​​​​
	case'create':
				$paciente =newPaciente();
				$paciente->setCpf($arr["cpf"]);
				$paciente->setNome($arr["nome"]);
				$paciente->setCidade($arr["cidade"]);
				$paciente->setTipo_sanguineo($arr["tipo_sanguineo"]);
				$paciente->setData_de_nascimento($arr["data_de_nascimento"]);
				$paciente->setTelefone($arr["telefone"]);
				$paciente->setE_mail($arr["e_mail"]);
				$sucess = $pd->create($paciente);
	http_response_code(200);        
	break;
	case'update':
				$paciente =newPaciente();
				$paciente->setCpf($arr["cpf"]);
				$paciente->setNome($arr["nome"]);
				$paciente->setCidade($arr["cidade"]);
				$paciente->setTipo_sanguineo($arr["tipo_sanguineo"]);
				$paciente->setData_de_nascimento($arr["data_de_nascimento"]);
				$paciente->setTelefone($arr["telefone"]);
				$paciente->setE_mail($arr["e_mail"]);
				$sucess = $pd->update($paciente);
	break;
	case'delete':
							$sucess = $pd->delete($arr["cpf"]);
	http_response_code(200);
	break;
	default:
							$sucess["erro"] ="O campo acao deve ser preencido com 'create, update ou delete'";
	http_response_code(400);
	break;
					}​​​​​​​​
				}​​​​​​​​ else{​​​​​​​​
					$sucess["erro"] ="Para processar uma requisição POST de paciente envie a 'acao=create,update,delete'";
	http_response_code(400);
				}​​​​​​​​
	echojson_encode($sucess);
			}​​​​​​​​
	
		}​​​​​​​​

	​[ontem 08:56] Wellington Fabio de Oliveira Martins
		

	/*métodos create, update e delete em paciente.php*/
	
	classPacienteDAO {​​​​​​​​
	functioncreate($paciente) {​​​​​​​​
				$result =array();
	
	try {​​​​​​​​
					$query ="INSERTINTO Paciente VALUES('".$paciente->getCpf()."', '".$paciente->getNome()."', '".$paciente->getCidade()."',
	'".$paciente->getTipo_sanguineo()."', '".$paciente->getData_de_nascimento()."', '".$paciente->getTelefone()."',
	'".$paciente->getE_mail()."')";
	
					$con =newConnection();
	
	if(Connection::getInstance()->exec($query) >=1){​​​​​​​​
						$result["cpf"] = $paciente->getCpf();
						$result["nome"] = $paciente->getNome();
						$result["cidade"] = $paciente->getCidade();
						$result["tipo_sanguineo"] = $paciente->getTipo_sanguineo();
						$result["data_de_nascimento"] = $paciente->getData_de_nascimento();
						$result["telefone"] = $paciente->getTelefone();
						$result["e_mail"] = $paciente->getE_mail();
					}​​​​​​​​else{​​​​​​​​
						$result["erro"] ="Não foi possivel adicionar um novo paciente";
					}​​​​​​​​
	
					$con =null;
				}​​​​​​​​catch(PDOException $e) {​​​​​​​​
					$result["err"] = $e->getMessage();
				}​​​​​​​​
	
	return $result;
			}​​​​​​​​
	
	functionupdate($paci) {​​​​​​​​
				$result =array();
				$cpf = $paci->getCpf();
				$nome = $paci->getNome();
				$cidade = $paci->getCidade();
				$tipo_sanguineo = $paci->getTipo_sanguineo();
				$data_de_nascimento = $paci->getData_de_nascimento();
				$telefone = $paci->getTelefone();
				$e_mail = $paci->getE_mail();
	
	try {​​​​​​​​
					$query ="UPDATE paciente SET nome ='$nome', cidade ='$cidade', tipo_sanguineo ='$tipo_sanguineo', telefone ='$telefone', e_mail ='$e_mail', data_de_nascimento ='$data_de_nascimento'WHERE cpf ='$cpf'";
					$con =newConnection();
					$status =Connection::getInstance()->prepare($query);
	if($status->execute()){​​​​​​​​
						$result = $paci;
					}​​​​​​​​else{​​​​​​​​
						$result["erro"] ="Não foi possivel atualizar os dados desse paciente!";
					}​​​​​​​​
					$con =null;
				}​​​​​​​​catch(PDOException $e) {​​​​​​​​
					$result["err"] = $e->getMessage();
				}​​​​​​​​
	
	return $result;
			}​​​​​​​​
	
	functiondelete($cpf) {​​​​​​​​
				$result =array();
	
	try {​​​​​​​​
					$query ="DELETE FROM paciente WHERE cpf ='$cpf'";
	
					$con =newConnection();
	
	if(Connection::getInstance()->exec($query) >=1){​​​​​​​​
						$result["msg"] ="Paciente removido com sucesso!";
					}​​​​​​​​else{​​​​​​​​
						$result["erro"] ="Paciente não removido!";
					}​​​​​​​​
	
					$con =null;
				}​​​​​​​​catch(PDOException $e) {​​​​​​​​
					$result["err"] = $e->getMessage();
				}​​​​​​​​
	
	return $result;
			}​​​​​​​​
		}​​​​​​​​

