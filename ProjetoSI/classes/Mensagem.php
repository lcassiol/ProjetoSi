<?php 

	require_once 'Crud.php';

	class Mensagem extends Crud{

		protected $table = "mensagem";
		
		private $mensagem;
		private $email_usuario;

		public function setMensagem($mensagem){
			$this->mensagem = $mensagem;
		}

		public function getMensagem(){
			return $this->mensagem;
		}


		public function setEmail_usuario($email_usuario){
			$this->email_usuario = $email_usuario;
		}

		public function getEmail_usuario(){
			return $this->email_usuario;
		}




		public function insert(){
		$sql = "INSERT INTO $this->table (Mensagem,DT_H,Email_Usuario) 
				VALUES (:mensagem,CURRENT_DATE,:email_usuario)";
		
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':mensagem',$this->mensagem);
		$stmt->bindParam(':email_usuario',$this->email_usuario);
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



	}





?>