
<?php 
	include '../Note.php';

	if (isset($_POST['title'] && isset($_POST['description']) && isset($_POST['author_id']))) {
		$note = new Note();
		if ($note->updateNote($_POST['title'],$_POST['description'],$_POST['author_id'])) {
			echo json_encode(['status' => 'success'])
		}else{
			echo json_encode(['status' => 'error']);
		}
	}else{
		echo json_encode(['status' => 'error']);
	}


?>