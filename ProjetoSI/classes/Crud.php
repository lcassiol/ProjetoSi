<?php
	
	require_once 'db.php';

	abstract class Crud extends DB{


		protected $table;

		abstract public function insert();
		abstract public function update($id);

		public function find($id){
			$sql = "SELECT * FROM $this->table where id = :id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch(); 
		}

		public function findALL(){
			$sql = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}

		public function delete($id){
			$sql = "DELETE FROM this->table Where id = :id";
			$stmt = DB::prepare($sql);
			$stm->bindParam(':id',$id,PDO::PARAM_INT);
			return $stmt->execute();
		}


	}


?>