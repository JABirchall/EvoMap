<?php
include('include/search.inc.php');
if (!isset($_GET['API']) && @$_GET['API'] != 'JSONAPI') {
	echo 'E99: Please use your API user to gain access!';
} else {
	if (@$_GET['user'] != 'botdonator') {
		echo 'E98: Please use a VALID API user!';
	} else {
		if (!isset($_POST['lord']))
		{
			echo 'E01';
		}
		else if (!isset($_POST['x']) || !is_numeric($_POST['x']))
		{
			echo 'E03';
		}
		else if (!isset($_POST['y']) || !is_numeric($_POST['y']))
		{
			echo 'E02';
		}
		else if (!isset($_POST['sid']) || !is_numeric($_POST['sid']))
		{
			echo 'E05';
		}
		else if (!isset($_POST['city']))
		{
			echo 'E06';
		}
		else if (!isset($_POST['alliance']))
		{
			echo 'E07';
		}
		else if (!isset($_POST['flag']))
		{
			echo 'E08';
		}
		else if (!isset($_POST['honor']) || !is_numeric($_POST['honor']))
		{
			echo 'E09';
		}
		else if (!isset($_POST['prestige']) || !is_numeric($_POST['prestige']))
		{
			echo 'E10';
		}
		else if (isset($_POST['lord'], $_POST['x'], $_POST['y'], $_POST['sid'], $_POST['city'], $_POST['alliance'], $_POST['flag'], $_POST['honor'], $_POST['prestige']))
		{
			try {
				$api_submit->bindValue(':sid', $_POST['sid'], PDO::PARAM_INT);
				$api_submit->bindValue(':lord', $_POST['lord'], PDO::PARAM_STR);
				$api_submit->bindValue(':xxx', $_POST['x'], PDO::PARAM_INT);
				$api_submit->bindValue(':yyy', $_POST['y'], PDO::PARAM_INT);
				$api_submit->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
				$api_submit->bindValue(':alliance', $_POST['alliance'], PDO::PARAM_STR);
				$api_submit->bindValue(':flag', $_POST['flag'], PDO::PARAM_STR);
				$api_submit->bindValue(':honor', $_POST['honor'], PDO::PARAM_INT);
				$api_submit->bindValue(':prestige', $_POST['prestige'], PDO::PARAM_INT);
				$api_submit->execute();
				echo 'AOK';
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}
}
?>
