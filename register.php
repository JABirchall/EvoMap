<?php require_once('include/db.inc.php');
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="register.php";
  $loginUsername = $_POST['username'];
  $LoginRS__query = sprintf("SELECT username FROM users WHERE username=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_modulatemedia, $modulatemedia);
  $LoginRS=mysql_query($LoginRS__query, $modulatemedia) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users (username, password, email) VALUES (%s, md5(%s), %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_modulatemedia, $modulatemedia);
  $Result1 = mysql_query($insertSQL, $modulatemedia) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>
<link rel="stylesheet" type="text/css" href="static/style.css" />

</head>

<body>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <label></label>
  <table width="241" border="0" align="center">
    <tr>
      <td colspan="2"><h2 class="style4">Registration</h2></td>
    </tr>
    <tr>
      <td width="79"><span class="style3"><strong>
        
      </strong>        
        
      </span>        <span class="style2">
     
      </span>      <div align="right" class="style3"><strong>*Username:</strong></div>      </td>
      <td width="152"><input name="username" type="text" id="username" tabindex="1" maxlength="20" /></td>
    </tr>
    <tr>
      <td><span class="style3"><strong>
       
      </strong>        
        
      </span>        <span class="style2">
      
      </span>     <div align="right" class="style3"><strong>*Password:</strong></div>      </td>
      <td><input name="password" type="password" id="password" tabindex="2" maxlength="20" /></td>
    </tr>
    <tr>
      <td><span class="style3"><strong>
        
      </strong>        
       
      </span>        <span class="style2">
     
      </span>      <div align="right" class="style3"><strong>*Email:</strong></div>      </td>
      <td><input name="email" type="text" id="email" tabindex="3" maxlength="50" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" tabindex="4" onclick="MM_validateForm('username','','R');MM_validateForm('password','','R');MM_validateForm('email','','RisEmail');return document.MM_returnValue" value="Register" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p class="style7"><a href="login.php">login</a></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style7">*required fields</span></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>
