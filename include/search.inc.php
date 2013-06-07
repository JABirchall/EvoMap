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
require('db.inc.php');

$lord 		= ( isset ( $_POST['lord'] )		=== true ) ? $_POST['lord'] : '';
$alliance 	= ( isset ( $_POST['alliance'] ) 	=== true ) ? $_POST['alliance'] : '';
$city 		= ( isset ( $_POST['city'] ) 		=== true ) ? $_POST['city'] : '';
$flag 		= ( isset ( $_POST['flag'] ) 		=== true ) ? $_POST['flag'] : '';

$query 			= $db->prepare("SELECT * FROM `coord_info` WHERE `servers_id` = :SID AND `lord_name` LIKE :lord AND `alliance` LIKE :alliance AND `city_name` LIKE :city AND `flag` LIKE :flag ORDER BY `coord_info`.`ci_id` ASC LIMIT 0 , 100");
$players 		= $db->prepare("SELECT DISTINCT `servers_id`,`lord_name`, `prestige`, `honor`, `alliance` FROM `coord_info` WHERE `servers_id` = :SID AND `lord_name` LIKE :lord AND `alliance` LIKE :alliance ORDER BY `coord_info`.`prestige` ASC LIMIT 0 , 100");
$search 		= $db->prepare("SELECT `searched`, `month` FROM `search` WHERE `user_id` =:user_id");
$addsearch 		= $db->prepare("UPDATE `evomap`.`search` SET `searched` = :searched + 1 WHERE `search`.`user_id` =:user_id;");
$removelimit	= $db->prepare("UPDATE `evomap`.`search` SET `searched` = 0, `month` = month(now()) WHERE `search`.`user_id` = :user_id;");
$adduser 		= $db->prepare("INSERT INTO `evomap`.`search` (`id`, `user_id`, `searched`, `month`) VALUES (NULL, :user_id, '0', month(now()))");
$api_submit 	= $db->prepare("INSERT INTO coord_info (servers_id, x, y, city_name, lord_name, alliance, status, flag, honor, prestige, disposition) VALUES (:sid, :xxx, :yyy, :city, :lord, :alliance, 0, :flag, :honor, :prestige, 1);")



?>

