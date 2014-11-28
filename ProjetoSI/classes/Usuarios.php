<?php

require_once 'Crud.php';

class Usuarios extends Crud{

	protected $table = "usuario";
	private $nome; 
	private $senha; 
	private $email;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}
	

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}


	public function setSenha($senha){
		$this->senha = $senha;
	}


	public function getSenha(){
		return $this->senha;
	}

	public function insert(){
		$sql = "INSERT INTO $this->table (nome,senha,email) VALUES (:nome,:senha,:email)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':email',$this->email);
		return $stmt->execute();
	}

	public function update($id){

		$sql = "UPDATE $this->table SET nome = :nome , email = :email, senha = :senha where id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':senha',$this->senha);
		$stmt->bindParam(':id',$id);
		return $stmt->execute();
	}


	public function Logar(){
			$sql = "SELECT * FROM $this->table WHERE email = :email AND senha = :senha";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':email',$this->email);
			$stmt->bindParam(':senha',$this->senha);
			$stmt->execute();

			if($stmt->rowCount() == 1){
				return true;
			}else{
				return false;
			}

		}


}


?>