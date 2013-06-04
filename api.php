<?php
include('include/search.inc.php');

if (!isset($_GET['API']) && @$_GET['API'] != 'JSONAPI') {
	echo 'E99: Please use your API user to gain access!';
} else {
	if (@$_GET['user'] != 'botdonator') {
		echo 'E98: Please use a VALID API user!';
	} else {
		if (!isset($_POST['lord'])){
			echo 'E01';
		} else if (!isset($_POST['x'])){
			echo 'E03';
		} else if (!isset($_POST['y'])){
			echo 'E02';
		} else if (!isset($_POST['sid'])){
			echo 'E05';
		} else if (isset($_POST['lord'], $_POST['x'], $_POST['y'], $_POST['sid'])) {
		$data = array(
			'SID' => $_POST['sid'],
			'lord' => $_POST['lord'],
			'xxx' => $_POST['x'],
			'yyy' => $_POST['y']
			);
		$data = json_encode($data);
		echo $data;
		$data = json_decode($data, true);
		echo '<pre>', print_r($data), '<pre>';
		}
	}
}

?>