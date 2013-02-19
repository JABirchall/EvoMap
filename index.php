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

?>

<body>
<div id="ribbon">
<h1><u>:: EvoMap ::</u></h1>
<h2></div><div id="main"><?php echo $log;?>
<h3> This is a DrWhat project, this project is protect under the <a href="http://www.gnu.org/licenses/gpl.html">GNU GENERAL PUBLIC LICENSE Version 3</a></h3>
<section><h3>TODO:</h3></br>
	Find subtitle software to scan all servers speedy,</br>
	JS table formatting</br>
	Add search</br>
	Run off MySQL database rather then a CVS file</br></section>
</br></br>
</br><hr>
Any suggestions Email: DrWhat@Cryto.net
<table class="striped tight sortable"></br>
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

require('include/db.inc.php');

if (!isset($_POST['lord'])){
$_POST['lord']='';
}
if (!isset($_POST['alliance'])){
$_POST['alliance']='';
}
$alliance =  mysql_real_escape_string($_POST['alliance']);
$lord =  mysql_real_escape_string($_POST['lord']);
$sql = "SELECT * FROM `coord_info` WHERE `lord_name` LIKE '%$lord%' AND `alliance` LIKE '%$alliance%' ORDER BY `coord_info`.`disposition` ASC LIMIT 0 , 250";
echo "1 = working: ".mysql_select_db($database_modulatemedia, $modulatemedia).'<br>';
$output = mysql_query($sql, $modulatemedia) or die(mysql_error());

echo "Number of results: ".mysql_num_rows($output).'<br>';
while ( $result = mysql_fetch_assoc($output) ) {

$sid = "<td>".$result['servers_id']."</td>";
$x = "<td>".$result['x']."</td>";
$y = "<td>".$result['y']."</td>";
$city = "<td>".$result['city_name']."</td>";
$lord = "<td>".$result['lord_name']."</td>";
$alliance = "<td>".$result['alliance']."</td>";
$status = "<td>".$result['status']."</td>";
$flag = "<td>".$result['flag']."</td>";
$honor = "<td>".$result['honor']."</td>";
$prestige = "<td>".$result['prestige']."</td>";
$disposition = "<td>".$result['disposition']."</td>";

$array = "<tr>".$x."".$y."".$city."".$lord."".$alliance."".$status."".$flag."".$honor."".$prestige."".$disposition."<tr>";
print $array;
}

?>
</tbody>
</table> 
		</div><hr>	&copy DrWhat 2013
		<p><br>
</body>