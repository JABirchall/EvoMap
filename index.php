<head>
<link rel="stylesheet" href="static/style.css">
<title>Evony map :: DrWhat Project ::0.0.6.1 </title>
</head>
<?PHP 
require('include/ArrServer.inc.php');
$form="<form action=\"#\" method=\get\"><fieldset>Server Number <input type=\"text\" name=\"s\"><br>Super Server? <input type=\"radio\" name=\"ss\" id=\"ss\" value=1>
			*If yes Do not put 'SS' in, example for SS60 you would put 60 and tick Super server<br><input type=\"submit\" value=\"Submit\"></fieldset></form>";
if (!isset($_GET['s'])){
	echo "<div id=\"ribbon\"><h1><u>:: EvoMap ::</u></h1><h2>Please choose your server number.</h2></div>";
	echo "<div id\"main\"><h3> This is a DrWhat development, this project is protect under the <a href=\"http://www.gnu.org/licenses/gpl.html\">GNU GENERAL PUBLIC LICENSE Version 3</a></h3>
	<hr><section>".$form." <h3>TODO:</h3></br>
	Find subtitle software to scan all servers speedy,</br>
	JS table formatting</br>
	Add search</br>
	Run off MySQL database rather then a CVS file</br></section></br><hr>
	Any suggestions Email <a>DrWhat@Cryto.net</a></div>
	&copy DrWhat 2013";
	exit();
} else {
@$ServerNumrical=strip_tags($_GET['s']);
}
if (!isset($_GET['ss'])){
	$_GET['ss']=0;
	$isSuperServer=0;
}else{
$isSuperServer=$_GET['ss'];
}


if ($isSuperServer==0) {
		if ( array_key_exists($ServerNumrical,$ArrServerNumrical)){
			$RequireFile = $ArrServerNumrical[$ServerNumrical]['Path'].'/'.$ArrServerNumrical[$ServerNumrical]['FileName'].'.csv';
		}else {
 			echo "<div id=\"ribbon\"><h1><u>:: EvoMap ::</u></h1></br></div>
			<div id=\"main\"><section><h3>We do not have that server in our list, Email drwhat@cryto.net To request it to be added.</h3>
			<br>".$form."</section></div>
			&copy DrWhat 2013"; 
			$PageErrorId = 1;
			exit();
		}
	}else if ($isSuperServer == 1){
		if ( array_key_exists($ServerNumrical,$ArrSuperServerNumrical)){
			$RequireFile = $ArrSuperServerNumrical[$ServerNumrical]['Path'].'/'.$ArrSuperServerNumrical[$ServerNumrical]['FileName'].'.csv';
			$ServerNumrical="ss".$ServerNumrical;
		} else { 
 			echo "<div id=\"ribbon\"><h1><u>:: EvoMap ::</u></h1></br></div>
			<div id=\"main\"><section><h3>We do not have that server in our list, Email drwhat@cryto.net To request it to be added.</h3>
			<br>".$form."</section></div>
			&copy DrWhat 2013"; 
			$PageErrorId = 1;
			exit();
		} 
	}
?>

<body>
<div id="ribbon">
<h1><u>:: EvoMap ::</u></h1>
<h2></div><div id="main">
<h3> This is a DrWhat project, this project is protect under the <a href="http://www.gnu.org/licenses/gpl.html">GNU GENERAL PUBLIC LICENSE Version 3</a></h3>
<hr><?php echo $form;?><hr>
<section><h3>TODO:</h3></br>
	Find subtitle software to scan all servers speedy,</br>
	JS table formatting</br>
	Add search</br>
	Run off MySQL database rather then a CVS file</br></section>
</br></br>
<?php
if (empty($RequireFile)){
}else{
echo "You are viewing Coordenates for server ".$ServerNumrical.". </br> Download full list by <a href='".$RequireFile."'>clicking here</a>";
}
?></br><hr>
Any suggestions Email: DrWhat@Cryto.net
<table id="map" class="tablesorter"></br>
<thead>
<tr>
<th>X |</th>
<th>Y |</th>
<th>City Name |</th>
<th>Lord Name |</th>
<th>Allaince |</th>
<th>Status |</th>
<th>Flag |</th>
<th>Honor |</th>
<th>Prestige |</th>
<th>Disposition</th>
</tr>
</thead>
<tbody>
<?PHP
if (empty($RequireFile)){
	}else{
	if (($handle = fopen($RequireFile, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
    echo '<tr>';
    for ($c=0; $c < count($data); $c++)
    {
    echo "<td>{$data[$c]}</td>";
    }
    echo '</tr>';
    }
    fclose($handle);
	}
}
exit();
?>
</tbody>
</table> 
		</div><hr>	&copy DrWhat 2013
</body>