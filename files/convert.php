<?php
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

$databasehost = "localhost";
$databasename = "evomap";
$databasetable = "coord_info";
$databaseusername ="root";
$databasepassword = "";
$fieldseparator = ",";
$lineseparator = "\n";
$csvfile = "166.csv";
$SID = 323;

$addauto = 0;

$save = 0;
$outputfile = "171.sql";


if (!file_exists($csvfile)) {
        echo "File not found. Make sure you specified the correct path.\n";
        exit;
}

$file = fopen($csvfile,"r");

if (!$file) {
        echo "Error opening data file.\n";
        exit;
}

$size = filesize($csvfile);

if (!$size) {
        echo "File is empty.\n";
        exit;
}

$csvcontent = fread($file,$size);

fclose($file);

$con = @mysql_connect($databasehost,$databaseusername,$databasepassword) or die(mysql_error());
@mysql_select_db($databasename) or die(mysql_error());

$lines = 0;
$queries = "";
$linearray = array();

foreach(explode($lineseparator,$csvcontent) as $line) {

        $lines++;

        $line = trim($line," \t");

        $line = str_replace("\r","",$line);


        $line = str_replace("'","\'",$line);


        $linearray = explode($fieldseparator,$line);

        $linemysql = implode("','",$linearray);

        if($addauto)
                $query = "insert into $databasetable values('','$linemysql');";
        else
                $query = "insert into coord_info (servers_id, x, y, city_name, lord_name, alliance, status, flag, honor, prestige, disposition)
							values ('$SID','$linemysql');";

        $queries .= $query . "\n";

        @mysql_query($query);
}

@mysql_close($con);

 if ($save) {

        if (!is_writable($outputfile)) {
                echo "File is not writable, check permissions.\n";
        }

        else {
                $file2 = fopen($outputfile,"w");

                if(!$file2) {
					echo "Error writing to the output file.\n";
                }
                else {	
					fwrite("insert into coord_info (servers_id, x, y, city_name, lord_name, alliance, status, flag, honor, prestige, disposition)
							values ('$SID','$linemysql');");
					fwrite($file2,$queries);
					fclose($file2);
                }
        }

} 

echo "Found a total of $lines records in this csv file.\n";

?>