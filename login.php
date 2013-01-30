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
if (!isset($_GET['f'])){
$_GET['f']=0;
$fail="";
}else if ($_GET['f']==1){
$fail="<font color=\"red\"><center>You have input the wrong username or password</font>";
}
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=md5($_POST['password']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php?f=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_modulatemedia, $modulatemedia);
  
  $LoginRS__query=sprintf("SELECT username, password FROM users WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $modulatemedia) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 10px}
.style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style5 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; }
-->
</style>


<link rel="stylesheet" type="text/css" href="static/style.css" />
<style type="text/css">
<!--
.style6 {font-size: 9px}
-->
</style>
</head>

<body>
<form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
  <label>
  <table width="241" border="0" align="center">
    <tr>
      <td colspan="2"><h2 class="style4">Login</h2></td>
    </tr>
    <tr>
      <td width="79"><span class="style3"><strong>
        
      </strong>        
        
      </span>        <span class="style2">
     
      </span>      <div align="right" class="style3"><strong>Username:</strong></div>      </td>
      <td width="152"><input name="username" type="text" id="username" tabindex="1" maxlength="20" /></td>
    </tr>
    <tr>
      <td><span class="style3"><strong>
       
      </strong>        
        
      </span>        <span class="style2">
      
      </span>     <div align="right" class="style3"><strong>Password:</strong></div>      </td>
      <td><input name="password" type="password" id="password" tabindex="2" maxlength="20" /></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" tabindex="4" onclick="MM_validateForm('username','','R');MM_validateForm('password','','R');MM_validateForm('email','','RisEmail');return document.MM_returnValue" value="Login" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style4"><a href="register.php" class="style5">register</a><span class="style6">
    </tr>
  </table>
  <?php echo $fail; ?>
</form>
</body>
</html>
