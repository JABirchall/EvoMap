<?PHP 
/*
Eclipse Distribution License - v 1.0

Copyright (c) 2007, Eclipse Foundation, Inc. and its licensors.

All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

    Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
    Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
    Neither the name of the Eclipse Foundation, Inc. nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission. 

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

$curdir = getcwd ();
chdir('C:/xampp/htdocs/vb');
require_once('path/to/your/vb/global.php');
chdir ($curdir);
require('include/search.inc.php');
require('include/var.inc.php');
echo $header . "<br>";
require_once('path/to/your/vb/login_inc.php');
if ($vbulletin->userinfo['userid']!=0) {
	if (isset($_POST['SID']) === false || is_numeric($_POST['SID']) === false) // if a server is not selected, echo the select server form
	{
		echo "<br><br><form action=\"index.php\" method=\"POST\">" . $servers;
		echo $working;
		echo $footer;
	}	
	else
	{	
		try {
			$search->bindValue(':user_id', $vbulletin->userinfo['userid'], PDO::PARAM_INT);
			$search->execute();
			 $result = $search->fetch(PDO::FETCH_ASSOC);
			if ($result['searched'] >= 10){
				if ($result['month'] != date(n)){
					$removelimit->bindValue(':user_id', $vbulletin->userinfo['userid'], PDO::PARAM_INT);
					$removelimit->execute();
					$result['searched'] = 0;
				} else {
					exit('you have reached your search limit for this month<br>');
				}
			} else if ($search->rowCount() == 0) {
				echo 'user is not in database';
				print_r($result);
				$adduser->bindValue(':user_id', $vbulletin->userinfo['userid'], PDO::PARAM_INT);
				//$adduser->execute();
			}
			$addsearch->bindValue(':user_id', $vbulletin->userinfo['userid'], PDO::PARAM_INT);
			$addsearch->bindValue(':searched', $result['searched'], PDO::PARAM_STR);
			$addsearch->execute();
		}
		catch(PDOException $e)
		{
			echo'<br><pre>', print_r($addsearch->errorInfo()), '</pre>';
			echo'<br><pre>', print_r($removelimit->errorInfo()), '</pre>';
			echo'<br><pre>', print_r($search->errorInfo()), '</pre>';
			echo'<br><pre>', print_r($adduser->errorInfo()), '</pre>';
			die($e->getMessage() . '<br><p> It is recomended to report this issue to DrWhat or member of the development team.</p>');
		}
		echo "<form action=\"index.php\" method=\"POST\">" . $form . "<br><a href='index.php'>New server</a><br><br>";
		//print_r ($query);
		//echo $working;
		echo $results;
		echo $table;
		$query->bindValue(':SID', $SID, PDO::PARAM_STR);
		$query->bindValue(':lord', '%' . $lord . '%', PDO::PARAM_STR);
		$query->bindValue(':alliance', '%' . $alliance . '%', PDO::PARAM_STR);
		$query->bindValue(':city', '%' . $city . '%', PDO::PARAM_STR);
		$query->bindValue(':flag', '%' . $flag . '%', PDO::PARAM_STR);
		$query->execute();
/*		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		echo "<pre>", print_r($result, true), "</pre>";*/
		while ( $result = $query->fetch(PDO::FETCH_ASSOC) )
		{
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
			echo "<tr>".$x.",".$y."".$city."".$lord."".$alliance."".$status."".$flag."".$honor."".$prestige."".$disposition."</tr>";
		}
		echo '</table><br>';
				if ($query->rowCount() <= 1)
			{
				echo 'Sorry, this search returned no results.';
			}
		echo $footer;
	}
}else{
	echo $footer;
}
echo 'DEBUGGING';
echo '<br><pre>', print_r($query->errorInfo()), '<pre>';
?>