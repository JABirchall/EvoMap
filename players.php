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
require_once('C:/xampp/htdocs/vb/global.php');
chdir ($curdir);
require('include/search.inc.php');
require('include/var.inc.php');
echo $header . "<br>";
require_once('C:/xampp/htdocs/vb/login_inc.php');
if ($vbulletin->userinfo['userid']!=0) 
{
	if (isset($_POST['SID']) === false) // if a server is not selected, echo the select server form
	{
		echo "<br><br><form action=\"players.php\" method=\"POST\">" . $servers;
		echo $working;
		echo $footer;
	} else {
		echo "<form action=\"players.php\" method=\"POST\">" . $form . "<br><a href='players.php'>New server</a><br><br>";
		print_r ($players);
		echo $working;
		echo $results;
		echo $tableplayers;
		$players->bindValue(':SID', $SID, PDO::PARAM_INT);
		$players->bindValue(':lord', '%' . $lord . '%', PDO::PARAM_STR);
		$players->bindValue(':alliance', '%' . $alliance . '%', PDO::PARAM_STR);
		$players->execute();
		while ( $result = $players->fetch(PDO::FETCH_ASSOC) )
		{
			$sid = "<td>" . $result['servers_id'] . "</td>";
			$lord = "<td>" . $result['lord_name'] . "</td>";
			$alliance = "<td>" . $result['alliance'] . "</td>";
			$honor = "<td>" . $result['honor'] . "</td>";
			$prestige = "<td>" . $result['prestige'] . "</td>";
			echo "<tr>" . $sid . "" . $lord . "" . $alliance . "" . $honor . "" . $prestige . "</tr>";
		}
	}
}
echo 'DEBUGGING';
echo '<br><pre>', print_r($players->errorInfo()), '<pre>';
?>