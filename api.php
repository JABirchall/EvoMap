<?php
header('Content-type: text/javascript');
if (isset($_GET['API']) && $_GET['API'] = 'JSONAPI') {
	if ($_GET['user'] = 'botdonator') {
		if (isset($_POST['lord']) && isset($_POST['x']) && isset($_POST['lord'])) {
			echo $_POST['lord'], $_POST['x'], $_POST['y'];
		} else {
			if (!isset($_POST['lord'])){
				echo 'E01';
			} else if (!isset($_POST['z'])){
				echo 'E03';
			} else if (!isset($_POST['y'])){
				echo 'E02';
			} else if (!isset($_POST[''])){
				echo 'E04';
			}
		}
	} else {
		echo 'E98: Please use a VALID API user!';
	}
} else {
	echo 'E99: Please use your API user to gain access!';
}

?>