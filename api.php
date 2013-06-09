<?php
header('content-type: text/javascript');
include('include/search.inc.php');
if (!isset($_GET['API']) && @$_GET['API'] != 'JSONAPI'){
	echo 'E99: Please use your API user to gain access!';
}else{
	if (@$_GET['user'] != 'botdonator'){
		echo 'E98: Please use a VALID API user!';
	}else{
		if (!isset($_POST['json'])){
			echo 'E01';
		} else if (!isset($_POST['sid'])){
			echo 'E02';
		} else if (isset($_POST['json'])){
			$data = json_decode($_POST['json']);
			foreach ($data as $key => $data) {
				$data->x = intval($data->id % 800);
				$data->y = intval($data->id / 800);
				$data->sid = intval($_POST['sid']);
				//print_r($data);
	try {
				$api_submit->bindValue(':sid', $data->sid, PDO::PARAM_INT);
				$api_submit->bindValue(':lord', $data->userName, PDO::PARAM_STR);
				$api_submit->bindValue(':xxx', $data->x, PDO::PARAM_INT);
				$api_submit->bindValue(':yyy', $data->y, PDO::PARAM_INT);
				$api_submit->bindValue(':city', $data->name, PDO::PARAM_STR);
				$api_submit->bindValue(':alliance', $data->allianceName, PDO::PARAM_STR);
				$api_submit->bindValue(':flag', $data->flag, PDO::PARAM_STR);
				$api_submit->bindValue(':honor', $data->honor, PDO::PARAM_INT);
				$api_submit->bindValue(':prestige', $data->prestige, PDO::PARAM_INT);
				$api_submit->execute();
				@$count++;
			} catch(PDOException $e){
				//die($e);
			}
			}
			echo "AOK: " . @$count . " records sumbmited.";
		}
	}
}
?>