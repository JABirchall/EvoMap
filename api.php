<?php
header('content-type: text/javascript');
include('include/search.inc.php');
if (!isset($_GET['API']) && @$_GET['API'] != 'JSONAPI')
{
	echo 'E99: Please use your API user to gain access!';
}
else
{
	if (@$_GET['user'] != 'botdonator')
	{
		echo 'E98: Please use a VALID API user!';
	}
	else
	{
		if (!isset($_POST['json']))
		{
			echo 'E01';
		} else if (!isset($_GET['x']))
		{
			echo 'E02';
		} else if (!isset($_GET['y']))
		{
			echo 'E03';
		}
		else if (isset($_POST['json']))
		{
			$data = json_decode($_POST['json']);
			$data->x = $_GET['x'];
			$data->y = $_GET['y'];
			print_r($data);
		}
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
?>
