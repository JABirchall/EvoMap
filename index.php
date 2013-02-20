<head>
<link rel="stylesheet" href="static/style.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script type="text/javascript" src="include/prettify.js"></script>                                   
<script type="text/javascript" src="include/kickstart.js"></script>
<link rel="stylesheet" href="static/kickstart.css">


<title>Evony map :: DrWhat Project ::0.0.8 </title>
</head>
<?PHP 
require('include/ArrServer.inc.php');
require('include/access.inc.php');
require ("include/search.inc.php");
echo $header;
if (!isset($_POST['SID'])){
	echo "<br><br>";
	echo $servers;
	echo $working;
	echo $footer;
	}
	else
	{
	$SID =  mysql_real_escape_string($_POST['SID']);
	//require ("include/search.inc.php");
	echo $form."<br><br><br>";
	echo $working;
	echo $results;
	echo $table;
		while ( $result = mysql_fetch_assoc($output) ) {
			$sid = "<td>".$result['servers_id']."</td>";
			$x = "<td>".$result['x']."";
			$y = "".$result['y']."</td>";
			$city = "<td>".$result['city_name']."</td>";
			$lord = "<td>".$result['lord_name']."</td>";
			$alliance = "<td>".$result['alliance']."</td>";
			$status = "<td>".$result['status']."</td>";
			$flag = "<td>".$result['flag']."</td>";
			$honor = "<td>".$result['honor']."</td>";
			$prestige = "<td>".$result['prestige']."</td>";
			$disposition = "<td>".$result['disposition']."</td>";
			$array = "<tr>".$x.",".$y."".$city."".$lord."".$alliance."".$status."".$flag."".$honor."".$prestige."".$disposition."<tr>";
			echo $array;
		}
		echo $footer;
	}
?>

