<?php
include "Connection.php";
class Note extends Connection
{
	public function getNotes(){
		$sql = "SELECT * FROM notes";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function findNote($id){
		$sql = "SELECT * FROM notes WHERE id=? limit 1";
		$stmt = $this->db->prepare($sql);
		$stmt->execute(array($id));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	public function addNote($title, $description, $author_id){
		$sql = "INSERT INTO notes(title, description, author_id) values (?, ?,?)";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute(array($title,$description,$author_id))){
			return true;
		}else{
			return false;
		}
	}
	public function updateNote($title, $description, $author_id){
		$sql = "UPDATE notes SET title=?, description =?, author_id=? where id=?";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute(array($title,$description,$author_id))){
			return true;
		}else{
			return false;
		}
	}
	public function updateNote($id){
		$sql = "DELETE FROM notes where id=?";
		$stmt = $this->db->prepare($sql);
		if($stmt->execute(array($id))){
			return true;
		}else{
			return false;
		}
	}
}

?>