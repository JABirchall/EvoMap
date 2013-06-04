<?php
include('include/search.inc.php');

if (isset($_GET['API']) && $_GET['API'] = 'JSONAPI') {
	if ($_GET['user'] = 'botdonator') {
		if (!isset($_POST['lord'])){
			echo 'E01';
		} else if (!isset($_POST['x'])){
			echo 'E03';
		} else if (!isset($_POST['y'])){
			echo 'E02';
		} else if (!isset($_POST['sid'])){
			echo 'E05';
		} else if (isset($_POST['lord'], $_POST['x'], $_POST['lord'], $_POST['sid'])) {
		$data = array(
			'SID' => $_POST['sid'],
			'lord' => $_POST['lord'],
			'xxx' => $_POST['x'],
			'zzz' => $_POST['y']
			);
		$data = json_encode($data);
		echo $data;
		$data = json_decode($data, true);
		echo '<pre>', print_r($data), '<pre>';
		}
	} else {
		echo 'E98: Please use a VALID API user!';
	}
} else {
	echo 'E99: Please use your API user to gain access!';
}

?>